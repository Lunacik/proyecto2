<x-app-layout>

    <main class="p-4 sm:ml-64 h-full">
        <div class="p-4 mt-14  rounded-lg dark:bg-gray-800">

            <div class="flex justify-between">
                <h6 class="text-lg font-bold dark:text-white">Servicios</h6>
                <button onclick='handleOpenModalCreate()'
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 
                            focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5
                            text-center"
                    type="button">
                    Crear
                </button>

            </div>



            <div class="relative overflow-x-auto my-4">
                @if (session('servicio-delete'))
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <span class="font-medium">Error: </span> 
                    {{session('servicio-delete')}}
                  </div>
                    
                @endif
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Codigo
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nombre
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Descripcion
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Acciones
                            </th>

                        </tr>

                    </thead>
                    <tbody class="dark:text-white">

                        @foreach ($servicios as $servicio)
                            <tr class="dark:border-gray-700 border-b">
                                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                                    {{ $servicio->codigo }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $servicio->nombre }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $servicio->descripcion }}
                                </td>

                                <td class="px-6 py-4">
                                    <div class="flex gap-1">
                                        <button onclick='handleOpenModalUpdate({{ json_encode($servicio) }})'
                                            class="font-medium text-blue-600 hover:underline">Editar</button>
                                        <form method="POST" action="{{ route('servicio.delete', $servicio->codigo) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="font-medium text-red-500  hover:underline">Eliminar</button>
                                        </form>
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

    <div id="servicio-modal-create" class=" hidden absolute z-50 top-1/2 left-1/2 "
        style="transform: translate(-50%,-50%)">

        <!-- Modal content -->
        <div class=" bg-white rounded-lg shadow min-w-96 dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Crear nueva servicio

                </h3>

                <button type="button" onclick="handleCloseCreate()"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                    data-modal-toggle="servicio-modal">

                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>


                    <span class="sr-only">Close modal</span>
                </button>

            </div>
            <!-- Modal body -->
            <form id="form-servicio-create" class="p-4 md:p-5" action="{{ route('servicio.store') }}" method="POST">
                @csrf

                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="texto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>

                        <input type="text" name="nombre"
                            class="bg-gray-50 border dark:text-white  border-gray-300 dark:bg-gray-700 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            placeholder="" required>
                    </div>
                    <div class="col-span-2">
                        <label for="texto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripcion</label>

                        <input type="text" name="descripcion"
                            class="bg-gray-50 border dark:bg-gray-700 dark:text-white border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            placeholder="" required>
                    </div>

                </div>
                <button type="button" onclick="handleSaveservicio()"
                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none
                         focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center 
                        ">
                    Guardar
                </button>
            </form>
        </div>

    </div>



    <!-- Modal update -->
    <div id="servicio-modal-update" class=" hidden absolute z-50 top-1/2 left-1/2 "
        style="transform: translate(-50%,-50%)">
        <div class="relative p-4  w-96">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Actualizar servicio

                    </h3>

                    <button type="button" onclick="handleCloseUpdate()"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        data-modal-toggle="servicio-modal">

                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>

                        <span class="sr-only">Close modal</span>
                    </button>

                </div>
                <!-- Modal body -->
                <form id="form-servicio-update" class="p-4 md:p-5" action="" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="texto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                            <input type="text" name="nombre"
                                class="bg-gray-50 border border-gray-300 dark:text-white dark:bg-gray-700 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="" required>
                        </div>

                        <div class="col-span-2">
                            <label for="texto"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripcion</label>
                            <input type="text" name="descripcion" id="descripcion"
                                class="bg-gray-50 border border-gray-300 dark:text-white dark:bg-gray-700 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="" required>
                        </div>


                    </div>
                    <button type="button" onclick="handleUpdateservicio()"
                        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none
                         focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center 
                        ">
                        Actualizar
                    </button>
                </form>
            </div>


        </div>
    </div>


    <script>
        const handleOpenModalCreate = () => {
            let modal = document.getElementById('servicio-modal-create')
            modal.classList.remove('hidden')
        }

        const handleCloseCreate = () => {
            let modal = document.getElementById('servicio-modal-create')
            modal.classList.add('hidden')
        }

        const handleSaveservicio = () => {
            let formCreateServicio = document.getElementById('form-servicio-create')

            formCreateServicio.submit()
        }

        //update
        const handleOpenModalUpdate = (value) => {
            let modal = document.getElementById('servicio-modal-update')

            let formUpdateServicio = document.getElementById('form-servicio-update')

            const path = window.location.pathname;

            formUpdateServicio.action = `${path}/${value.codigo}`

            formUpdateServicio.nombre.value = value.nombre
            formUpdateServicio.descripcion.value = value.descripcion

            modal.classList.remove('hidden')
        }

        const handleCloseUpdate = () => {
            let modal = document.getElementById('servicio-modal-update')
            modal.classList.add('hidden')
        }

        const handleUpdateservicio = () => {
            let formUpdateServicio = document.getElementById('form-servicio-update')

            formUpdateServicio.submit()
        }
    </script>

</x-app-layout>
