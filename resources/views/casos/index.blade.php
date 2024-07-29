<x-app-layout>

    <main class="p-4 sm:ml-64 h-full ">
        <div class="p-4 mt-14 rounded-lg dark:bg-gray-800">


            <div class="flex justify-between">
                <h6 class="text-lg font-bold dark:text-white">Casos</h6>

                @if (auth()->user()->usuario->tipo != '2')
                    <a href="{{ route('caso.create') }}"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4
         focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 
         focus:outline-none
         
          ">Crear</a>
                @endif



            </div>



            <div class="relative overflow-x-auto my-4 ">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Codigo
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Abogado
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Cliente
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Acciones
                            </th>

                        </tr>

                    </thead>
                    <tbody class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                        @foreach ($casos as $casos)
                            <tr class=" border-b dark:border-gray-700 ">
                                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap ">
                                    {{ $casos->codigo }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $casos->abogado->usuario->nombre }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ $casos->cliente->usuario->nombre }}
                                </td>



                                <td class="px-6 py-4">
                                    @if (auth()->user()->usuario->tipo != '2')
                                        <a href="#"
                                            class="font-medium text-blue-600 box-content hover:underline">Editar</a>
                                    @endif


                                    <a href="{{ route('caso.show', $casos->codigo) }}"
                                        class="font-medium text-blue-600 box-content hover:underline">Ver</a>

                                </td>


                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>

        <div class="absolute bottom-0 m-2 text-lg font-semibold dark:text-white">
            <p>Visitas : <span>{{$contador->contador}}</span></p>
        </div>

    </main>
</x-app-layout>
