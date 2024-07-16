<x-app-layout>

    <main class="p-4 sm:ml-64 h-full">
        <div class="p-4 mt-10">

            <div class="flex justify-between">
                <h6 class="text-lg font-bold">Abogados</h6>
                <a href="/abogados/create"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4
             focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 
             focus:outline-none
             
              ">Crear</a>

            </div>



            <div class="relative overflow-x-auto my-4">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
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
                                Acciones
                            </th>

                        </tr>

                    </thead>
                    <tbody>

                        @foreach ($abogados as $abogado)
                            <tr class="bg-white border-b">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
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
                                    <a href="/abogados/{{ $abogado->ci }}/edit"
                                        class="font-medium text-blue-600 hover:underline">Editar</a>
                                </td>

                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>

    </main>
</x-app-layout>
