<?php

namespace App\Http\Controllers;

use App\Models\Tarifa;
use App\Models\Transaction;
use Carbon\Carbon;


use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class InicioController extends Controller
{
    //autenticar que el usuario, esta autenticado
    //no nos deja haceder a las paginas si no es el usuario original
    public function __construct()
    {
        //lo protegemos con un middleware y le pasamos la autenticacion (auth)
        $this->middleware('auth');
    }

    public function index()
    {

        // if(auth()->user()->rol =='admin'){
        //     //  dd('es admin');
        // $transaccion = Transaction::orderBy('updated_at', 'desc')
        // ->Paginate(5);

        //  }else{
        // show
        //Para mostrar los datos en la tabla
         $transaccion = Transaction::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->limit(1)->get();
        // dd($transaccion);


        return view('usuario.inicio', [
            'transaccion' => $transaccion

        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'matricula' =>  'required',
            'tipoveiculo' =>  'required'
        ]);

        // $tipoveiculo = $request->tipoveiculo;
        //metodo para sacar la hora con la libreria carbon
        $date = Carbon::now();
        $hora_entrada = $date->toDateTimeString(); //toTimeString metodo para sacar la hora

        $estado = 'Activo';

        //agregar datos
        //otra forma de agregar datos a  la base de datos
        $transaccion = new Transaction();
        $transaccion->placa = $request->matricula;
        $transaccion->horaentrada =  $hora_entrada;
        // $transaccion->horasalida =  $horaSalida;
        $transaccion->tipo_veiculo = $request->tipoveiculo;
        $transaccion->estado = $estado;
        // $transaccion->tarida_id = auth()->tarifa()->id;
        $transaccion->user_id = auth()->user()->id;
        $transaccion->save(); //guardar

        return back()->with('Mensaje','salir de parquiadero');
    }

    public function edit(Request $request, $id_transaccion)
    {

        //voy hace un objeto de todo los datos de transacciones
        $tran = Transaction::where('id', $id_transaccion)->get();
        //Me recorre el objeto
        foreach ($tran as $trans) {
            $trans->tipo_veiculo;
            $trans->placa;
            $trans->horaentrada;
        }
        //de la tabla transaccion transacciones
        $placa =  $trans->placa;
        $tipo_veiculo = $trans->tipo_veiculo;
        $hora_entrada = $trans->horaentrada;

                               //para convertir la  hora de entrada en formato de carbon
        // $hora_entrada = Carbon::parse( $hora_entrada);
        $hora_entrada = Carbon::createFromFormat('Y-m-d H:i:s', $hora_entrada);


        $horas = Carbon::now();
        $hora_salida = $horas->toDateTimeString(); //toTimeString metodo para sacar la hora actual (en este caso es la de salida)
                //calcular la diferencia de las  horas

        // $hora = $hora_entrada->diffInHours();

        //Aqui lo convertimos en minutos (es decir me mustra todos los minutos que se demoro)
        $minutos =  $hora_entrada->diffInMinutes($hora_salida);

                              //para sacar la hora               //para convertilo en minutos
        $horas_y_minutos = floor($minutos  / 60).' Horas '.' y '.($minutos  - floor($minutos  / 60) * 60).' Min';
        // dd($hora, $minutos,$hoursyminutos_demoro);
         //voy hace un objeto de todo los datos de  la tabla tarifa
         $tarifas = Tarifa::where('veiculo', $tipo_veiculo)->orderBy('id', 'desc')->limit(1)->get();

         foreach ($tarifas as $tari) {
           $tari->id;
           $veiculo = $tari->veiculo;
           $valortarifa = $tari->valortarifa;
           $valorfraccion = $tari->valorfraccion;
        }
        //  dd($id, $veiculo,$valortarifa,$valorfraccion);

        //para calular el precio en horas o minutos

          $resultado = $minutos / $valorfraccion;
          $valor  = $resultado * $valortarifa;
          $valor_total_redondeado = round($valor);


        // El método findOrFail($id) recuperamos un determinado registro con un identificador $Id
        // llamamos a los datos de Transaction
           $transaction = Transaction::findOrFail($id_transaccion);
           $transaction->horasalida = $hora_salida;
           $transaction->tarifa_id = $tari->id;
           $transaction->valortotal = $valor_total_redondeado;

           $transaction ->save();

           if(!isset($valor_total_redondeado)){
             //(back) quiere decir que regresara a la pagina donde mande los datos
             return back();
            //  ->with('mensaje','Error en el parquiadero');
           }

             $datos = true;

              //Me redirecciona a la pagina inicial del ususario
              return view('usuario.factura',[
                'placa' =>  $placa,
                'tipo_veiculo' =>  $tipo_veiculo,
                'hora_entrada' =>  $hora_entrada,
                'hora_salida' => $hora_salida,
                'horas_y_minutos' => $horas_y_minutos,
                'valor_total_redondeado' => $valor_total_redondeado,
                'datos' =>  $datos,
              ]);

    }


}
