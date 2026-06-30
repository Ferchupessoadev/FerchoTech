<x-layouts.app title="Fercho Tech">
    <x-slot:seo>
        <meta name="description" content="Soporte técnico profesional, desarrollo de software a medida y mantenimiento de sistemas. La confianza y soluciones tecnológicas que tu negocio necesita.">
        <meta name="robots" content="index, follow">

        <meta property="og:title" content="Fercho Tech - Impulsamos tu Infraestructura Digital">
        <meta property="og:description" content="Soporte técnico, desarrollo de software a medida y soluciones tecnológicas eficientes para tu negocio.">
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://ferchudev.com/">
    </x-slot:seo>
    <x-header.home></x-header.home>

    <section id="servicios" class="py-28 bg-gradient-to-b from-[#0b1329] to-[#080d1c] text-white relative overflow-hidden">
        <div class="absolute top-1/3 left-1/2 -translate-x-1/2 size-[500px] bg-blue-500/5 rounded-full blur-[140px] pointer-events-none"></div>

        <div class="max-w-6xl mx-auto px-6 relative z-10">
            <div class="text-center mb-16 space-y-2">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-blue-500/10 text-blue-400 rounded-full text-xs font-bold uppercase tracking-wider border border-blue-500/20 shadow-sm">
                    <i data-lucide="layers" class="size-3.5"></i>
                    Especialidades
                </span>
                <h3 class="text-3xl sm:text-4xl font-extrabold tracking-tight text-white">
                    Nuestros <span class="bg-gradient-to-r from-blue-400 via-cyan-400 to-teal-400 bg-clip-text text-transparent">Servicios</span>
                </h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">
                <div id="soporte" class="p-8 bg-slate-900/30 backdrop-blur-md rounded-2xl border border-slate-800/80 hover:border-blue-500/40 hover:shadow-2xl hover:shadow-blue-950/40 transition-all duration-300 group transform hover:-translate-y-1 flex flex-col justify-between">
                    <div>
                        <div class="text-blue-400 mb-6 p-3 bg-blue-500/10 rounded-xl inline-block border border-blue-500/10 group-hover:bg-blue-600 group-hover:text-white group-hover:border-blue-500 transition-all duration-300 shadow-inner">
                            <i data-lucide="settings-2" class="size-7"></i>
                        </div>
                        <h4 class="text-lg font-bold mb-3 text-white tracking-wide">Soporte Técnico</h4>
                        <p class="text-slate-400 leading-relaxed text-sm font-normal">
                            Resolución de incidentes complejos de hardware e infraestructura crítica y optimización de sistemas operativos de manera eficiente y garantizada.
                        </p>
                    </div>
                </div>

                <div id="desarrollo" class="p-8 bg-slate-900/30 backdrop-blur-md rounded-2xl border border-slate-800/80 hover:border-cyan-500/40 hover:shadow-2xl hover:shadow-cyan-950/40 transition-all duration-300 group transform hover:-translate-y-1 flex flex-col justify-between">
                    <div>
                        <div class="text-cyan-400 mb-6 p-3 bg-cyan-500/10 rounded-xl inline-block border border-cyan-500/10 group-hover:bg-cyan-600 group-hover:text-white group-hover:border-cyan-500 transition-all duration-300 shadow-inner">
                            <i data-lucide="code-2" class="size-7"></i>
                        </div>
                        <h4 class="text-lg font-bold mb-3 text-white tracking-wide">Desarrollo Web</h4>
                        <p class="text-slate-400 leading-relaxed text-sm font-normal">
                            Arquitectura y construcción de plataformas modernas, modulares y escalables, optimizadas con tecnologías avanzadas del ecosistema IT.
                        </p>
                    </div>
                </div>

                <div id="seguridad" class="p-8 bg-slate-900/30 backdrop-blur-md rounded-2xl border border-slate-800/80 hover:border-purple-500/40 hover:shadow-2xl hover:shadow-purple-950/40 transition-all duration-300 group transform hover:-translate-y-1 flex flex-col justify-between">
                    <div>
                        <div class="text-purple-400 mb-6 p-3 bg-purple-500/10 rounded-xl inline-block border border-purple-500/10 group-hover:bg-purple-600 group-hover:text-white group-hover:border-purple-500 transition-all duration-300 shadow-inner">
                            <i data-lucide="shield-check" class="size-7"></i>
                        </div>
                        <h4 class="text-lg font-bold mb-3 text-white tracking-wide">Seguridad de Redes</h4>
                        <p class="text-slate-400 leading-relaxed text-sm font-normal">
                            Auditorías avanzadas de datos, implementación de cortafuegos de última generación y blindaje de perímetros de red corporativos.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="features" class="py-28 bg-[#080d1c] text-white relative overflow-hidden">
        <div class="absolute right-0 bottom-0 size-96 bg-purple-500/5 rounded-full blur-[120px] pointer-events-none"></div>

        <div class="max-w-6xl mx-auto px-6 relative z-10">
            <div class="flex flex-col lg:flex-row items-center gap-16">

                <div class="lg:w-1/2 space-y-8">
                    <h3 class="text-3xl sm:text-4xl font-extrabold tracking-tight text-white leading-tight">
                        ¿Por qué confiar en <br class="hidden sm:inline"><span class="bg-gradient-to-r from-blue-400 to-indigo-400 bg-clip-text text-transparent">nuestra ingeniería</span>?
                    </h3>

                    <ul class="space-y-6">
                        <li class="flex items-start gap-4 group">
                            <div class="mt-1 flex-shrink-0 w-6 h-6 rounded-lg bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center text-emerald-400 transition-transform group-hover:scale-110">
                                <i data-lucide="check" class="size-3.5 stroke-[3]"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-200 text-base">Experiencia Comprobada</h4>
                                <p class="text-slate-400 text-sm mt-0.5 font-normal leading-relaxed">Más de 5 años liderando infraestructuras complejas y desplegando soluciones en el sector IT.</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-4 group">
                            <div class="mt-1 flex-shrink-0 w-6 h-6 rounded-lg bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center text-emerald-400 transition-transform group-hover:scale-110">
                                <i data-lucide="check" class="size-3.5 stroke-[3]"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-200 text-base">Consultoría Directa</h4>
                                <p class="text-slate-400 text-sm mt-0.5 font-normal leading-relaxed">Sin intermediarios ni paneles automatizados impersonales. Trabajás codo a codo con tus aliados estratégicos.</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-4 group">
                            <div class="mt-1 flex-shrink-0 w-6 h-6 rounded-lg bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center text-emerald-400 transition-transform group-hover:scale-110">
                                <i data-lucide="check" class="size-3.5 stroke-[3]"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-200 text-base">Despliegue Ágil y Seguro</h4>
                                <p class="text-slate-400 text-sm mt-0.5 font-normal leading-relaxed">Optimizamos los pipelines de integración para asegurar lanzamientos sin caídas de servicio.</p>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="lg:w-1/2 w-full relative">
                    <div class="absolute inset-0 bg-blue-500/10 rounded-3xl filter blur-3xl opacity-30 pointer-events-none"></div>
                    <div class="relative bg-gradient-to-br from-slate-900/40 to-slate-950/60 p-10 sm:p-12 rounded-3xl border border-slate-800/80 text-center shadow-2xl backdrop-blur-sm group hover:border-slate-700/50 transition-colors">
                        <span class="text-6xl sm:text-7xl font-black bg-gradient-to-r from-blue-400 via-cyan-400 to-indigo-500 bg-clip-text text-transparent tracking-tight block group-hover:scale-105 transition-transform duration-500 select-none">+100</span>
                        <p class="text-base sm:text-lg font-bold text-slate-200 mt-4 tracking-wide">Proyectos completados con éxito</p>
                        <p class="text-xs sm:text-sm text-slate-500 mt-1.5 font-normal">Sistemas e infraestructuras operando bajo estándares globales</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section id="faq" class="py-28 bg-gradient-to-b from-[#080d1c] to-[#0b1329] text-white relative overflow-hidden">
        <div class="max-w-4xl mx-auto px-6 relative z-10">
            <div class="text-center mb-16 space-y-2">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-blue-500/10 text-blue-400 rounded-full text-xs font-bold uppercase tracking-wider border border-blue-500/20 shadow-sm">
                    <i data-lucide="help-circle" class="size-3.5"></i>
                    Resolviendo Dudas
                </span>
                <h3 class="text-3xl sm:text-4xl font-extrabold tracking-tight text-white">
                    Preguntas <span class="bg-gradient-to-r from-blue-400 to-indigo-400 bg-clip-text text-transparent">Frecuentes</span>
                </h3>
            </div>

            <div class="space-y-4">
                <div class="faq-item group bg-slate-900/20 backdrop-blur-sm border border-slate-800/80 rounded-2xl overflow-hidden transition-all duration-300">
                    <button class="w-full flex items-center justify-between p-6 hover:bg-slate-900/40 transition-all duration-300 focus:outline-none cursor-pointer text-left" onclick="toggleFAQ(this)">
                        <span class="text-base sm:text-lg font-bold text-slate-200 group-hover:text-white transition-colors">¿Cuánto tiempo toma desarrollar un sitio web?</span>
                        <span class="text-blue-400 transition-transform duration-300 icon-plus flex-shrink-0 ml-4 p-1 bg-slate-950/40 rounded-lg border border-slate-800">
                            <i data-lucide="plus" class="size-4 transition-transform duration-300"></i>
                        </span>
                    </button>
                    <div class="faq-answer max-h-0 overflow-hidden transition-all duration-300 ease-in-out bg-slate-950/10">
                        <p class="p-6 pt-2 text-slate-400 text-sm sm:text-base leading-relaxed border-t border-slate-900/50 font-normal">
                            Depende enteramente de los alcances del sistema. Una landing page técnica optimizada suele completarse en 1 semana, mientras que arquitecturas complejas, e-commerce modulares o plataformas a medida requieren de 3 a 4 semanas.
                        </p>
                    </div>
                </div>

                <div class="faq-item group bg-slate-900/20 backdrop-blur-sm border border-slate-800/80 rounded-2xl overflow-hidden transition-all duration-300">
                    <button class="w-full flex items-center justify-between p-6 hover:bg-slate-900/40 transition-all duration-300 focus:outline-none cursor-pointer text-left" onclick="toggleFAQ(this)">
                        <span class="text-base sm:text-lg font-bold text-slate-200 group-hover:text-white transition-colors">¿El soporte técnico es presencial o remoto?</span>
                        <span class="text-blue-400 transition-transform duration-300 icon-plus flex-shrink-0 ml-4 p-1 bg-slate-950/40 rounded-lg border border-slate-800">
                            <i data-lucide="plus" class="size-4 transition-transform duration-300"></i>
                        </span>
                    </button>
                    <div class="faq-answer max-h-0 overflow-hidden transition-all duration-300 ease-in-out bg-slate-950/10">
                        <p class="p-6 pt-2 text-slate-400 text-sm sm:text-base leading-relaxed border-t border-slate-900/50 font-normal">
                            Ofrecemos un despliegue híbrido. Las auditorías de red, configuraciones de políticas cloud o problemas de software se resuelven de forma remota centralizada en minutos. Para incidentes de infraestructura crítica local, coordinamos visitas de campo programadas.
                        </p>
                    </div>
                </div>

                <div class="faq-item group bg-slate-900/20 backdrop-blur-sm border border-slate-800/80 rounded-2xl overflow-hidden transition-all duration-300">
                    <button class="w-full flex items-center justify-between p-6 hover:bg-slate-900/40 transition-all duration-300 focus:outline-none cursor-pointer text-left" onclick="toggleFAQ(this)">
                        <span class="text-base sm:text-lg font-bold text-slate-200 group-hover:text-white transition-colors">¿Cómo aseguran la protección de mis datos?</span>
                        <span class="text-blue-400 transition-transform duration-300 icon-plus flex-shrink-0 ml-4 p-1 bg-slate-950/40 rounded-lg border border-slate-800">
                            <i data-lucide="plus" class="size-4 transition-transform duration-300"></i>
                        </span>
                    </button>
                    <div class="faq-answer max-h-0 overflow-hidden transition-all duration-300 ease-in-out bg-slate-950/10">
                        <p class="p-6 pt-2 text-slate-400 text-sm sm:text-base leading-relaxed border-t border-slate-900/50 font-normal">
                            Implementamos certificados criptográficos SSL/TLS modernos, políticas severas de encriptación AES-256 para datos en tránsito o reposo, firewalls perimetrales robustos y auditorías de código preventivas constantes.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function toggleFAQ(button) {
            const item = button.closest('.faq-item');
            const answer = button.nextElementSibling;
            const iconContainer = button.querySelector('.icon-plus');
            const icon = iconContainer.querySelector('i');

            // Cerrar otros elementos abiertos
            document.querySelectorAll('.faq-item').forEach(el => {
                if (el !== item) {
                    const openAnswer = el.querySelector('.faq-answer');
                    const openIconContainer = el.querySelector('.icon-plus');
                    const openIcon = openIconContainer.querySelector('i');

                    openAnswer.style.maxHeight = null;
                    el.classList.remove('border-blue-500/30', 'bg-slate-900/40');
                    openIconContainer.classList.remove('bg-blue-500/10', 'border-blue-500/20', 'text-blue-400');
                    if (openIcon) openIcon.style.transform = 'rotate(0deg)';
                }
            });

            // Conmutar el elemento clickeado
            if (answer.style.maxHeight) {
                answer.style.maxHeight = null;
                item.classList.remove('border-blue-500/30', 'bg-slate-900/40');
                iconContainer.classList.remove('bg-blue-500/10', 'border-blue-500/20', 'text-blue-400');
                icon.style.transform = 'rotate(0deg)';
            } else {
                answer.style.maxHeight = answer.scrollHeight + "px";
                item.classList.add('border-blue-500/30', 'bg-slate-900/40');
                iconContainer.classList.add('bg-blue-500/10', 'border-blue-500/20', 'text-blue-400');
                icon.style.transform = 'rotate(45deg)';
            }
        }
    </script>
</x-layouts.app>
