<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Socialite;
use App\User;
use App\Log;
use Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request)
    {
        // Create log
        storeLog('Salió del sistema', $request->ip());
        // Logout
        $this->guard()->logout();
        $request->session()->invalidate();
        return redirect('/');
    }

    // Authenticated
    protected function authenticated(Request $request, $user)
    {
        storeLog('Ingresó mediante formulario', $request->ip());
        Session::flash('alert', 'success|Bienvenido|'. Auth::user()->name);
    }

    // Facebook
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    // Facebook
    public function handleProviderCallback(Request $request)
    {
        $facebook = Socialite::driver('facebook')->stateless()->user();
        $find = User::whereEmail($facebook->email)->first();

        if ($find){
            // Create session
            Auth::login($find);
            // Create log
            if(!isset(Auth::user()->social_id)){
                // update social_id and avatar
                $update             = User::find(Auth::user()->id);
                $update->social_id  = $facebook->id;
                $update->profile    = $facebook->avatar;
                $update->save();
                // Create log
                storeLog('Se vinculó mediante facebook', $request->ip());
            }
            storeLog('Ingresó mediante facebook', $request->ip());
        }else{
            $user = new User();
            $user->name      = $facebook->name;
            $user->email     = $facebook->email;
            $user->profile   = $facebook->avatar;
            $user->social_id = $facebook->id;
            $user->provider  = 'Facebook';
            $user->save();
            // Create Session
            Auth::login($user);
            // Create Log
            storeLog('Se registró mediante facebook', $request->ip());
        }
        Session::flash('alert', 'success|Bienvenido|'. Auth::user()->name);
        return redirect('/');
    }

    // Google
    public function googleRedirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }
    // Google
    public function googleHandleProviderCallback(Request $request)
    {
        $google = Socialite::driver('google')->stateless()->user();

        $find = User::whereEmail($google->email)->first();

        if ($find){
            // Create session
            Auth::login($find);
            // Create log
            if(!isset(Auth::user()->social_id)){
                $update             = User::find(Auth::user()->id);
                $update->social_id  = $google->id;
                $update->profile    = $google->avatar;
                $update->save();
                storeLog('Se vinculó mediante google', $request->ip());
            }
            storeLog('Ingresó mediante google', $request->ip());
        }else{
            $user = new User();
            $user->name      = $google->name;
            $user->email     = $google->email;
            $user->profile   = $google->avatar;
            $user->social_id = $google->id;
            $user->provider  = 'Google';
            $user->save();
            Auth::login($user);
            storeLog('Se registró mediante google', $request->ip());
        }
        Session::flash('alert', 'success|Bienvenido|'. Auth::user()->name);
        return redirect('/');
    }
}