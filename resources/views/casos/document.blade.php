<x-app-layout>

    <main class="p-4 sm:ml-64 h-full">
        <div class="p-4 mt-10">
            <div class="flex justify-center">
                <h6 class="text-lg font-bold dark:text-white">Registro de documento para el caso : {{$caso->codigo}}</h6>
            </div>

            <form class="max-w-md mx-auto " method="POST" action="{{route('caso.documento.store',$caso->codigo)}}">
                @csrf

                <div class="relative z-0 w-full mb-5 group ">
                    <input type="text" name="nombre" value="{{ old('nombre') }}"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 
                    border-gray-300 appearance-none 
                    focus:outline-none focus:ring-0 focus:border-blue-600 peer
                    dark:text-white"
                        placeholder=" " required />
                    <label for="ci"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 
                    duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 
                    rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 
                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 
                    peer-focus:-translate-y-6">
                        Nombre
                    </label>
                </div>

                @error('nombre')
                    <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50"
                        role="alert">
                        <svg class="flex-shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Danger</span>
                        <div>

                            <span class="font-medium"> {{ $message }}:</span>

                        </div>
                    </div>
                @enderror

                <div class="relative z-0 w-full mb-5 group">
                    <input type="number" name="numero" value="{{ old('numero') }}"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 
                    border-gray-300 appearance-none 
                    focus:outline-none focus:ring-0 focus:border-blue-600 peer
                    dark:text-white"
                        placeholder=" " required />
                    <label for="numero"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 
                    duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 
                    rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 
                    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 
                    peer-focus:-translate-y-6">
                        Numero
                    </label>
                </div>

                @error('numero')
                <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50"
                    role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Danger</span>
                    <div>

                        <span class="font-medium"> {{ $message }}:</span>

                    </div>
                </div>
            @enderror


                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none 
                focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center
                ">Crear</button>
            </form>
        </div>
    </main>


</x-app-layout>
