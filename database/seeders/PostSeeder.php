<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pool de datos técnicos para el Blog de FerchoTech
        $blogData = [
            'Ciberseguridad' => [
                'description' => 'Guías operativas y tendencias para blindar infraestructuras digitales.',
                'posts' => [
                    [
                        'title' => 'Tendencias de Seguridad IT críticas para la segunda mitad de 2026',
                        'description' => 'Protege tu empresa analizando cómo implementar arquitecturas Zero Trust y blindar endpoints contra Ransomware.',
                        'content' => '<p>La seguridad informática ha dado un vuelco drástico este año. Con la sofisticación de los ataques basados en Inteligencia Artificial, las PYMES y corporativos necesitan implementar arquitecturas de <strong>Zero Trust</strong> de manera obligatoria.</p><p>En esta guía analizamos cómo proteger los endpoints de tu infraestructura, blindar los accesos remotos de tu equipo de trabajo y configurar políticas de respaldos inmutables ante amenazas.</p>',
                        'image_path' => 'https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=1200&q=80'
                    ],
                    [
                        'title' => 'Cómo auditar los puntos vulnerables de tu red local empresarial',
                        'description' => 'Aprende a mapear tu infraestructura y segmentar de manera inteligente los accesos a datos críticos.',
                        'content' => '<p>Mantener una red empresarial segura requiere auditorías constantes. Muchos problemas nacen de firmwares desactualizados en routers o contraseñas por defecto en dispositivos IoT corporativos.</p><p>Aprende a mapear tu infraestructura con herramientas profesionales y segmentar de manera inteligente los accesos a datos críticos.</p>',
                        'image_path' => 'https://images.unsplash.com/photo-1563986768609-322da13575f3?auto=format&fit=crop&w=600&q=80'
                    ]
                ]
            ],
            'Optimización Web' => [
                'description' => 'Estrategias de rendimiento, velocidad de carga y configuración avanzada de servidores.',
                'posts' => [
                    [
                        'title' => 'Cómo mejorar la velocidad de tu web usando Core Web Vitals',
                        'description' => 'Guía práctica para reducir tiempos de carga de tu servidor y optimizar la renderización inicial.',
                        'content' => '<p>La velocidad de carga no solo retiene usuarios, sino que define tu posicionamiento en Google. Reducir los tiempos del servidor y optimizar la renderización inicial (LCP) es vital.</p><p>Te explicamos paso a paso cómo implementar compresión avanzada, optimizar scripts de terceros y configurar sistemas de almacenamiento en caché en servidores Linux.</p>',
                        'image_path' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=1200&q=80'
                    ],
                    [
                        'title' => 'Servidores Nginx vs Apache: ¿Cuál elegir en proyectos de alta demanda?',
                        'description' => 'Analizamos el consumo de recursos bajo concurrencia extrema para decidir tu servidor web.',
                        'content' => '<p>Elegir el servidor web correcto impacta directamente en el consumo de RAM y CPU de tus servidores. Analizamos el rendimiento bajo alta demanda concurrente y cuál se adapta mejor a arquitecturas modernas.</p>',
                        'image_path' => 'https://images.unsplash.com/photo-1600132806370-bf17e65e942f?auto=format&fit=crop&w=600&q=80'
                    ]
                ]
            ],
            'Infraestructura Cloud' => [
                'description' => 'Diseño de arquitecturas en la nube, migraciones y alta disponibilidad.',
                'posts' => [
                    [
                        'title' => 'Estrategias de migración a la nube sin caídas de servicio',
                        'description' => 'Muda tus sistemas locales a entornos Cloud garantizando que tus clientes sigan operando con normalidad.',
                        'content' => '<p>Mudar tus sistemas locales a la nube puede ser estresante. Desarrollar una estrategia de migración progresiva garantiza que tus clientes sigan operando con normalidad.</p><p>Evaluamos arquitecturas híbridas, balanceadores de carga y cómo mitigar los riesgos de pérdida de información durante la transferencia de bases de datos masivas.</p>',
                        'image_path' => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=600&q=80'
                    ]
                ]
            ]
        ];

        $now = Carbon::now();
        $dayOffset = 0;

        foreach ($blogData as $categoryName => $data) {

            // Creamos la categoría usando el Modelo Eloquent
            $category = Category::create([
                'name' => $categoryName,
                'slug' => Str::slug($categoryName),
                'description' => $data['description'],
            ]);

            // Creamos los posts vinculados a la categoría
            foreach ($data['posts'] as $postData) {
                Post::create([
                    'title' => $postData['title'],
                    'slug' => Str::slug($postData['title']),
                    'description' => $postData['description'],
                    'content' => $postData['content'],
                    'image_path' => $postData['image_path'],
                    'is_published' => true,
                    'category_id' => $category->id, // El ID se obtiene limpio del objeto recién creado

                    // Simulación de historial cronológico escalonado
                    'created_at' => $now->copy()->subDays($dayOffset * 3),
                    'updated_at' => $now->copy()->subDays($dayOffset * 3),
                ]);

                $dayOffset++;
            }
        }
    }
}
