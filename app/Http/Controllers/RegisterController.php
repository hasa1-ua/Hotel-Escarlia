<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4|confirmed',
            'fecha' => 'nullable|date|max:255',
            'address' => 'nullable|string|max:255',
            'nationality' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        User::create([
            'nombre_usuario' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'fecha_nacimiento' => isset($request->fecha) ? $request->fecha : null,
            'direccion' => isset($request->address) ? $request->address : null,
            'nacionalidad' => isset($request->nationality) ? $request->nationality : null,
            'pais_residencia' => isset($request->country) ? $request->country : null,
            'telefono' => isset($request->telefono) ? $request->telefono : null,
        ]);

        return redirect('/login')->with('success', 'Registro exitoso. Por favor, inicia sesión.');
    }

    public function validateUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:users',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        return response()->json(['success' => 'Validación exitosa'], 200);
    }
}