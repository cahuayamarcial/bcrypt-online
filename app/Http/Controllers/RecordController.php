<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Record;
use Validator;
use Response;

class RecordController extends Controller
{
    protected $rules = [
        'text'  => 'required',
    ];

    protected $messages = [
        'name.required'   => ' Por favor, rellene este campo.',
    ];

    public function __construct()
    {
        Carbon::setLocale('es');
    }

    public function index()
    {
        return view('record', [
            'records' => $this->data()
        ]);
    }

    public function data()
    {
       return Record::where('user_id', \Auth::user()->id)
                    ->where('state', '1')
                    ->orderBy('id', 'DESC')
                    ->simplePaginate(9); 
    }

    public function getRecord()
    {
        $records = $this->data();
        return view('list',compact('records'))->render();
    }

    public function store(Request $request)
    {
        $rules = array('text' => 'required');
        $messages = array('required' => ' Por favor, rellene este campo.');

        $validation = Validator::make($request->all(), $rules, $messages);

        if ($validation->fails()){
            return Response::json(['errors' => $validation->getMessageBag()->toArray()]);
        }else{
            $record = new Record();
            $record->text = $request->text;
            $record->hash = bcrypt($request->text);
            $record->ip = $request->ip();

            if(\Auth::check()){
                $record->user_id = \Auth::user()->id;
            }
            $record->save();

            if(isset($request->provider)){
                return $record;
            }else{
                $records = $this->data();
                return view('list',compact('records'))->render();
            }
        }

    }

    public function remove(Request $request)
    {
        $record = Record::find($request->id);
        $record->state = '0';
        $record->save();
        $records = $this->data();
        return view('list',compact('records'))->render();
    }

    public function adminIndex(){
        $records = Record::orderBy('id','DESC')->paginate(5);
        return view('admin.records.index', ['records' => $records]);
    }
}
