<x-app-layout>
    <main class="p-4 sm:ml-64 h-full">
        <div class="p-4 mt-10">
        <p>Dashboard</p>
        <h1>{{auth()->user()->usuario->nombre}}</h1>
        </div>
    </main>
</x-app-layout>