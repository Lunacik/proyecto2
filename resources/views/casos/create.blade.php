<x-app-layout>

    <main class="p-4 sm:ml-64 h-full">
        <div class="p-4 mt-10">
            <div class="flex justify-center">
                <h6 class="text-lg font-bold">Formulario de creacion casos</h6>
            </div>
            <form class="max-w-md mx-auto" method="POST" action="/casos">
                @csrf

                <div class=" flex flex-col gap-4">
                    <div>
                        <label for="underline_select" class="sr-only">Underline select</label>
                        <select id="underline_select" name="ciabogado"
                            class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none 
                        dark:text-gray-400 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                            <option value="" selected>Seleccion un abogado</option>

                            @foreach ($abogados as $abogado)
                                <option value="{{ $abogado->ci }}">{{ $abogado->usuario->nombre }}</option>
                            @endforeach

                        </select>

                    </div>

                    <div>
                        <label for="underline_select" class="sr-only">Underline select</label>

                        <select id="underline_select" name="codcliente"
                            class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2
                         border-gray-200 appearance-none dark:text-gray-400  focus:outline-none focus:ring-0
                          focus:border-gray-200 peer">

                            <option value="" selected>Seleccione al cliente</option>
                            @foreach ($clientes as $cliente)
                                <option value="{{ $cliente->ci }}">{{ $cliente->usuario->nombre }}</option>
                            @endforeach

                        </select>
                    </div>

                    <div>
                        <label for="underline_select" class="sr-only">Underline select</label>

                        <select id="underline_select" name="codservicio"
                            class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2
                         border-gray-200 appearance-none dark:text-gray-400  focus:outline-none focus:ring-0
                          focus:border-gray-200 peer">

                            <option value="" selected>Seleccione el servicio</option>
                            @foreach ($servicios as $servicio)
                                <option value="{{ $servicio->codigo}}">{{ $servicio->nombre }}</option>
                            @endforeach

                        </select>
                    </div>

                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none 
            focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center
            ">Crear</button>

                </div>



            </form>
        </div>
    </main>


</x-app-layout>
