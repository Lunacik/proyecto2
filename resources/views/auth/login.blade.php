<x-login-layout>
    <main class=" bg-blue-50 dark:bg-gray-900 h-full w-full justify-center items-center flex">

        <div class="bg-white dark:bg-gray-700 flex items-center rounded-lg">
            <div class="min-w-96 p-4 z-10">

                <section class="pl-4 flex flex-col items-center py-2">
                    <img src="../resources/images/logo.png" class="w-20 rounded-full " alt="">
                    <p class="font-medium text-gray-900 dark:text-white">Estudio Jurídico Mallón Y Asociados</p>
                    
                </section>

                <h1 class="text-3xl ms-4 mt-4  font-semibold dark:text-white">Login</h1>

                <form class="mx-auto p-4 rounded-lg" method="POST" action="{{ route('login.auth') }}" class="mb-5">
                    @csrf
                    <label for="email"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo</label>
                    <input type="email" id="email" name="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 
                        focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" required />

                    <div class="mb-5">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Contraseña</label>
                        <input type="password" id="password" name="password"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required />
                    </div>

                    <div class="flex w-full justify-center">   
                        <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none
                         focus:ring-blue-300 font-medium rounded-lg text-sm w-full 
                          sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700
                           dark:focus:ring-blue-800">Ingresar</button>
                    </div>
                    

                </form>

            </div>
            <div >
                <img src="../resources/images/image.png" alt="" class="rounded-2xl mr-8 ">
            </div>
        </div>

    </main>

</x-login-layout>
