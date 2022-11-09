<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="shortcut icon" href="{{ asset('img/peaje.png') }}" type="image/x-icon">
    <title>@yield('titulos')</title>
    @livewireStyles
</head>

<body>
    <div class=" contenedor ">
        <nav class="bg-gray-800">
            <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
                <div class="relative flex items-center justify-between h-16">
                    <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                        <!-- Mobile menu button-->
                    </div>
                    <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                        <div class="flex-shrink-0 flex items-center">
                            <button type="button"
                                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                                aria-controls="mobile-menu" aria-expanded="false">
                                <img class="w-12" src="{{ asset('img/peaje.png') }}" alt="logo-peaje">
                                {{-- button img --}}
                            </button>
                        </div>
                        {{-- ------------------------------------------------------ --}}

                        @auth {{-- Si esta autenticado --}}
                            <div class="hidden sm:block sm:ml-6 ">
                                <div class="flex space-x-4 mt-3">
                                    <a
                                       href="{{ route('Inicio_sesion') }}"class="text-gray-300 cursor-pointer hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium ">Transacciones
                                    </a>
                                        <!--esta condicion va mostrar este link a los usuarios que sean admin-->
                                        @if (auth()->user()->rol == 'admin')
                                        <a  href="{{ route('tarifa') }}"
                                            class="text-gray-300 cursor-pointer hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Tarifa
                                        </a>
                                    @endif

                                </div>
                            </div>
                        @endauth
                    </div>
                    <div
                        class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                        {{-- ------------------------------------------------------ --}}
                        @auth {{-- Si esta autenticado --}}

                            <button type="button"
                                class="bg-gray-800 p-1 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                                <li class="list-none">
                                    <a  class="cursor-pointer" href="{{ route('Inicio_sesion') }}"> Hola:
                                        <span>{{ auth()->user()->username }}</span></a>
                                </li>
                            </button>
                            <!-- Profile dropdown -->
                            <div class="ml-3 relative">
                                <div>
                                    <form action="" method="post">
                                        <button type="submit"
                                            class="bg-gray-800 p-1 rounded-full text-gray-400 cursor-pointer hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                                            <a href="{{ route('cerrar_sesion') }}">Cerrar Sesion</a>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endauth
                        @guest {{-- No esta autenticado --}}
                            <button type="button"
                                class="bg-gray-800 p-1 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                                <li class="list-none"><a class="cursor-pointer" href="{{ route('registrar') }}">Registrar </a></li>
                            </button>
                            <!-- Profile dropdown -->
                            <div class="ml-3 relative">
                                <div>
                                    <button type="button"
                                        class="bg-gray-800 p-1 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                                        <li class="list-none"><a class="cursor-pointer" href="{{ route('login') }}">Login</a></li>
                                    </button>
                                </div>
                            </div>
                        @endguest

                    </div>

                </div>
            </div>
        </nav>
    </div>
    <main class="container mx-auto mt-6">
        <h3 class="font-black font-serif  text-center text-2xl mb-3"> @yield('titulos') </h3>
        @yield('contenido')
    </main>
    <footer class="md:text-center p-2 text-gray-500 font-bold">
        <p> ANDRESGRAM - Todos los derechos reservados {{ now()->year }}</p>
    </footer>
    @livewireScripts
</body>


</html>
