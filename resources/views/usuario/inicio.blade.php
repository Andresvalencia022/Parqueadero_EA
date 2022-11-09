@extends('layouts.index')

@section('titulos', 'Transaccion')

@section('contenido')

<div class=" h-96 flex mb-6 ">
    @if (auth()->user()->rol === 'user')

    <div class=" bg-gray-400 text-black w-3/12 p-4 rounded-t-2xl rounded-b-3xl shadow-2xl shadow-gray-700">
        <div class="bg-white p-7 rounded-tl-3xl rounded-tr-3xl border-b-4 border-slate-900">
        <h1 class="text-center font-medium text-2xl font-serif text-zinc-500 border-b-4">Formulario</h1>
        </div>
        <br>
        <form action="{{ route('RegistrarTransaccion')}}" method="post">
            @csrf
            <div class="relative z-0 mb-6 w-full group">
                <input type="text" name="matricula" id="matricula"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    @error('matricula') border-red-600 @enderror" value="{{ old('matricula') }}"">
                @error('matricula')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror
                <label for="matricula"
                    class="peer-focus:font-medium absolute text-xl text-black dark: duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    Placa del veiculo</label>
            </div>
            {{-- selec --}}
            <select id="tipoveiculo" name="tipoveiculo"
            class=" text-sm block h-11 py-0 px-0 w-full  text-black bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer"
            @error('tipoveiculo') border-red-600 @enderror" value="{{ old('tipoveiculo') }}"">
            @error('tipoveiculo')
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
            @enderror
                <option >Tipo de veiculo</option>
                <option value="Carro">Carro</option>
                <option value="Moto">Moto</option>
            </select>

            <button type="submit"
            class="text-white cursor-pointer bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-5">
            Guardar
            </button>
        </form>
    </div>
    <div class="bg-white p-5  w-9/12 ">

<div class="overflow-x-auto relative shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6 bg-gray-800 text-white dark:bg-gray-800">
                    Placa
                </th>
                <th scope="col" class="py-3 px-6 bg-gray-800 text-white">
                    Hora de entrada
                </th>
                <th scope="col" class="py-3 px-6 bg-gray-800 text-white dark:bg-gray-800">
                    Hora de salida
                </th>
                <th scope="col" class="py-3 px-6 bg-gray-800 text-white">
                    Valor Total
                </th>
                <th scope="col" class="py-3 px-6 bg-gray-800 text-white dark:bg-gray-800">
                    Estado
                </th>
                <th scope="col" class="py-3 px-6 bg-gray-800 text-white">
                    Acción
                </th>
            </tr>
            @foreach (   $transaccion as  $tran )

            <tr class="border-b border-gray-200 dark:border-gray-700">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                   {{ $tran->placa }}
                </th>
                <td class="py-4 px-6">
                    {{ $tran->created_at}}
                </td>
                <td class="py-4 px-6 bg-gray-50 dark:bg-gray-800">
                    {{ $tran->horasalida }}
                </td>
                <td class="py-4 px-6">
                   ${{ $tran->valortotal }}
                </td>
                <td class="py-4 px-6 bg-gray-50 dark:bg-gray-800">
                    {{ $tran->estado }}
                </td>
                @if($tran->valortotal == '')
                <td class="py-4 px-6">
                    <form action="{{ route('edit', $tran->id  ) }}" method="GET">
                    @csrf
                    <!--si la sesion existe, muentrame este mensaje-->
                        <!--Alerta de que si se guardo el comentario-->
                    <button type="submit"
                    class="bg-green-600 p-2 border-2 cursor-pointer text-black hover:text-white  hover:bg-green-800  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                    Salir del parquiadero
                    </button>
                </form>
            </td>
            @endif
            </tr>
            @endforeach
        </table>
       </div>
       <div class="mt-10">
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Temporibus rem
            ut harum dolor recusandae culpa? Tenetur dolorum error aperiam, odit nemo
            temporibus eligendi incidunt consequatur itaque? Veritatis impedit repellat
            inventore Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit alias reprehenderit
             aspernatur quam laborum voluptas iure, ab id illo, incidunt praesentium dolorem! Fugit in
             saepe explicabo eaque ipsam corrupti ex.</p>
       </div>
    </div>

    @else
     <div class="w-11/12 mx-auto p-4 pt-2">
       @livewire('counter')
        {{-- <form class="mb-3">
            <div class=" m-auto relative overflow-hidden w-3/4 ">
                <input type="search" id="default-search" class="block p-4 pl-10 w-full  float-right text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Mockups, Logos..." required>
                <button type="submit" class="text-white absolute right-2.5 bottom-2.5 float-right bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg aria-hidden="true" class="w-5 h-5  text-white dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </button>
            </div>
        </form>

        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6 bg-gray-700 text-white  border-b-2 border-black rounded-tl">
                    Placa
                </th>
                <th scope="col" class="py-3 px-6  bg-gray-700 text-white border-b-2 border-black">
                    Hora de entrada
                </th>
                <th scope="col" class="py-3 px-6 bg-gray-700 text-white border-b-2 border-black">
                    Hora de salida
                </th>
                <th scope="col" class="py-3 px-6  bg-gray-700 text-white border-b-2 border-black rounded-tr">
                    Estado
                </th>
            </tr>
            @foreach ( $transaccion as  $tran)

            <tr class="border-b border-gray-200 dark:border-gray-700">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap bg-gray-200 dark:text-white dark:bg-gray-800">
                   <a href="{{ route('estado',$tran->id)}}"> {{ $tran->placa }} </a>
                </th>
                <td class="py-4 px-6  bg-gray-600 text-white">
                    {{ $tran->horaentrada }}
                </td>
                <td class="py-4 px-6 bg-gray-200  text-gray-900 dark:bg-gray-800">
                    {{ $tran->horasalida }}
                </td>
                <td class="py-4 px-6  bg-gray-600 text-white">
                    {{ $tran->estado }}
                </td>
            </tr>
            @endforeach
        </table>
        <div class="mt-4">
        {{ $transaccion->links('pagination::tailwind') }}
        </div> --}}
    </div>
    @endif
@endsection
