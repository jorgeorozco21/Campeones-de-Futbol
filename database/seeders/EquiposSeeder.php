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
            database_path('seeders/data/equipos/afc/equipos_corea_del_sur.json'),
        ];

        foreach ($archivos as $archivo) {

            if (!File::exists($archivo)) {
                continue;
            }

            $equipos = json_decode(File::get($archivo), true);

            foreach ($equipos as $equipo) {

                $escudo = $equipo['Escudo'];

                if (!str_starts_with($escudo, 'uploads/')) {
                    $escudo = 'uploads/' . $escudo;
                }

                DB::table('equipos')->updateOrInsert(
                    ['Nombre' => $equipo['Nombre']],
                    [
                        'Escudo' => $escudo,
                        'updated_at' => now(),
                        'created_at' => now(),
                    ]
                );
            }
        }
    }
}
