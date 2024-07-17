<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Estudio Jurídico Mallón y Asociados</title>

    <link rel="stylesheet" href="./css/highchart.css">
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

</head>

<body class="h-screen w-screen">
    <header>

    </header>


    <x-nav-bar>

    </x-nav-bar>

    <x-sidebar>

    </x-sidebar>

    {{ $slot }}

    <script>
        const openSidebar = () => {
            const nav = document.getElementById('logo-sidebar')
            const classNav = nav.classList.contains('-translate-x-full')

            if (classNav) {
                nav.classList.remove('-translate-x-full')
            } else {
                nav.classList.add('-translate-x-full')
            }
        }

        const openDropdown = () => {
            const dropd = document.getElementById('dropdown-user')
            const classNav = dropd.classList.contains('hidden')


            if (classNav) {
                dropd.classList.remove('hidden')
            } else {
                dropd.classList.add('hidden')
            }
        }
    </script>

</body>

</html>
