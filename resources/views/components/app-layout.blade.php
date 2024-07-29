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

<body class="dark:bg-gray-900 h-screen w-screen">
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

    <script>
        const enable = document.getElementById('enablehour')
        const disable = document.getElementById('disablehour')
        enable.addEventListener('click', () => {
            localStorage.setItem('autohour', 'false')
            enable.hidden = true
            disable.hidden = false

        })

        disable.addEventListener('click', () => {
            localStorage.setItem('autohour', 'true')
            enable.hidden = false
            disable.hidden = true
            const nowHour = new Date().getHours()
            console.log(nowHour);
            if (nowHour >= 8 && nowHour <= 18) {
                document.documentElement.classList.remove('dark');
            } else {
                document.documentElement.classList.add('dark');
            }

        })
    </script>

    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC


        if (localStorage.getItem('autohour')) {
            const enable = document.getElementById('enablehour')
            const disable = document.getElementById('disablehour')
            const flag = localStorage.getItem('autohour')
            if (flag === 'true') {
                enable.hidden = false
                disable.hidden = true

                const nowHour = new Date().getHours()
                if (nowHour >= 8 && nowHour <= 18) {
                    document.documentElement.classList.remove('dark');
                } else {
                    document.documentElement.classList.add('dark');
                }

            } else {
                enable.hidden = true
                disable.hidden = false
                
                if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window
                        .matchMedia(
                            '(prefers-color-scheme: dark)').matches)) {
                    
                        document.documentElement.classList.add('dark');
                } else {
                    document.documentElement.classList.remove('dark')
                }

            }
        } else {
            localStorage.setItem('autohour', 'true')
            if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                    '(prefers-color-scheme: dark)').matches)) {
                
                    document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark')
            }
        }
    </script>
    <script>
        var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

        // Change the icons inside the button based on previous settings
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            themeToggleLightIcon.classList.remove('hidden');
        } else {
            themeToggleDarkIcon.classList.remove('hidden');
        }

        var themeToggleBtn = document.getElementById('theme-toggle');

        themeToggleBtn.addEventListener('click', function() {

            // toggle icons inside button
            themeToggleDarkIcon.classList.toggle('hidden');
            themeToggleLightIcon.classList.toggle('hidden');

            // if set via local storage previously
            if (localStorage.getItem('color-theme')) {
                if (localStorage.getItem('color-theme') === 'light') {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                }

                // if NOT set via local storage previously
            } else {
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                }
            }

        });
    </script>

</body>

</html>
