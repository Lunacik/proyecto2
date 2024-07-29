<x-app-layout>

    <main class="p-4 sm:ml-64 h-full">
        <div class="p-4 mt-10">

            <div class="flex justify-between">
                <h6 class="text-lg font-bold dark:text-white">Generar metodo de pago</h6>

            </div>

            <section class="bg-white  dark:bg-gray-900">
                <div class="2xl:px-0">
                    <div class="">

                        <div class="mt-6 sm:mt-8 grid grid-cols-1 w-full md:grid md:grid-cols-2 gap-4">

                            <form action="#" id="form-pay"
                                class=" rounded-lg border border-gray-200 
                                bg-white p-4 shadow-sm dark:border-gray-700 
                                dark:bg-gray-800 sm:p-6 lg:max-w-xl lg:p-8">
                                <span class="font-bold dark:text-white">Servicio</span>

                                <input hidden type="number" name="codigo" value="{{ $pago->codigo }}">
                                <div class="mb-6 flex flex-col gap-4">
                                    <div class="rounded-lg col-span-2 dark:text-white">
                                        <span>{{ $pago->servicio->nombre }}</span>
                                        <p>{{ $pago->servicio->descripcion }}</p>

                                    </div>
                                    <div class="border"></div>
                                    <div id="alertform" hidden class="p-4 mb-1 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                        <span class="font-medium">Alerta</span> Rellene todos los campos con datos validos.
                                      </div>
                                    <div class="col-span-2 sm:col-span-1">
                                        <label for="full_name"
                                            class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                            Nombre completo</label>
                                        <input type="text" name="nombre"
                                            value="{{ $pago->cliente->usuario->nombre }}"
                                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                            required />
                                    </div>

                                    <div class="col-span-2 sm:col-span-1">
                                        <label for="card-number-input"
                                            class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                            Correo</label>
                                        <input type="email" name="celectronico"
                                            value="{{ $pago->cliente->usuario->celectronico }}"
                                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 pe-10 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500  dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                            required />
                                    </div>

                                    <div>
                                        <label for="card-expiration-input"
                                            class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                            Telefono</label>
                                        <div class="relative">
                                            <input type="text" name="telefono"
                                                class=" w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 
                                                focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                                placeholder="" required />
                                        </div>
                                    </div>


                                    <button id="btnQr"
                                        class="text-white col-span-2 bg-blue-700 hover:bg-blue-800 focus:ring-4 
                                            focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5
                                            text-center">
                                        Generar pago
                                    </button>
                                </div>


                            </form>



                            <div class="">
                                <div
                                    class="rounded-lg border px-3 py-2 border-gray-100 bg-gray-50
                                     dark:border-gray-700 dark:bg-gray-800">
                                    <div class="">
                                        <dl class="flex items-center justify-between gap-4">
                                            <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Precio
                                            </dt>
                                            <dd class="text-base font-medium text-gray-900 dark:text-white">Bs.
                                                {{ $pago->monto }}
                                            </dd>
                                        </dl>

                                        <dl class="flex items-center justify-between gap-4">
                                            <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Descuento
                                            </dt>
                                            <dd class="text-base font-medium text-green-500">Bs. 0.0</dd>
                                        </dl>



                                        <dl class="flex items-center justify-between gap-4">
                                            <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Impuestos
                                            </dt>
                                            <dd class="text-base font-medium text-gray-900 dark:text-white">Bs. 0.0</dd>
                                        </dl>
                                    </div>

                                    <dl
                                        class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
                                        <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                                        <dd class="text-base font-bold text-gray-900 dark:text-white">Bs.
                                            {{ $pago->monto }}</dd>
                                    </dl>
                                </div>

                                <div  class="mt-1 flex flex-col items-center">

                                    <div id="loading-qr" hidden class="mt-10 md:mt-40" role="status ">
                                        <svg aria-hidden="true" class="inline w-10 h-10 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                        </svg>
                                        <span class="sr-only">Loading...</span>
                                        <span class="font-semibold dark:text-white">Cargando...</span>
                                    </div>

                                    <img class="h-80"
                                        id="imgresource"
                                        hidden
                                        src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/brand-logos/paypal.svg"
                                        alt="Qr" />

                                    <button  hidden id="btnverify" type="button"
                                        class="text-white col-span-2
                                        w-fit
                                         bg-blue-700 hover:bg-blue-800 focus:ring-4 
                                            focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5
                                            text-center">
                                        Verificar pago
                                    </button>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
            </section>


        </div>
    </main>
    <script>
        document.addEventListener("DOMContentLoaded", ()=> {
            const btnPay=document.getElementById('btnQr');
            btnPay.addEventListener('click',(event)=>{
                event.preventDefault()
                btnPay.disabled=true
                getImgQr()
            })

            const btnverify=document.getElementById('btnverify')
            btnverify.addEventListener('click',(event)=>{
                
                //Peticion de pago
            })
        });
        const getImgQr = async () => {
            try {
                const form = document.getElementById('form-pay')
                const data = new FormData()

                const codigo = form.codigo.value
                const email=form.celectronico.value
                const nombre=form.nombre.value
                const telefono=form.telefono.value
                if(!email || !nombre || !telefono){
                    showAlert()
                    activeButton(false)
                    return
                }

                loadingQr(false)

                console.log(codigo)
                data.append('email', email)
                data.append('nombre', nombre)
                data.append('telefono', telefono)

                console.log(Object.fromEntries(data.entries()))
                
                const response = await fetch(`http://localhost/project/public/api/pagos/${codigo}/qr`, {
                    method: 'POST',
                    body: data
                })

                loadingQr(true)
                activeButton(false)

                const values = await response.json()
                console.log(values)
                if(values.ok){
                    const imgElement = document.getElementById('imgresource')
                    imgElement.src = values.result.qr
                    showElementPay()
                
                }else{
                    alert('No ser pudo cargar el recurso')
                }

            } catch (e) {
                loadingQr(true)
                activeButton(false)
                console.log(e);
            }
        }

        const showElementPay=()=>{
            const img=document.getElementById('imgresource')
            img.hidden=false
            const button=document.getElementById('btnverify')
            button.hidden=false
        }

        const showAlert=()=>{
            const alert=document.getElementById('alertform');
            alert.hidden=false;
        }

        const activeButton=(value)=>{
            const button=document.getElementById('btnQr')
            button.disabled=value
            
        }

        const loadingQr=(value)=>{
            const loading=document.getElementById('loading-qr')
            loading.hidden=value
        }

        

    </script>
</x-app-layout>
