<x-layouts.app title="Blog - Recursos y Guías Tecnológicas">
    <x-slot:seo>
        <meta name="description" content="Explora artículos, tutoriales, novedades y consejos sobre desarrollo web, seguridad informática y soporte técnico en el blog oficial de Fercho Tech.">
        <meta name="robots" content="index, follow">

        <!-- Open Graph -->
        <meta property="og:title" content="Blog de Tecnología y Desarrollo - Fercho Tech">
        <meta property="og:description" content="Aprende sobre programación, infraestructura y tendencias tecnológicas con nuestros artículos.">
        <meta property="og:url" content="https://ferchudev.com/blog">
    </x-slot:seo>

    <section id="blog" class="py-28 min-h-screen bg-gradient-to-b from-[#0b1329] to-[#080d1c] text-white relative overflow-hidden">

        <div class="absolute top-10 left-1/4 size-96 bg-blue-500/5 rounded-full blur-[120px] pointer-events-none"></div>
        <div class="absolute bottom-10 right-1/4 size-96 bg-purple-500/5 rounded-full blur-[120px] pointer-events-none"></div>

        <div class="max-w-6xl mx-auto px-4 sm:px-6 relative z-10">

            <div class="text-center md:text-left mb-14 max-w-2xl">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-blue-500/10 text-blue-400 rounded-full text-xs font-bold uppercase tracking-wider border border-blue-500/20 mb-4 shadow-sm">
                    <i data-lucide="book-open" class="size-3.5"></i>
                    Artículos y Tutorías
                </span>
                <h2 class="text-3xl sm:text-4xl font-extrabold tracking-tight text-white leading-tight">
                    Blog de <span class="bg-gradient-to-r from-blue-400 via-cyan-400 to-teal-400 bg-clip-text text-transparent">FerchoTech</span>
                </h2>
                <p class="text-slate-400 mt-3 text-base leading-relaxed">
                    Recursos, análisis y guías prácticas detalladas para mantener tu infraestructura y tecnología siempre al día.
                </p>
            </div>
            <div class="mt-10 mb-12 flex flex-col md:flex-row gap-4 items-center justify-between">
                <form action="{{ route('blog.index') }}" method="GET" class="w-full md:w-auto flex-1 max-w-lg">
                    <div class="relative group">
                        <i data-lucide="search" class="absolute left-3 top-1/2 -translate-y-1/2 size-5 text-slate-500"></i>
                        <input type="text" name="search" value="{{ request('search') }}"
                               placeholder="Buscar artículos técnicos..."
                               class="w-full bg-slate-900/50 border border-slate-700 rounded-xl py-3 pl-10 pr-4 text-white placeholder-slate-500 focus:outline-none focus:border-blue-500 transition-all">
                    </div>
                </form>
                <div class="flex gap-2 overflow-x-auto pb-2 md:pb-0 scrollbar-hide">
                    <a href="{{ route('blog.index') }}"
                       class="px-4 py-2 rounded-full text-xs font-bold border {{ !request('category') ? 'bg-blue-600 border-blue-500 text-white' : 'bg-slate-900 border-slate-700 text-slate-400 hover:border-slate-500' }} transition-all">
                        Todos
                    </a>
                    @foreach($categories as $cat)
                        <a href="{{ route('blog.index', ['category' => $cat->slug]) }}"
                           class="px-4 py-2 rounded-full text-xs font-bold border {{ request('category') == $cat->slug ? 'bg-blue-600 border-blue-500 text-white' : 'bg-slate-900 border-slate-700 text-slate-400 hover:border-slate-500' }} transition-all whitespace-nowrap">
                            {{ $cat->name }}
                        </a>
                    @endforeach
                </div>
            </div>

            @if($posts->count() > 0)
                @if($featuredPost = $posts->first())
                    <div class="mb-10">
                        <a href="{{ route('blog.show', $featuredPost->slug) }}"
                           class="group block bg-slate-900/40 backdrop-blur-md rounded-3xl border border-slate-800 hover:border-blue-500/40 shadow-2xl shadow-black/40 transition-all duration-300 overflow-hidden">
                            <div class="grid md:grid-cols-12 gap-0">
                                <div class="md:col-span-7 h-64 sm:h-80 md:h-[380px] bg-slate-950/60 overflow-hidden relative border-b md:border-b-0 md:border-r border-slate-800">
                                    <img src="{{ $featuredPost->image_path ? asset('storage/' . $featuredPost->image_path) : 'https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=800&q=80' }}"
                                         class="w-full h-full object-cover group-hover:scale-105 transition duration-700 ease-out object-center"
                                         alt="{{ $featuredPost->title }} - FerchoTech">
                                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/40 to-transparent"></div>
                                </div>

                                <div class="md:col-span-5 p-6 sm:p-8 flex flex-col justify-between">
                                    <div>
                                        <span class="inline-block text-xs font-bold text-blue-400 uppercase tracking-wider bg-blue-500/10 px-2.5 py-1 rounded-lg border border-blue-500/10">
                                            {{ $featuredPost->category->name }}
                                        </span>
                                        <h3 class="text-xl sm:text-2xl font-bold text-white mt-4 group-hover:text-blue-400 transition-colors duration-200 line-clamp-3 leading-tight">
                                            {{ $featuredPost->title }}
                                        </h3>
                                        <p class="text-slate-400 text-sm mt-3 line-clamp-4 leading-relaxed font-normal">
                                            {{ $featuredPost->description }}
                                        </p>
                                    </div>

                                    <div class="flex items-center justify-between pt-5 border-t border-slate-800/60 mt-6">
                                        <div class="flex items-center gap-2 text-xs text-slate-500">
                                            <i data-lucide="calendar" class="size-3.5"></i>
                                            <span>{{ $featuredPost->created_at->format('d M, Y') }}</span>
                                        </div>
                                        <span class="inline-flex items-center gap-1 text-xs font-bold text-blue-400 group-hover:text-blue-300 transition-colors">
                                            Leer artículo <i data-lucide="chevron-right" class="size-3.5 group-hover:translate-x-0.5 transition-transform"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($posts->skip(1) as $post)
                        <a href="{{ route('blog.show', $post->slug) }}"
                           class="group flex flex-col justify-between bg-slate-900/40 backdrop-blur-md p-5 rounded-2xl border border-slate-800 hover:border-blue-500/30 shadow-2xl shadow-black/40 transition-all duration-300">
                            <div>
                                <div class="w-full h-44 bg-slate-950/60 rounded-xl overflow-hidden mb-4 border border-slate-800 relative">
                                    <img src="{{ $post->image_path ? asset('storage/' . $post->image_path) : 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=500&q=80' }}"
                                         class="w-full h-full object-cover group-hover:scale-105 transition duration-500"
                                         alt="{{ $post->title }}">
                                </div>

                                <span class="text-xs font-bold text-cyan-400 uppercase tracking-wider">
                                    {{ $post->category->name }}
                                </span>

                                <h4 class="text-lg font-bold text-white mt-2 group-hover:text-blue-400 transition-colors duration-200 line-clamp-2 leading-snug">
                                    {{ $post->title }}
                                </h4>

                                <p class="text-slate-400 text-xs mt-2 line-clamp-2 leading-relaxed">
                                    {{ $post->description }}
                                </p>
                            </div>

                            <div class="flex items-center justify-between pt-4 border-t border-slate-800/60 mt-5 text-xs text-slate-500">
                                <span class="inline-flex items-center gap-1">
                                    <i data-lucide="clock" class="size-3"></i>
                                    {{ $post->created_at->diffForHumans() }}
                                </span>
                                <i data-lucide="arrow-up-right" class="size-4 text-slate-600 group-hover:text-blue-400 transition-colors"></i>
                            </div>
                        </a>
                    @endforeach
                </div>

                <div class="mt-10">
                    {{ $posts->links() }}
                </div>

            @else
                <div class="max-w-2xl mx-auto relative bg-slate-900/40 backdrop-blur-md border border-slate-800 p-10 sm:p-14 rounded-3xl shadow-2xl shadow-black/40 text-center overflow-hidden">
                    <div class="absolute -top-10 -right-10 w-40 h-40 bg-blue-500/10 rounded-full blur-2xl pointer-events-none"></div>

                    <div class="size-14 bg-slate-950/60 rounded-2xl border border-slate-800 flex items-center justify-center text-slate-500 mx-auto mb-5 shadow-inner">
                        <i data-lucide="pen-tool" class="size-6 text-blue-500/80"></i>
                    </div>

                    <h3 class="text-2xl font-bold text-white tracking-tight">No hay publicaciones disponibles</h3>
                    <p class="text-sm text-slate-400 mt-3 leading-relaxed max-w-md mx-auto">
                        Estamos preparando artículos técnicos, tutoriales de redes y guías de desarrollo optimizadas. ¡Vuelve pronto!
                    </p>
                </div>
            @endif

        </div>
    </section>
</x-layouts.app>
