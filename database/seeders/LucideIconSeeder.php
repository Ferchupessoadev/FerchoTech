<?php

namespace Database\Seeders;

use App\Models\LucideIcon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class LucideIconSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Descargando iconos desde la API de Lucide...');

        $response = Http::get('https://lucide.dev/api/tags');

        if ($response->failed()) {
            $this->command->error('No se pudo conectar con la API de Lucide.');
            return;
        }

        $lucideTags = $response->json();

        $this->command->info('Insertando iconos en la base de datos (esto puede tardar unos segundos)...');

        foreach ($lucideTags as $nombreIcono => $listaDeTags) {
            LucideIcon::updateOrCreate(
                ['id' => $nombreIcono],
                ['tags' => $listaDeTags]
            );
        }

        $this->command->info('¡Todos los iconos se han importado correctamente!');
    }
}
