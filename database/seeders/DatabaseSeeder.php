<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         //CREAMOS LOS TIPO DE SERVICIO POR DEFECTO YA QUE SON SOLO ESTOS DOS
        DB::table('generos')->insert([
            'nombre' => 'Masculino',
        ]);
        DB::table('generos')->insert([
            'nombre' => 'Femenino',
        ]);

        \App\Models\User::factory(1)->create();
    }
}
