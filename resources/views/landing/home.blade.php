<x-layouts.app title="Fercho Tech">
    <x-header.home></x-header.home>

    <!-- Sección: Nuestros Servicios -->
    <section id="servicios" class="py-24 bg-gradient-to-b from-[#0b1329] to-[#080d1c] text-white">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-16">
                <span class="text-blue-500 font-semibold tracking-wider uppercase text-sm">Especialidades</span>
                <h3 class="text-3xl sm:text-4xl font-extrabold mt-2 tracking-tight">Nuestros Servicios</h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Servicio 1 -->
                <div class="p-8 bg-slate-900/40 backdrop-blur-md rounded-2xl border border-slate-800 hover:border-blue-500/50 hover:shadow-lg hover:shadow-blue-500/10 transition-all duration-300 group">
                    <div class="text-blue-500 mb-5 p-3 bg-blue-500/10 rounded-xl inline-block border border-blue-500/20 group-hover:bg-blue-500 group-hover:text-white transition-all duration-300">
                        <i data-lucide="settings-2" class="size-8"></i>
                    </div>
                    <h4 class="text-xl font-bold mb-3 text-slate-100">Soporte Técnico</h4>
                    <p class="text-slate-400 leading-relaxed text-sm">Resolución de problemas de hardware y software de manera eficiente y garantizada.</p>
                </div>

                <!-- Servicio 2 -->
                <div class="p-8 bg-slate-900/40 backdrop-blur-md rounded-2xl border border-slate-800 hover:border-blue-500/50 hover:shadow-lg hover:shadow-blue-500/10 transition-all duration-300 group">
                    <div class="text-blue-500 mb-5 p-3 bg-blue-500/10 rounded-xl inline-block border border-blue-500/20 group-hover:bg-blue-500 group-hover:text-white transition-all duration-300">
                        <i data-lucide="code-2" class="size-8"></i>
                    </div>
                    <h4 class="text-xl font-bold mb-3 text-slate-100">Desarrollo Web</h4>
                    <p class="text-slate-400 leading-relaxed text-sm">Creación de sitios modernos, escalables y optimizados con las últimas tecnologías del mercado.</p>
                </div>

                <!-- Servicio 3 -->
                <div class="p-8 bg-slate-900/40 backdrop-blur-md rounded-2xl border border-slate-800 hover:border-blue-500/50 hover:shadow-lg hover:shadow-blue-500/10 transition-all duration-300 group">
                    <div class="text-blue-500 mb-5 p-3 bg-blue-500/10 rounded-xl inline-block border border-blue-500/20 group-hover:bg-blue-500 group-hover:text-white transition-all duration-300">
                        <i data-lucide="shield-check" class="size-8"></i>
                    </div>
                    <h4 class="text-xl font-bold mb-3 text-slate-100">Seguridad</h4>
                    <p class="text-slate-400 leading-relaxed text-sm">Protección avanzada de datos, firewalls y optimización de redes críticas para tu empresa.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección: Características / Confianza -->
    <section id="features" class="py-24 bg-[#080d1c] text-white border-t border-slate-900">
        <div class="max-w-6xl mx-auto px-6">
            <div class="flex flex-col lg:flex-row items-center gap-16">
                <!-- Beneficios -->
                <div class="lg:w-1/2 space-y-6">
                    <h3 class="text-3xl sm:text-4xl font-extrabold tracking-tight mb-8">¿Por qué confiar en nosotros?</h3>

                    <ul class="space-y-6">
                        <li class="flex items-start gap-4">
                            <div class="mt-1 flex-shrink-0 w-5 h-5 rounded-full bg-emerald-500/10 border border-emerald-500/30 flex items-center justify-center text-emerald-400 text-xs font-bold">✓</div>
                            <div>
                                <h4 class="font-bold text-slate-200">Experiencia Comprobada</h4>
                                <p class="text-slate-400 text-sm mt-0.5">Más de 5 años liderando e implementando proyectos en el sector IT.</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-4">
                            <div class="mt-1 flex-shrink-0 w-5 h-5 rounded-full bg-emerald-500/10 border border-emerald-500/30 flex items-center justify-center text-emerald-400 text-xs font-bold">✓</div>
                            <div>
                                <h4 class="font-bold text-slate-200">Atención Personalizada</h4>
                                <p class="text-slate-400 text-sm mt-0.5">No eres un número más en una lista de espera. Somos tus aliados estratégicos directos.</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-4">
                            <div class="mt-1 flex-shrink-0 w-5 h-5 rounded-full bg-emerald-500/10 border border-emerald-500/30 flex items-center justify-center text-emerald-400 text-xs font-bold">✓</div>
                            <div>
                                <h4 class="font-bold text-slate-200">Resultados Rápidos</h4>
                                <p class="text-slate-400 text-sm mt-0.5">Optimizamos flujos de desarrollo para garantizar despliegues ágiles y seguros.</p>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- Contador de Impacto Estilizado -->
                <div class="lg:w-1/2 w-full relative">
                    <div class="absolute inset-0 bg-blue-500/10 rounded-3xl filter blur-xl opacity-30"></div>
                    <div class="relative bg-gradient-to-br from-slate-900 to-slate-950 p-12 rounded-3xl border border-slate-800/80 text-center shadow-2xl">
                        <span class="text-6xl sm:text-7xl font-black bg-gradient-to-r from-blue-400 to-indigo-500 bg-clip-text text-transparent tracking-tight">+100</span>
                        <p class="text-lg font-medium text-slate-300 mt-4">Proyectos completados con éxito</p>
                        <p class="text-sm text-slate-500 mt-1">Estrategias digitales operando a nivel global</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección: FAQ -->
    <section id="faq" class="py-24 bg-gradient-to-b from-[#080d1c] to-[#0b1329] text-white">
        <div class="max-w-4xl mx-auto px-6">
            <div class="text-center mb-16">
                <span class="text-blue-500 font-semibold tracking-wider uppercase text-sm">Resolviendo Dudas</span>
                <h3 class="text-3xl sm:text-4xl font-extrabold mt-2 tracking-tight">Preguntas Frecuentes</h3>
            </div>

            <div class="space-y-4">
                <!-- FAQ Item 1 -->
                <div class="faq-item group">
                    <button class="w-full flex items-center justify-between p-6 bg-slate-900/40 backdrop-blur-sm rounded-2xl border border-slate-800 hover:border-blue-500/40 transition-all duration-300 focus:outline-none" onclick="toggleFAQ(this)">
                        <span class="text-base sm:text-lg font-semibold text-left text-slate-200 group-hover:text-white transition-colors">¿Cuánto tiempo toma desarrollar un sitio web?</span>
                        <span class="text-blue-400 transition-transform duration-300 icon-plus flex-shrink-0 ml-4">
                            <i data-lucide="plus" class="size-5"></i>
                        </span>
                    </button>
                    <div class="faq-answer max-h-0 overflow-hidden transition-all duration-300 ease-in-out bg-slate-950/30 rounded-b-2xl px-6">
                        <p class="py-4 text-slate-400 text-sm sm:text-base leading-relaxed">
                            Depende de la complejidad. Una landing page suele estar lista en 1 semana, mientras que una web corporativa completa o una plataforma e-commerce puede tomar de 3 a 4 semanas.
                        </p>
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="faq-item group">
                    <button class="w-full flex items-center justify-between p-6 bg-slate-900/40 backdrop-blur-sm rounded-2xl border border-slate-800 hover:border-blue-500/40 transition-all duration-300 focus:outline-none" onclick="toggleFAQ(this)">
                        <span class="text-base sm:text-lg font-semibold text-left text-slate-200 group-hover:text-white transition-colors">¿El soporte técnico es presencial o remoto?</span>
                        <span class="text-blue-400 transition-transform duration-300 icon-plus flex-shrink-0 ml-4">
                            <i data-lucide="plus" class="size-5"></i>
                        </span>
                    </button>
                    <div class="faq-answer max-h-0 overflow-hidden transition-all duration-300 ease-in-out bg-slate-950/30 rounded-b-2xl px-6">
                        <p class="py-4 text-slate-400 text-sm sm:text-base leading-relaxed">
                            Ofrecemos ambas modalidades. La mayoría de las incidencias de software o configuraciones de red se resuelven de manera remota en minutos. Para incidentes de hardware físico, coordinamos visitas técnicas programadas.
                        </p>
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="faq-item group">
                    <button class="w-full flex items-center justify-between p-6 bg-slate-900/40 backdrop-blur-sm rounded-2xl border border-slate-800 hover:border-blue-500/40 transition-all duration-300 focus:outline-none" onclick="toggleFAQ(this)">
                        <span class="text-base sm:text-lg font-semibold text-left text-slate-200 group-hover:text-white transition-colors">¿Cómo aseguran la protección de mis datos?</span>
                        <span class="text-blue-400 transition-transform duration-300 icon-plus flex-shrink-0 ml-4">
                            <i data-lucide="plus" class="size-5"></i>
                        </span>
                    </button>
                    <div class="faq-answer max-h-0 overflow-hidden transition-all duration-300 ease-in-out bg-slate-950/30 rounded-b-2xl px-6">
                        <p class="py-4 text-slate-400 text-sm sm:text-base leading-relaxed">
                            Implementamos certificados de seguridad SSL modernos, políticas estrictas de cifrado de datos en reposo/tránsito, cortafuegos robustos y realizamos auditorías de código periódicas para blindar tu negocio.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Script Native JS (Mismo funcionamiento limpio que ya tenías) -->
    <script>
        function toggleFAQ(button) {
            const answer = button.nextElementSibling;
            const icon = button.querySelector('.icon-plus');

            document.querySelectorAll('.faq-answer').forEach(el => {
                if (el !== answer) {
                    el.style.maxHeight = null;
                    el.previousElementSibling.querySelector('.icon-plus').style.transform = 'rotate(0deg)';
                }
            });

            if (answer.style.maxHeight) {
                answer.style.maxHeight = null;
                button.style.borderRadius = '1rem'; // Reestablece bordes redondeados completos
                icon.style.transform = 'rotate(0deg)';
            } else {
                answer.style.maxHeight = answer.scrollHeight + "px";
                button.style.borderRadius = '1rem 1rem 0 0'; // Estética perfecta al abrirse
                icon.style.transform = 'rotate(45deg)';
            }
        }
    </script>
</x-layouts.app>
