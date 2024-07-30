<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:border dark:border-gray-700 dark:bg-gray-800">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end">

                <button data-drawer-target="logo-sidebar" onclick="openSidebar()" data-drawer-toggle="logo-sidebar"
                    aria-controls="logo-sidebar" type="button"
                    class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden
            hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                        </path>
                    </svg>
                </button>

                @if (auth()->user()->usuario->tipo != '1')
                    <a href="./casos" class="flex ms-2 ">
                        <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 me-3" alt="FlowBite Logo" />
                        <span
                            class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">Logo
                        </span>
                    </a>
                @else
                    <a href="./dashboard" class="flex ms-2">
                        <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 me-3" alt="FlowBite Logo" />
                        <span
                            class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">Logo
                        </span>
                    </a>
                @endif

                <div class="hidden lg:block lg:pl-2">
                    <label for="topbar-search" class="sr-only">Buscar</label>
                    <div class="relative mt-1 lg:w-96">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="text" name="email" id="topbar-search"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg 
                            focus:ring-primary-500 focus:border-primary-500 block w-full pl-9 p-2.5 dark:bg-gray-700
                             dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Buscar">
                    </div>
                </div>


                <div class="z-50 absolute my-4 text-base   
              list-none bg-white divide-y dark:bg-gray-700 dark:text-white divide-gray-100 dark:divide-gray-600 rounded shadow"
                    id="search-general" style="top: 45px;left: 125px;">
                    <ul class="lg:w-96" id="list-search">
                    </ul>
                </div>



            </div>
            <div class="flex items-center">
                <div class="flex items-center ms-3">

                    <button onclick="openDropdownTheme()">
                        <svg class="w-6 h-6 text-gray-500 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 11.5h13m-13 0V18a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-6.5m-13 0V9a1 1 0 0 1 1-1h11a1 1 0 0 1 1 1v2.5M9 5h11a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1h-1" />
                        </svg>

                    </button>

                    <button hidden id="enablehour">
                        <svg class="w-6 h-6 text-gray-500 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M5.575 13.729C4.501 15.033 5.43 17 7.12 17h9.762c1.69 0 2.618-1.967 1.544-3.271l-4.881-5.927a2 2 0 0 0-3.088 0l-4.88 5.927Z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>

                    <button hidden id="disablehour">
                        <svg class="w-6 h-6 text-gray-500 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7.119 8h9.762a1 1 0 0 1 .772 1.636l-4.881 5.927a1 1 0 0 1-1.544 0l-4.88-5.927A1 1 0 0 1 7.118 8Z" />
                        </svg>
                    </button>

                    <button id="theme-toggle" type="button"
                        class="mr-2 text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 
                        focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1 ">
                        <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                        </svg>
                        <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                fill-rule="evenodd" clip-rule="evenodd"></path>
                        </svg>
                    </button>

                    <span
                        class="uppercase text-sm font-medium pr-2 dark:text-white">{{ auth()->user()->usuario->nombre }}</span>
                    <button type="button" onclick="openDropdown()"
                        class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300"
                        aria-expanded="false" data-dropdown-toggle="dropdown-user">
                        <span class="sr-only">Open user menu</span>
                        <img class="w-8 h-8 rounded-full"
                            src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo">
                    </button>


                    <div class="z-50  absolute my-4 text-base hidden
              list-none bg-white divide-y dark:bg-gray-700 dark:text-white divide-gray-100 dark:divide-gray-600 rounded shadow"
                        id="dropdown-theme" style="top: 25px;right: 180px;">

                        <ul class="py-1" role="none">
                            <li>
                                <button onclick="handlechangeTheme('nino')"
                                    class="w-full px-4 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600"
                                    role="menuitem">Niños</button>
                            </li>

                            <li>
                                <button onclick="handlechangeTheme('joven')"
                                    class="w-full px-4 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600"
                                    role="menuitem">Jovenes</button>
                            </li>


                            <li>
                                <button onclick="handlechangeTheme('adulto')"
                                    class="w-full px-4 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600"
                                    role="menuitem">Adultos</button>
                            </li>
                        </ul>
                    </div>

                    <div class="z-50 hidden absolute my-4 text-base  
              list-none bg-white divide-y dark:bg-gray-700 dark:text-white divide-gray-100 dark:divide-gray-600 rounded shadow"
                        id="dropdown-user" style="top: 30px;right: 30px;">

                        <div class="px-4 py-3" role="none">
                            <p class="text-sm " role="none">
                                {{ auth()->user()->usuario->nombre }}
                            </p>
                            <p class="text-sm font-medium  truncate" role="none">
                                {{ auth()->user()->email }}
                            </p>
                        </div>

                        <ul class="py-1" role="none">
                            @if (auth()->user()->usuario->tipo == '1')
                                <li>
                                    <a href="{{ route('dashboard') }}"
                                        class="block px-4 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600"
                                        role="menuitem">Dashboard</a>
                                </li>
                            @endif

                            <li>
                                <a href="#"
                                    class="block px-4 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600"
                                    role="menuitem">Mi perfil</a>
                            </li>

                            <li>
                                <a href="{{ route('logout') }}"
                                    class="block px-4 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600"
                                    role="menuitem">Salir</a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</nav>
