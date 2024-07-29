<x-app-layout>

    <main class="p-4 sm:ml-64 h-full">
        <div class="p-4 mt-10">
            <div class="flex justify-center dark:text-white">
                <h6 class="text-lg font-bold ">Formulario de creacion pago</h6>
            </div>
            <form class="max-w-md mx-auto" method="POST" action="{{ route('pago.store') }}">
                @csrf

                <div class=" flex flex-col gap-4">
                    <div class="relative z-0 w-full">
                        <input type="number" step="any" name="monto" value="{{ old('monto') }}"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 
                        border-gray-300 appearance-none 
                        focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder="" required/>
                        <label for="monto"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 
                        duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0
                         rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 
                         peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                         peer-focus:scale-75 peer-focus:-translate-y-6">
                            Monto</label>

                    </div>
                    <div>
                        <label for="underline_select" class="sr-only">Underline select</label>
                        <select id="underline_select" name="codigoservicio"
                            class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none 
                        dark:text-gray-400 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                            <option class="dark:text-white dark:bg-gray-700" value="" selected>Seleccion el servicio</option>

                            @foreach ($servicios as $servicio)
                                <option class="dark:text-white dark:bg-gray-700" value="{{ $servicio->codigo }}">{{ $servicio->nombre }}</option>
                            @endforeach

                        </select>

                    </div>

                    <div>
                        <label for="underline_select" class="sr-only">Underline select</label>

                        <select id="underline_select" name="cicliente"
                            class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2
                         border-gray-200 appearance-none dark:text-gray-400  focus:outline-none focus:ring-0
                          focus:border-gray-200 peer">

                            <option class="dark:text-white dark:bg-gray-700" value="" selected>Seleccione al cliente</option>
                            @foreach ($clientes as $cliente)
                                <option class="dark:text-white dark:bg-gray-700" value="{{ $cliente->ci }}">{{ $cliente->usuario->nombre }}</option>
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
