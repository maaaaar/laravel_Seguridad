<?php

namespace App\Http\Controllers\Auth;

use App\Usuario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $correo = $request->input('correo');
        $contrasenya = $request->input('contrasenya');
        $user = Usuario::where('correo', $correo)->first(); //buscamos el usuario por el correo

        //si el usuario es diferente a null, hash para desencriptar la contrasaenya
        if ($user != null && Hash::check($contrasenya, $user->contrasenya))
        {
            //Auth la classe que guarda el usuario, utilizamos su metodo login y le pasamos el Usuario(User)
            Auth::login($user);
            return redirect('/home');
        }
        else
        {
            //sino lo encuentra redireciona al mismo form con los datos anteriores
            return redirect('login')->withInput();
        }
    }

    public function showLogin()
    {
        //lama a la vista login
        return view('auth.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}