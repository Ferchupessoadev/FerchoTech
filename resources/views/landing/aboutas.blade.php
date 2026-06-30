<x-layouts.app title="Fercho Tech - Sobre Nosotros">
    <x-slot:seo>
        <meta name="description" content="Conoce la historia, misión y los valores de Fercho Tech. Somos un equipo apasionado por la tecnología, dedicado a potenciar y asegurar la infraestructura digital de nuestros clientes.">
        <meta name="robots" content="index, follow">

        <!-- Open Graph -->
        <meta property="og:title" content="Quiénes Somos - Fercho Tech">
        <meta property="og:description" content="Conoce al equipo detrás de Fercho Tech y cómo ayudamos a transformar empresas a través de la tecnología.">
        <meta property="og:url" content="https://ferchudev.com/nosotros">
    </x-slot:seo>
    <section id="sobre-nosotros" class="py-28 min-h-screen bg-gradient-to-b from-[#0b1329] to-[#080d1c] text-white relative overflow-hidden flex items-center">

        <div class="absolute top-10 left-1/4 size-96 bg-blue-500/5 rounded-full blur-[120px] pointer-events-none"></div>
        <div class="absolute bottom-10 right-1/4 size-96 bg-purple-500/5 rounded-full blur-[120px] pointer-events-none"></div>

        <div class="max-w-6xl mx-auto px-4 sm:px-6 relative z-10 w-full">

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center mb-24">

                <div class="lg:col-span-7 space-y-6 text-center md:text-left">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-blue-500/10 text-blue-400 rounded-full text-xs font-bold uppercase tracking-wider border border-blue-500/20 mb-2 shadow-sm">
                        <i data-lucide="info" class="size-3.5"></i>
                        Nuestra Esencia
                    </span>
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white tracking-tight leading-tight">
                        Sobre <span class="bg-gradient-to-r from-blue-400 via-cyan-400 to-teal-400 bg-clip-text text-transparent">Nosotros</span>
                    </h2>
                    <p class="text-slate-300 text-base sm:text-lg leading-relaxed max-w-2xl mx-auto md:mx-0 font-normal">
                        Somos una organización enfocada en diseñar y desplegar soluciones tecnológicas eficientes, robustas y personalizadas para infraestructuras críticas y negocios de proyección global.
                    </p>
                    <p class="text-slate-400 text-sm sm:text-base leading-relaxed max-w-2xl mx-auto md:mx-0 font-normal">
                        Nos apasiona transformar lógica compleja en realidades digitales limpias, optimizando cada proceso para que tu arquitectura de software y conectividad lideren en el mercado actual.
                    </p>
                    <div class="pt-4 flex justify-center md:justify-start">
                        <a href="{{ route('contact') }}" class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-500 hover:to-blue-600 text-sm font-bold rounded-xl text-white transition-all duration-200 shadow-xl shadow-blue-950/50 transform hover:-translate-y-0.5 active:translate-y-0 cursor-pointer text-center tracking-wide">
                            <i data-lucide="briefcase" class="size-4"></i>
                            Trabajá con nosotros
                        </a>
                    </div>
                </div>

                <div class="lg:col-span-5 relative mt-12 lg:mt-0 flex justify-center">
                    <div class="absolute top-0 -left-4 w-72 h-72 bg-blue-500/10 rounded-full blur-3xl pointer-events-none"></div>
                    <div class="absolute -bottom-8 right-4 w-72 h-72 bg-purple-500/10 rounded-full blur-3xl pointer-events-none"></div>

                    <div class="relative bg-slate-900/30 backdrop-blur-md border border-slate-800/80 rounded-3xl p-6 sm:p-8 shadow-2xl w-full max-w-md transform hover:scale-[1.02] transition duration-300 overflow-hidden">
                        <div class="flex items-center space-x-2 mb-4 border-b border-slate-800/60 pb-3">
                            <div class="w-3 h-3 rounded-full bg-red-500/80"></div>
                            <div class="w-3 h-3 rounded-full bg-yellow-500/80"></div>
                            <div class="w-3 h-3 rounded-full bg-green-500/80"></div>
                            <span class="text-[10px] font-mono text-slate-500 pl-2">ferchoTech.js</span>
                        </div>
                        <div class="h-60 rounded-xl bg-[#050b14]/90 p-4 font-mono text-xs overflow-hidden border border-slate-950 text-left select-none shadow-inner leading-relaxed">
                            <p class="text-slate-500">// 1. Inicializar la solución tecnológica</p>
                            <p class="text-purple-400">const <span class="text-blue-400">ferchoTech</span> = {</p>
                            <p class="pl-4 text-cyan-400">proposito: <span class="text-amber-200">"Impulsar tu negocio"</span>,</p>
                            <p class="pl-4 text-cyan-400">stack: [<span class="text-amber-200">"Laravel"</span>, <span class="text-amber-200">"Tailwind"</span>, <span class="text-amber-200">"Livewire"</span>],</p>
                            <p class="pl-4 text-cyan-400">calidad: <span class="text-emerald-400">true</span>,</p>
                            <p class="pl-4 text-cyan-400">alcance: <span class="text-amber-200">"Global"</span></p>
                            <p class="text-purple-400">};</p>
                            <br>
                            <p class="text-slate-500">// 2. Ejecutar optimización</p>
                            <p class="text-blue-400">ferchoTech<span class="text-white">.</span><span class="text-yellow-400">optimizarProcesos</span>();</p>
                            <p class="text-emerald-400 mt-2 flex items-center gap-1">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                <span>&gt; Deployment successful_</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="border-t border-slate-900 pt-16">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div class="bg-slate-900/40 backdrop-blur-md border border-slate-800/60 p-6 sm:p-8 rounded-2xl hover:border-blue-500/30 shadow-2xl shadow-black/40 transition-all duration-300 group flex flex-col justify-between">
                        <div>
                            <div class="w-12 h-12 bg-blue-500/10 rounded-xl flex items-center justify-center mb-5 border border-blue-500/10 text-blue-400 group-hover:bg-blue-500/20 transition-colors">
                                <i data-lucide="rocket" class="size-5"></i>
                            </div>
                            <h3 class="text-lg font-bold text-white tracking-wide mb-2 group-hover:text-blue-400 transition-colors">Nuestra Misión</h3>
                            <p class="text-slate-400 text-sm leading-relaxed font-normal">
                                Proveer a corporaciones y emprendimientos las herramientas necesarias para cumplir sus objetivos digitales, blindando su estabilidad operativa mediante software de alta ingeniería y escalabilidad modular.
                            </p>
                        </div>
                    </div>

                    <div class="bg-slate-900/40 backdrop-blur-md border border-slate-800/60 p-6 sm:p-8 rounded-2xl hover:border-cyan-500/30 shadow-2xl shadow-black/40 transition-all duration-300 group flex flex-col justify-between">
                        <div>
                            <div class="w-12 h-12 bg-cyan-500/10 rounded-xl flex items-center justify-center mb-5 border border-cyan-500/10 text-cyan-400 group-hover:bg-cyan-500/20 transition-colors">
                                <i data-lucide="shield-check" class="size-5"></i>
                            </div>
                            <h3 class="text-lg font-bold text-white tracking-wide mb-2 group-hover:text-cyan-400 transition-colors">Eficiencia Garantizada</h3>
                            <p class="text-slate-400 text-sm leading-relaxed font-normal">
                                Proyectamos infraestructuras basándonos en auditorías de rendimiento extremo, seguridad de punta y adaptabilidad arquitectónica a largo plazo, garantizando que tus operaciones jamás sufran interrupciones críticas.
                            </p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
</x-layouts.app>
