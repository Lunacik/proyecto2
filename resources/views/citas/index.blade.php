<x-app-layout>

    <main class="p-4 sm:ml-64 h-full">
        <div class="p-4 mt-10">

            <div class="flex justify-between">
                <h6 class="text-lg font-bold">Citas</h6>
                <button onclick='handleOpenModalCreate()'
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 
                            focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5
                            text-center"
                    type="button">
                    Crear
                </button>

            </div>


            <div class="relative overflow-x-auto my-4">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Numero
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Texto
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Acciones
                            </th>

                        </tr>

                    </thead>
                    <tbody>

                        @foreach ($citas as $cita)
                            <tr class="bg-white border-b">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $cita->numero }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $cita->texto }}
                                </td>
                                <td class="px-6 py-4">

                                    <button onclick='handleOpenModalUpdate({{ json_encode($cita) }})'
                                        class="font-medium text-blue-600 hover:underline">Editar</a>
                                </td>

                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>


        <!-- Modal create -->
        <div id="cita-modal-create" class=" hidden absolute z-50 top-1/2 left-1/2 "
        style="transform: translate(-50%,-50%)">
            
                <!-- Modal content -->
                <div class=" bg-white rounded-lg shadow min-w-96 ">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                        <h3 class="text-lg font-semibold text-gray-900">
                            Crear nueva cita

                        </h3>

                        <button type="button" onclick="handleCloseCreate()"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                            data-modal-toggle="cita-modal">

                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>


                            <span class="sr-only">Close modal</span>
                        </button>

                    </div>
                    <!-- Modal body -->
                    <form id="form-cita-create" class="p-4 md:p-5" action="{{route('cita.store')}}" method="POST">
                        @csrf

                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="texto" class="block mb-2 text-sm font-medium text-gray-900">Texto</label>
                                <input type="text" name="texto" id="texto" value="{{ old('texto') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                    placeholder="" required>
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



        <!-- Modal update -->
        <div id="cita-modal-update" tabindex="-1" class=" hidden absolute z-50 top-1/2 left-1/2 "
        style="transform: translate(-50%,-50%)">
            
                <!-- Modal content -->
                <div class=" bg-white rounded-lg shadow min-w-96 ">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                        <h3 class="text-lg font-semibold text-gray-900">
                            Actualizar cita

                        </h3>

                        <button type="button" onclick="handleCloseUpdate()"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                            data-modal-toggle="cita-modal">

                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>

                            <span class="sr-only">Close modal</span>
                        </button>

                    </div>
                    <!-- Modal body -->
                    <form id="form-cita-update" class="p-4 md:p-5" action="" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="texto" class="block mb-2 text-sm font-medium text-gray-900">Texto</label>
                                <input type="text" name="texto" id="texto" value="{{ old('texto') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                    placeholder="" required>
                            </div>

                        </div>
                        <button type="button" onclick="handleUpdateCita()"
                            class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none
                             focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center 
                            ">
                            Actualizar
                        </button>
                    </form>
                </div>


            
        </div>


    </main>
    <script>
        const handleOpenModalCreate = () => {
            let modal = document.getElementById('cita-modal-create')
            modal.classList.remove('hidden')
        }

        const handleCloseCreate = () => {
            let modal = document.getElementById('cita-modal-create')
            modal.classList.add('hidden')
        }

        const handleSaveCita = () => {
            let formCreateCita = document.getElementById('form-cita-create')

            formCreateCita.submit()
        }

        //update
        const handleOpenModalUpdate = (value) => {
            let modal = document.getElementById('cita-modal-update')

            let formUpdateCita = document.getElementById('form-cita-update')
            const path=window.location.pathname;
            formUpdateCita.action = `${path}/${value.numero}`

            formUpdateCita.texto.value = value.texto

            modal.classList.remove('hidden')
        }

        const handleCloseUpdate = () => {
            let modal = document.getElementById('cita-modal-update')
            modal.classList.add('hidden')
        }

        const handleUpdateCita = () => {
            let formUpdateCita = document.getElementById('form-cita-update')

            formUpdateCita.submit()
        }
    </script>
</x-app-layout>
