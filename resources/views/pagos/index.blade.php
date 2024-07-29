<x-app-layout>

    <main class="p-4 sm:ml-64 h-full">
        <div class="p-4 mt-14 rounded-lg dark:bg-gray-800
">

            <div class="flex justify-between">
                <h6 class="text-lg font-bold dark:text-white">Mis pagos</h6>
                <a href="{{route('pago.create')}}"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 
                            focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5
                            text-center"
                    >
                    Crear
                </a>

            </div>


            <div class="relative overflow-x-auto my-4">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Codigo
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Monto
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Estado
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Codigo transaccion
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Fecha emision
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Cliente
                            </th>
                            
                            <th scope="col" class="px-6 py-3">
                                Servicio
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Acciones
                            </th>

                        </tr>

                    </thead>
                    <tbody class="dark:text-white">

                        @foreach ($pagos as $pago)
                            <tr class="border-b dark:border-gray-700">
                                <td scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                                    {{ $pago->codigo }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $pago->monto }}
                                </td>
                                <td class="px-6 py-4">
                                    @if ($pago->estado==2)
                                        <span class="bg-green-400 text-white text-xs font-medium px-2 py-0.5 rounded dark:bg-primary-900 dark:text-primary-300">Pagado</span>
                                    @else
                                        <span class="bg-yellow-400 text-white text-xs font-medium px-2 py-0.5 rounded dark:bg-primary-900 dark:text-primary-300">En proceso</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    {{$pago->transaccion_id}}
                                </td>
                                <td class="px-6 py-4">
                                    {{ date('y-m-d H:i',strtotime($pago->femision))}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$pago->cliente->usuario->nombre}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$pago->servicio->nombre}}
                                </td>
                                
                                
                                <td class="px-6 py-4">
                                    <div class="flex gap-1">
                                        <a href="{{route('pago.show',$pago->codigo)}}"
                                        class="font-medium text-blue-600 hover:underline">Ver</a>

                                        
                                    </div>

                                    
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
