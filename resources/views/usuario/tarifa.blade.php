@extends('layouts.index')

@section('titulos')


@section('contenido')

<div class=" flex mb-12 mt-14 h-96  rounded-b rounded-t ">
    <div class="columns-1  bg-white   w-4/12  p-5  ">
        <h1 class="text-center font-sans" >Ingresa las tarifas </h1>
        <br>
        <form action="{{ route('Registrar_tarifa')}}" method="post">
            @csrf

            @if(session('validar'))
            <!--si la sesion existe, muentrame este mensaje-->
            <div class=" bg-green-500 p-2 rounded-lg mb-6 text-white text-center uppercase font-bold">
                {{ session('validar') }}
                <!--Alerta de que si se guardo el comentario-->
            </div>
            @endif
             {{-- selec --}}
             <select id="veiculo" name="veiculo"
             class="block h-11  pb-4  py-0 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer"
             @error('veiculo') border-red-600 @enderror" value="{{ old('veiculo') }}"">
             @error('veiculo')
             <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
             @enderror
                 <option >Tipo de veiculo</option>
                 <option value="Carro">Carro</option>
                 <option value="Moto">Moto</option>
             </select>

            <div class="relative z-0 mb-6 w-full group pt-7">
                <input type="number" name="valortarifa" id="valortarifa"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    @error('valortarifa') border-red-600 @enderror" value="{{ old('valortarifa') }}">
                @error('valortarifa')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror
                <label for="valortarifa"
                    class=" pt-8  peer-focus:font-medium absolute text-sm text-black dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    Tarifa</label>
            </div>
            <div class="relative z-0 mb-6 w-full group">
                <input type="number" name="valorfraccion" id="valorfraccion"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    @error('valorfraccion') border-red-600 @enderror value="{{ old('valorfraccion') }}">
                    @error('valorfraccion')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                <label for="valorfraccion"
                    class="peer-focus:font-medium absolute text-sm text-black dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    Valor Fracción
                </label>
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-5">
                Guardar
            </button>
        </form>
    </div>
    <div class="columns-2 w-8/12 bg-center bg-no-repeat bg-cover rounded-lg" style=" background-image: url(img/foto-tarifa.jpg)">

    </div>

</div>
@endsection
