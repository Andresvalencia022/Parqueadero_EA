@extends('layouts.index')

@section('titulos', 'Factura')

@section('contenido')

<div class=" columns-1 w-7/12 m-auto p-5 mb-4  bg-gray-400 shadow-2xl shadow-gray-700">
@if (isset($datos))
 <div class="columns-1 w-9/12 m-auto p-5 bg-white">
 <h1 class="text-center uppercase font-bold text-2xl " >Parqueadero de motos y carros</h1>

 <br>
 <p>Tu has generado tu factura con exito, una vez que se realice
    El pago del parqueadero podras salir.</p>
 <br>
 <br>
  <h2 class="uppercase font-bold">Datos de parqueadero </h2>
 <br>

    <samp class="font-semibold"> Placa Del veiculo:</samp> {{$placa}} <br>
    <samp class="font-semibold"> Tipo De veiculo:</samp> {{$tipo_veiculo}} <br>
    <samp class="font-semibold"> Hora De Entrada:</samp> {{$hora_entrada}}<br>
    <samp class="font-semibold"> Hora De Salida:</samp> {{$hora_salida}}<br>
    <samp class="font-semibold"> Horas y minutos que se demoro:</samp> {{$horas_y_minutos}}<br>
    <samp class="font-semibold"> Total: </samp> ${{$valor_total_redondeado}}

     <br>
     <br>
     <h3 class="font-semibold">Reglamento</h3>
     <p>Lorem ipsum dolor sit amet consectetur,
         adipisicing elit. A explicabo perferendis
         libero aspernatur ut labore earum, inventore
         voluptatibus eligendi aut nulla reiciendis maiores aliquam.
         Harum voluptate perferendis provident deleniti ratione</p>
  </div>
@else
<div class="columns-1 w-9/12 m-auto p-5 bg-white">

    @foreach ( $transaction as  $tran)
    <form action="{{ route('edit_estado')}}" method="post">
    @csrf
    <input type="text"  name="id" value="{{ $tran->id }}" hidden >
     {{-- selec --}}
     <select id="estado" name="estado"
     class="block h-11 py-0 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer"
     @error('estado') border-red-600 @enderror" value="{{ old('estado') }}"">
     @error('estado')
     <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
     @enderror
         <option >Cambiar Estado</option>
         <option value="Activo">Activo</option>
         <option value="Inactivo">Inactivo</option>
     </select>

     <button type="submit"
     class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-5">
     Guardar
     </button>
    </form>
    <h1 class="text-center uppercase font-bold text-2xl " >Parqueadero de motos y carros</h1>
   <br>
   <p>Tu has generado tu factura con exito, una vez que se realice
      El pago del parqueadero podras salir.</p>
   <br>
   <br>
    <h2 class="uppercase font-bold">Datos de parqueadero </h2>
   <br>
   <p class="float-right">Fecha: {{ $tran->updated_at }}</p>
   <br>
   <br>

   <samp class="font-semibold"> Placa Del veiculo: </samp> {{ $tran->placa}} <br>
   <samp class="font-semibold"> Tipo De veiculo: </samp>{{ $tran->tipo_veiculo}}  <br>
    <samp class="font-semibold">Hora De Entrada: </samp>{{ $tran->horaentrada}} <br>
    <samp class="font-semibold">Hora De Salida: </samp>{{ $tran->horasalida}} <br>
    <samp class="font-semibold">Estado: </samp> {{ $tran->estado }}<br>
    <samp class="font-semibold">Total: </samp> ${{ $tran->valortotal}}

    <br>
     <br>
     <h3 class="font-semibold">Reglamento</h3>
     <p>Lorem ipsum dolor sit amet consectetur,
         adipisicing elit. A explicabo perferendis
         libero aspernatur ut labore earum, inventore
         voluptatibus eligendi aut nulla reiciendis maiores aliquam.
         Harum voluptate perferendis provident deleniti ratione</p>
   </div>
   @endforeach
@endif
 </div>
@endsection
