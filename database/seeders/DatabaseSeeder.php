<?php

namespace Database\Seeders;

use App\Models\Counter;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Counter::create([
            'nombre'=>'dashboard',
            'codigo'=>1,
            'contador'=>0
        ]);
        Counter::create([
            'nombre'=>'casos',
            'codigo'=>2,
            'contador'=>0
        ]);
        Counter::create([
            'nombre'=>'realizar cita',
            'codigo'=>3,
            'contador'=>0
        ]);
        Counter::create([
            'nombre'=>'citas',
            'codigo'=>4,
            'contador'=>0
        ]);
        Counter::create([
            'nombre'=>'clientes',
            'codigo'=>5,
            'contador'=>0
        ]);
        Counter::create([
            'nombre'=>'abogados',
            'codigo'=>6,
            'contador'=>0
        ]);
        Counter::create([
            'nombre'=>'usuarios',
            'codigo'=>7,
            'contador'=>0
        ]);
        Counter::create([
            'nombre'=>'servicios',
            'codigo'=>8,
            'contador'=>0
        ]);
        Counter::create([
            'nombre'=>'pagos',
            'codigo'=>9,
            'contador'=>0
        ]);
    }
}
