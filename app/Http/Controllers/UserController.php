<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //Mostrar Register form
    public function create(){
        return view('users.register');
    }


    //Store de usuarios
    public function store(Request $request){
        //Validacion de campos para que todos sean requeridos
        $formFields=$request->validate([
            'name'=>['required', 'min:3'],
            //Unique busca que el email sea unico en la tabla users, columna email
            'email'=>['required', 'email', Rule::unique('users', 'email')],
            //El confirmed busca el input password_confirmed
            'password'=>'required|confirmed|min:6'
        ]);

        //Hashear el pass pa!
        $formFields['password']= bcrypt($formFields['password']);

        //Crear el usuario
        $user= User::create($formFields);

        //Y de una loguearse!
        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in!');
    }

    //logout
    public function logout(Request $request){
        auth()->logout();
        //Invalida el token anterior y crea uno nuevo de CSRF
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message', 'You have been logged out!');
    }

    //Mostrar Login form
    public function login(){
        return view('users.login');
    }

    //Autenticar el user
    public function authenticate(Request $request){
        $formFields=$request->validate([
            'email'=>['required', 'email'],
            'password'=>'required'
        ]);

        //Proceso de autenticacion
        //si hay un intento de session, regenerar el session ID
        if(auth()->attempt($formFields)){
            $request->session()->regenerate();
            return redirect('/')->with('message', 'You are now logged in!');
        }
        //si falla el login
        //No revelar que el email existe!!! Solo decir credenciales invalidas
        return back()->withErrors(['email'=>'Invalid Credentials'])->onlyInput('email');
        
    }

    

}
