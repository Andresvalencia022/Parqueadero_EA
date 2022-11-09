<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{


    public function index()
    {
        return view('usuario.form');
    }

    public function store(Request $request)
    {

        //modificar el request para que me lo tome el slug y poder juntar al lower para
        //slug me lo combierte en una url dependiendo si comolocamos un usuario con espacio, ejemplo (andres felipe =  andres-felipe)
        $request->request->add(['username' => Str::slug($request->username) ]);

        $this->validate($request, [
            //El dato      //Cuale son sus reglas que va a tener el campo del from
            'username' =>  'required|unique:users|min:3|max:20',
            'email' =>  'required|unique:users|email|max:60',
            'rol' =>  'required',
            'telefono' =>  'required',
            'password' =>  'required|confirmed|min:6' //larave automaticamnete nos valida si password es igual al otro campo password
        ]);

        //para guardar o crear los datos in mandarlos a la bd
          User::create([
            'username' => Str::lower($request->username), //Str::lower convierte la cadena dada a minúsculas
            'email' => $request->email,//(nom) hace referencia a los datos que estoy mandando por el form
            'rol' => $request->rol,
            'telefono' => $request->telefono,
            'password' => Hash::make($request->password),
            // Puede codificar una contraseña llamando al make método en la Hash fachada (incripta)
        ]);
//-----------------autenticar usuario------------------//

      // auth()->autenticar usuario
    // attempt()->esto quiere decir intentar, intentar autenticar un usuario, en este caso email y password

    // auth()->attempt([ //lo que hace es extraer email, password y lo guarda en una memoria aparte como lo hace $_SESSIOM EN PHP
        //     'email' => $request->email,
        //     'password' =>$request->password
        // ]);
        //Otra forma de autenticar el usuario}
        // auth()->attempt-lo que hace es extraer email, password y lo guarda en una memoria aparte
        // only()->esto quiere decir que solo del request toma el email,el password
        // auth()->attempt($request->only('email','password'));

        //  Redireccionar
        return redirect()->route('login');
    }
}
