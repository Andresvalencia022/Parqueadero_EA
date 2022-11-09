<?php

namespace App\Http\Controllers;

use App\Models\Tarifa;
use Illuminate\Http\Request;


class tarifaController extends Controller
{

    public function __construct()
    {
        //lo protegemos con un middleware y le pasamos la autenticacion (auth)
        $this->middleware('auth');
    }

    public function index()
    {
        return view('usuario.tarifa');
    }

    public function store(Request $request)
    {



        $this->validate($request, [
            //El dato      //Cuale son sus reglas que va a tener el campo del from
            'veiculo' =>  'required',
            'valortarifa' =>  'required',
            'valorfraccion' =>  'required'
        ]);

        // Agregar datos
        // Otra forma de agregar datos a  la base de datos
        $tarifa = new Tarifa();
        $tarifa->veiculo = $request->veiculo;
        $tarifa->valortarifa = $request->valortarifa;
        $tarifa->valorfraccion = $request->valorfraccion;
        $tarifa->save(); //guardar

        return back()->with('validar', 'Datos registrados');


    }
}
