<x-app-layout>
    <main class="p-4 sm:ml-64 h-full">
        <div class="p-4 mt-10">

            <div class="flex justify-between">
                <h6 class="text-lg font-bold dark:text-white">Dashboard</h6>
            </div>

        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 lg:grid gap-2">
            <div class="flex flex-col gap-1">

                <div
                    class=" p-5 min-w-40 bg-white border border-gray-200 rounded-lg shadow
                     hover:bg-gray-100 dark:bg-gray-800 text-center dark:border-gray-700 dark:hover:bg-gray-700">

                    <h5 class="mb-2 text-md font-bold tracking-tight text-gray-500 dark:text-white">Abogados</h5>
                    <p class="text-center text-4xl font-bold text-gray-700 dark:text-gray-400">{{$abogados}}</p>
                </div>

                <div
                    class=" p-5 min-w-40 bg-white border border-gray-200 rounded-lg shadow
                 hover:bg-gray-100 dark:bg-gray-800 text-center dark:border-gray-700 dark:hover:bg-gray-700">

                    <h5 class="mb-2 text-md font-bold tracking-tight text-gray-500 dark:text-white">Clientes</h5>
                    <p class="text-center text-4xl font-bold text-gray-700 dark:text-gray-400">{{$clientes}}</p>
                </div>

            </div>


            <figure class="highcharts-figure" style="margin: 0">
            
                    <div id="container" class="rounded-lg "></div>
                
                
            </figure>
            <figure class="highcharts-figure" style="margin: 0">
                <div id="container-line" class="rounded-lg"></div>
            </figure>
        </div>

        <div class="absolute bottom-0 m-2 text-lg font-semibold dark:text-white">
            <p>Visitas : <span>{{$contador->contador}}</span></p>
        </div>

    </main>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            loadCharCitasPorMes()
            loadLineChartServiciosAtentidos()
        });

        
        const getServicios = async () => {
            try {
                const response = await fetch('https://www.tecnoweb.org.bo/inf513/grupo03sa/project/public/api/dashboard/servicios')
                const data = await response.json()
                 const result = data.map((value) => {
                     return{
                         y: value.cantidad,
                         name: value.nombre
                     }
                 })
                return result;
            } catch (e) {
                console.log(e)
                return [];

            }
        }

        const getCitas = async () => {
            try {
                const response = await fetch('https://www.tecnoweb.org.bo/inf513/grupo03sa/project/public/api/dashboard/citas')
                const data = await response.json()
                 const result = data.map((value) => value.cantidad)
                return result;
            } catch (e) {
                console.log(e)
                return [];

            }
        }

        const loadLineChartServiciosAtentidos = async () => {
            const datas = await getServicios()

            Highcharts.chart('container-line', {
                chart: {
                    type: 'pie',
                
                    backgroundColor: '#f8fafc'
                    
                },
                title: {
                    text: 'Porcentaje de servicios solicitados',
                    align: 'left'
                },
                tooltip: {
                    valueSuffix: '%'
                },
                plotOptions: {
                    series: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: [{
                            enabled: true,
                            distance: 20
                        }, {
                            enabled: true,
                            distance: -30,
                            format: '{point.percentage:.1f}%',
                            style: {
                                fontSize: '0.9em',
                                textOutline: 'none',
                                opacity: 0.7
                            },
                            filter: {
                                operator: '>',
                                property: 'percentage',
                                value: 10
                            }
                        }]
                    }
                },
                series: [{
                    name: 'Percentage',
                    colorByPoint: true,
                    data: datas
                }]
            });
        }

        const loadCharCitasPorMes = async () => {
            const datas=await getCitas();

            Highcharts.chart('container', {

                title: {
                    text: 'Cantidad de citas solicitadas',
                    align: 'left'
                },
                chart:{
                    backgroundColor: '#f8fafc'
                },


                yAxis: {
                    title: {
                        text: 'Cantidad de citas'
                    }
                },

                xAxis: {
                    accessibility: {
                        rangeDescription: 'Rango: 1 a 12'
                    }
                },

                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle'
                },



                series: [{
                    name: 'Meses del año ',
                    data: datas
                }],

                responsive: {
                    rules: [{
                        condition: {
                            maxWidth: 500,

                        },
                        chartOptions: {
                            legend: {
                                layout: 'horizontal',
                                align: 'center',
                                verticalAlign: 'bottom'
                            }
                        }
                    }]
                }

            });

        }
    </script>
</x-app-layout>
