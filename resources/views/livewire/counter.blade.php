<div>
    <form class="mb-3">
            <div class=" m-auto relative overflow-hidden w-3/4 ">
                <input wire:model="search" type="search" id="default-search" class="block p-4 pl-10 w-full  float-right text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="INGRESA LA PLACA DEL VEHÍCULO QUE SALE" required>
                {{-- <button type="submit" class="text-white absolute right-2.5 bottom-2.5 float-right bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg aria-hidden="true" class="w-5 h-5  text-white dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </button> --}}
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
            @foreach (  $transcitions as $tran)

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
        {{-- <div class="mt-4">
        {{  $this->transaccion->links('pagination::tailwind') }}
        </div> --}}

</div>
