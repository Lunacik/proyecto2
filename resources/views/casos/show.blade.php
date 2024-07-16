<x-app-layout>
    <main class="p-4 sm:ml-64 h-full">
        <div class="p-4 mt-10">
            <div class="flex">
                <h6 class="text-lg font-bold">
                    Detalles del Caso </h6>
            </div>

            <div
                class="grid mb-8 border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 md:mb-12 md:grid-cols-2 bg-white dark:bg-gray-800">
                <figure
                    class="flex p-2 flex-col bg-white border-b border-gray-200 rounded-t-lg md:rounded-t-none md:rounded-ss-lg
                     md:border-e dark:bg-gray-800 dark:border-gray-700">
                    <blockquote class="max-w-2xl mb-2 text-gray-500 lg:mb-4 dark:text-gray-400">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Codigo : {{ $caso->codigo }}
                        </h3>
                        {{-- <p class="my-2">If you care for your time, I hands down would go with this."</p> --}}
                    </blockquote>

                    <span>Abogado</span>

                    <figcaption class="flex p-2 ">

                        <div class="space-y-0.5 font-medium dark:text-white text-left rtl:text-right ms-3">
                            <div>{{ $caso->abogado->usuario->nombre }}</div>
                            {{-- <div class="text-sm text-gray-500 dark:text-gray-400 ">Developer at Open AI</div> --}}
                        </div>
                    </figcaption>

                    <span>Cliente</span>

                    <figcaption class="flex p-2 ">

                        <div class="space-y-0.5 font-medium dark:text-white text-left rtl:text-right ms-3">
                            <div>{{ $caso->cliente->usuario->nombre }}</div>
                            {{-- <div class="text-sm text-gray-500 dark:text-gray-400 ">Developer at Open AI</div> --}}
                        </div>
                    </figcaption>

                </figure>

                <div>
                    <div class="flex justify-between p-2">
                        <h3>Servicios</h3>
                        <button onclick="handleOpenModalSelect()"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4
             focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 
             focus:outline-none
             
              ">Agregar</button>
                    </div>

                    <div class="w-full grid grid-cols-2 lg:grid lg:grid-cols-4 p-1 gap-1
                    justify-center text-gray-500 bg-white rounded-lg dark:bg-gray-800 dark:text-gray-400 overflow-auto"
                        role="alert">
                        @foreach ($caso->servicios as $servicio)
                            <div class="flex border border-gray-200 shadow rounded-lg">

                                <div class="ms-3 text-[12px] flex flex-col">
                                    <span
                                        class="mb-1 text-gray-900 dark:text-white">{{ $servicio->nombre }}</span>

                                        <a href=""
                                            class="font-medium text-blue-600 box-content hover:underline">Cerrar</a>
    
                                </div>


                                <button type="button"
                                    class="ms-auto  bg-white justify-center
                             items-center flex-shrink-0 text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 
                             hover:bg-gray-100 inline-flex h-5 w-5 dark:text-gray-500 dark:hover:text-white
                              dark:bg-gray-800 dark:hover:bg-gray-700"
                                    data-dismiss-target="#toast-message-cta" aria-label="Close">
                                    <span class="sr-only">Close</span>
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                </button>

                            </div>
                        @endforeach


                    </div>

                </div>

            </div>

            <div class="flex justify-between">
                <h3>Documentos</h3>
                <a href="{{route('caso.documento.create',$caso->codigo)}}"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4
             focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 
             focus:outline-none
             
              ">Agregar</a>
            </div>

            <div class="grid grid-cols-2 lg:grid lg:grid-cols-6 justify-center gap-1 w-full mt-2">
                @foreach ($caso->documentos as $documento)
                    <div class="flex flex-col gap-2 border border-gray-200 shadow rounded-lg p-4">
                        <p>{{ $documento->nombre }}</p>
                        <span>{{ $documento->numero }}</span>
                    </div>
                @endforeach

            </div>

        </div>
    </main>
    </div>

    <div id="servicio-modal-select" class=" hidden absolute z-50 top-1/2 left-1/2 "
        style="transform: translate(-50%,-50%)">

        <!-- Modal content -->
        <div class=" bg-white rounded-lg shadow min-w-96 ">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-lg font-semibold text-gray-900">
                    Servicios

                </h3>

                <button type="button" onclick="handleCloseSelect()"
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
            <form id="form-servicio-select" class="p-4 md:p-5" action="{{route('caso.servicio.store',$caso->codigo)}}"
                method="POST">
                @csrf

                <div class="mb-4 grid-cols-2">


                    <div class="w-full">
                        <label for="underline_select" class="sr-only">Underline select</label>
                        <select id="underline_select" name="codigoservicio"
                            class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none 
                        dark:text-gray-400 focus:outline-none focus:ring-0 focus:border-gray-200 peer
                        ">
                            <option value="" selected>Seleccion un servicio</option>

                            @foreach ($servicios as $servicio)
                                <option value="{{ $servicio->codigo }}">{{ $servicio->nombre }}</option>
                            @endforeach

                        </select>

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

    <script>
        const handleOpenModalSelect = () => {
            let modal = document.getElementById('servicio-modal-select')
            modal.classList.remove('hidden')
        }

        const handleCloseSelect = () => {
            let modal = document.getElementById('servicio-modal-select')
            modal.classList.add('hidden')
        }

        const handleSaveservicio = () => {
            let formSelectServicio = document.getElementById('form-servicio-select')

            formSelectServicio.submit()
        }
    </script>
</x-app-layout>
