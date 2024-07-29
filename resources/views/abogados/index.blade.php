<x-app-layout>

    <main class="p-4 sm:ml-64 h-full">
        <div class="p-4 mt-14 rounded-lg dark:bg-gray-800 ">

            <div class="flex justify-between">
                <h6 class="text-lg font-bold dark:text-white">Abogados</h6>
                <a href="{{route('abogado.create')}}"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4
             focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 
             focus:outline-none
             
              ">Crear</a>

            </div>



            <div class="relative overflow-x-auto my-4">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50  dark:bg-gray-700 dark:text-gray-400
">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                CI
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nombre
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Correo
                            </th>
                            
                            <th scope="col" class="px-6 py-3">
                                Codigo
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Especialidad
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Estado
                            </th>
                            
                            <th scope="col" class="px-6 py-3">
                                Acciones
                            </th>

                        </tr>

                    </thead>
                    <tbody class="dark:text-white">

                        @foreach ($abogados as $abogado)
                            <tr class="dark:border-gray-700 border-b">
                                <th scope="row"
                                    class="px-6 py-4 font-medium whitespace-nowrap">
                                    {{ $abogado->ci }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $abogado->usuario->nombre }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $abogado->usuario->celectronico }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $abogado->codcol }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $abogado->especialidad }}
                                </td>
                                <td class="px-6 py-4">
                                @if ($abogado->usuario->estado == 1)
                                    <span
                                        class="bg-green-400 text-white text-xs font-medium px-2 py-0.5 rounded dark:bg-primary-900 dark:text-primary-300">Habilitado</span>
                                @else
                                    <span
                                        class="bg-red-400 text-white text-xs font-medium px-2 py-0.5 rounded dark:bg-primary-900 dark:text-primary-300">Desabilitado</span>
                                @endif
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{route('abogado.edit',$abogado->ci)}}"
                                        class="font-medium text-blue-600 hover:underline">Editar</a>
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
