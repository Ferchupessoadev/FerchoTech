<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog - Fercho Tech</title>
    @include('partials.head')
</head>

<body class="bg-gray-900 text-gray-100 font-sans">
    <x-navbar.home></x-navbar.home>
    <section id="blog-preview" class="py-20 bg-gray-900 border-t border-gray-800">
    <div class="max-w-6xl mx-auto px-6">
        <div class="flex flex-col md:flex-row justify-between items-end mb-12">
            <div>
                <h3 class="text-3xl font-bold mb-2 text-white">Últimas del Blog</h3>
                <p class="text-gray-400">Recursos y guías para mantener tu tecnología al día.</p>
            </div>
            <a href="https://blog.tusitio.com" class="hidden md:flex items-center text-blue-500 hover:underline gap-2">
                Ver todas las entradas <i data-lucide="arrow-right" class="size-4"></i>
            </a>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            <a href="https://blog.tusitio.com/articulo-1" target="_blank" class="group bg-gray-800/20 p-6 rounded-2xl border border-gray-700 hover:border-blue-500/50 transition">
                <div class="flex flex-col sm:flex-row gap-6">
                    <div class="w-full sm:w-32 h-24 bg-gray-700 rounded-lg overflow-hidden shrink-0">
                        <img src="https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=200&q=80" class="w-full h-full object-cover group-hover:scale-110 transition duration-500" alt="">
                    </div>
                    <div>
                        <span class="text-xs font-bold text-blue-500 uppercase tracking-widest">Ciberseguridad</span>
                        <h4 class="text-xl font-bold text-white mt-1 group-hover:text-blue-400 transition">Tendencias de Seguridad IT para 2026</h4>
                        <p class="text-gray-400 text-sm mt-2 line-clamp-1">Protege tu empresa con estas nuevas estrategias...</p>
                    </div>
                </div>
            </a>

            <a href="https://blog.tusitio.com/articulo-2" target="_blank" class="group bg-gray-800/20 p-6 rounded-2xl border border-gray-700 hover:border-blue-500/50 transition">
                <div class="flex flex-col sm:flex-row gap-6">
                    <div class="w-full sm:w-32 h-24 bg-gray-700 rounded-lg overflow-hidden shrink-0">
                        <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=200&q=80" class="w-full h-full object-cover group-hover:scale-110 transition duration-500" alt="">
                    </div>
                    <div>
                        <span class="text-xs font-bold text-purple-500 uppercase tracking-widest">Optimización</span>
                        <h4 class="text-xl font-bold text-white mt-1 group-hover:text-blue-400 transition">Cómo mejorar la velocidad de tu web</h4>
                        <p class="text-gray-400 text-sm mt-2 line-clamp-1">Guía práctica para reducir tiempos de carga...</p>
                    </div>
                </div>
            </a>
        </div>

        <a href="https://blog.tusitio.com" class="md:hidden mt-8 w-full flex items-center justify-center py-3 bg-gray-800 rounded-xl text-blue-500 font-bold border border-gray-700">
            Ver todas las entradas
        </a>
    </div>
</section>
    <x-footer></x-footer>
</body>

</html>
