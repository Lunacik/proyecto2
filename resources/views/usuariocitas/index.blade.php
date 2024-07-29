<x-app-layout>

    <main class="p-4 sm:ml-64 h-full">
        <div class="p-4 mt-14 rounded-lg dark:bg-gray-800">

            <div class="flex justify-between">
                <h6 class="text-lg font-bold dark:text-white">Mis Citas</h6>
                <button onclick="handleOpenModalCitas()"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4
             focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 
             focus:outline-none
             
              ">Crear</a>
            </div>

            <div class="relative overflow-x-auto my-4">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Fecha
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Numero de mensaje
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Texto
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Acciones
                            </th>

                        </tr>

                    </thead>
                    <tbody class="dark:text-white">

                        @foreach ($usuario as $cita)
                            <tr class=" border-b dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                                    {{ date('y-m-d H:i',strtotime($cita->fecha))}}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $cita->cita->numero }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ $cita->cita->texto }}
                                </td>

                                <td class="px-6 py-4">
                                    <a href="#"
                                        class="font-medium text-blue-600 box-content hover:underline">Editar</a>




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

    <div id="cita-modal-select" class=" hidden absolute z-50 top-1/2 left-1/2 " style="transform: translate(-50%,-50%)">

        <!-- Modal content -->
        <div class=" bg-white rounded-lg shadow min-w-96 dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Citas

                </h3>

                <button type="button" onclick="handleCloseSelect()"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                    data-modal-toggle="cita-modal">

                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>


                    <span class="sr-only">Close modal</span>
                </button>

            </div>
            <!-- Modal body -->
            <form id="form-cita-select" class="p-4 md:p-5" action="{{ route('cita.usuario.store') }}" method="POST">
                @csrf

                <div class="mb-4 grid-cols-2">


                    <div class="w-full">
                        <label for="underline_select" class="sr-only">Underline select</label>
                        <select id="underline_select" name="numerocita"
                            class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none 
                    dark:text-gray-400 focus:outline-none focus:ring-0 focus:border-gray-200 peer
                    ">
                            <option class="dark:bg-gray-700 dark:text-white" value="" selected>Seleccion una cita</option>

                            @foreach ($citas as $cita)
                                <option class="dark:bg-gray-700 dark:text-white" value="{{ $cita->numero }}">{{ $cita->texto }}</option>
                            @endforeach

                        </select>

                    </div>

                    <div class="flex flex-col">

                        <label for="time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha
                            y hora:</label>
                        

                            <input type="datetime-local" name="fecha"
                                class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700
                                 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        

                    </div>
                </div>
                <button type="button" onclick="handleSaveCita()"
                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none
                 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center 
                ">
                    Guardar
                </button>
            </form>
        </div>

    </div>

    <script>
        const handleOpenModalCitas = () => {
            let modal = document.getElementById('cita-modal-select')
            modal.classList.remove('hidden')
        }

        const handleCloseSelect = () => {
            let modal = document.getElementById('cita-modal-select')
            modal.classList.add('hidden')
        }

        const handleSaveCita = () => {
            let formSelectCita = document.getElementById('form-cita-select')

            formSelectCita.submit()
        }
    </script>

</x-app-layout>
