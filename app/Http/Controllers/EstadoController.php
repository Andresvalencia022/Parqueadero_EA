<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    public function index($id){

        // dd('dio');
        $transaction = Transaction::where('id', $id)->get();

        return view('usuario.factura',[
            'transaction' => $transaction,
        ]);

    }

    public function edit_estado(Request $request){

        $id = $request->id;

     // Actualizar
        $transaction = Transaction::findOrFail($id);
        $transaction->estado = $request->estado;
        $transaction ->save();

        return back()->with('Mensaje','Se satisfactoriamente este estado');

    }
}
