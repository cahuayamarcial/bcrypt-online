<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Response;
use App\User;
use Hash;

class UserController extends Controller
{
	// Validations
    public function rules($user_id)
    {
        return [
			'name'  => 'required|max:60|min:3|',
			'email' => 'required|max:60|min:3|email|unique:users,email,'.$user_id,
			'profile' => 'required|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
        ];
    }

    protected $messages = [
        'name.required'   => ' Por favor, rellene este campo',
        'name.max'        => ' El campo debe tener menos de 60 caracteres',
        'name.min'        => ' El campo debe tener más de 3 caracteres',

        'email.required'    => ' Por favor, rellene este campo',
        'email.max'         => ' El campo debe tener menos de 60 caracteres',
        'email.min'         => ' El campo debe tener más de 3 caracteres',
        'email.email'       => ' El email no es válido',
        'email.unique'      => ' El email ya se encuentra registrado',

        'profile.required'  => ' Por favor, rellene este campo',
        'profile.regex'		=> ' Ingrese una URL válida'
    ];


    public function update(Request $request)
    {
        $validator = Validator::make ($request->all(), $this->rules(\Auth::user()->id), $this->messages);

        if ($validator->fails()){
            return Response::json(array(
                'errors' => $validator->getMessageBag()->toArray()));
        }else {
        	User::find(\Auth::user()->id)->update($request->all());
        }
    }


    public function changePassword(Request $request)
    {
        $rules = array(
            'password'          => 'required',
            'new_password'      => 'required|min:6',
            'confirm_password'  => 'required|same:new_password'
        );

        $messages = array(
            'required' => ' Por favor, rellene este campo',
            'min'      => ' El campo debe tener mínimo 6 caracteres',
            'same'     => ' La contraseña no coindice.'
        );

        $validation = Validator::make($request->all(), $rules, $messages);

        if ($validation->fails()){
            return Response::json(['errors' => $validation->getMessageBag()->toArray()]);
        }else{
            if (Hash::check($request->password, \Auth::user()->password)){
                $user = User::find(\Auth::user()->id);
                $user->update(['password' => bcrypt($request->new_password)]);
            }else{
                return Response::json(['incorrect' => 'La contraseña es inválido']);
            }
        }
    }

    // Admin module

    public function index(Request $request){
        $users = User::Search($request->name)->where('state', '1')->orderBy('id', 'DESC')->paginate(6);
        return view('admin.users.index', ['users' => $users]);
    }

    public function show($id){
        $user = User::find($id);
        return view('admin.users.show', ['user' => $user]);
    }

}
