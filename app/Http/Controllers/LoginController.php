<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Autenticación exitosa
            $user = Auth::user();
            switch ($user->rol) {
                case 'Cliente':
                    return redirect()->intended('/Usuario');
                case 'Recepción':
                    return redirect()->intended('/Recepcionista');
                case 'Webmaster':
                    return redirect()->intended('/Webmaster/usuarios');
                default:
                    return redirect()->intended('/Publico');
            }
        }

        // Autenticación fallida
        return redirect()->back()->withErrors(['email' => 'Credenciales incorrectas'])->withInput();
    }

    public function logout()
    {
        Auth::logout();

        $cookie = Cookie::forget('laravel_session');
        return redirect('/login')->withCookie($cookie);
    }
}