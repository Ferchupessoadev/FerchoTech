<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Creando los servicios principales...');
        Service::create([
            'name' => 'Soporte Técnico ',
            'icon' => 'settings-2',
            'description' => 'Resolución de problemas de hardware y software de manera eficiente y garantizada.'
        ]);

        Service::create([
            'name' => 'Desarrollo Web',
            'icon' => 'code-2',
            'description' => 'Creación de sitios modernos, escalables y optimizados con las últimas tecnologías del mercado.'
        ]);

        Service::create([
            'name' => 'Seguridad',
            'icon' => 'shield-check',
            'description' => 'Protección avanzada de datos, firewalls y optimización de redes críticas para tu empresa.'
        ]);

        $this->command->info('Servicios principales creados.');
    }
}
