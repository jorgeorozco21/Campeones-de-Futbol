<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class EquiposSeeder extends Seeder
{
    public function run(): void
    {
        $archivos = [
            database_path('seeders/data/equipos/uefa/equipos_inglaterra.json'),
            database_path('seeders/data/equipos/uefa/equipos_alemania.json'),
        ];

        foreach ($archivos as $archivo) {

            if (!File::exists($archivo)) {
                continue;
            }

            $equipos = json_decode(File::get($archivo), true);

            foreach ($equipos as $equipo) {
                DB::table('equipos')->updateOrInsert(
                    ['Nombre' => $equipo['Nombre']], 
                    [
                        'Escudo' => $equipo['Escudo'],
                    ]
                );
            }
        }
    }
}
