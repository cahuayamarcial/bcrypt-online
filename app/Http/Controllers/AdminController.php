<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Record;
use App\User;
use App\Log;
use DB;

class AdminController extends Controller
{
    public function index()
    {
    	$users = User::where('state', '1')->get();
    	$nowRecords = Record::where('state', '1')->whereDay('created_at', Carbon::now()->format('d'))->get();
    	$allRecords = Record::where('state', '1')->get();
    	return view('admin.index', [
    		'users' => $users,
    		'nowRecords' => $nowRecords,
    		'allRecords' => $allRecords
    	]);
    }

    public function logs()
    {
    	$logs = Log::orderBy('id', 'DESC')->paginate(5);
    	return view('admin.logs.index', ['logs' => $logs]);
    }

    public function lineUsers(){
    	$users = User::select(DB::raw('MONTH(created_at) as mes'), DB::raw('count(*) as total'))
    					->where('created_at', '>=', Carbon::now()->format('Y').'-01-01')
    					->groupBy('mes')->get();
    	$records = Record::select(DB::raw('MONTH(created_at) as mes'), DB::raw('count(*) as total'))
    					->where('created_at', '>=', Carbon::now()->format('Y').'-01-01')
    					->groupBy('mes')->get();
    	$notNull = Record::whereNotNull('user_id')->count();
    	$null = Record::whereNull('user_id')->count();
    	$recordsComprare = [$notNull, $null];
    	return [
    		'monthsPassed' => monthsPassed(), 
    		'countUsersMonth' => countMonth($users),
    		'countRecordsMonth' => countMonth($records),
    		'recordsComprare' => $recordsComprare
    	];
    }
}
