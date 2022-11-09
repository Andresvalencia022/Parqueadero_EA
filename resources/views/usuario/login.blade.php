@extends('layouts.index')

@section('titulos', 'Login')


@section('contenido')

    <div class="w-5/12 m-auto p-3 bg-gray-400 rounded-tl-3xl rounded-tr-3xl rounded-br-3xl rounded-bl-3xl mb-5">
        <div class="bg-white p-7 rounded-tl-3xl rounded-tr-3xl border-b-4 border-slate-900">
            <h1 class=" text-center font-medium text-2xl font-serif text-zinc-500 border-b-4">¡¡Bienvenido a nuestro sistema de parqueadero!!</h1>
        </div>
        <div class=" w-9/12 m-auto mt-7 p-6">
            <form action="{{ route('storelogin') }}" method="POST" novalidate>
                @csrf
                {{-- -------------------------------------------------------------------------- --}}
                {{-- en caso de que no este auntenticado mandamos a llamar este mensaje --}}
                @if(session('mensaje'))
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ session('mensaje') }}</p>
                @endif
               {{-- -------------------------------------------------------------------------- --}}
                <div class="relative z-0 mb-6 w-full group">
                    <input type="email" name="email" id="email"
                        class="block py-2.5 px-0 w-full text-sm text-gray-100 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        @error('username') border-red-600 @enderror" value="{{ old('username') }}"/>
                    @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                    <label for="floating_email"
                        class="peer-focus:font-medium absolute text-sm text-black dark:text-gray-100 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <input type="password" name="password" id="password"
                        class="block py-2.5 px-0 w-full text-sm text-gray-100 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        @error('password') border-red-600 @enderror" value="{{ old('password') }}"/>
                    @error('password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                    <label for="floating_password"
                        class="peer-focus:font-medium absolute text-sm text-black dark:text-gray-100 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
                </div>
                <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none  font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-5">
                Entrar
            </button>

            </form>
        </div>
    </div>

@endsection
