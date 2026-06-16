<x-layouts.app title="Contactanos - FerchoTech">

    <section id="contacto" class="py-32 bg-gradient-to-b from-[#0b1329] to-[#080d1c] text-white relative overflow-hidden min-h-screen flex items-center">

        <div class="absolute top-20 left-10 size-[450px] bg-blue-500/5 rounded-full blur-[130px] pointer-events-none"></div>
        <div class="absolute bottom-10 right-10 size-[450px] bg-purple-500/5 rounded-full blur-[130px] pointer-events-none"></div>

        <div class="max-w-6xl mx-auto px-4 sm:px-6 relative z-10 w-full">

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">

                <div class="lg:col-span-5 space-y-8 text-center lg:text-left">
                    <div>
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-blue-500/10 text-blue-400 rounded-full text-xs font-bold uppercase tracking-wider border border-blue-500/20 mb-4 shadow-sm">
                            <i data-lucide="message-square" class="size-3.5"></i>
                            Canal de Consultas
                        </span>
                        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-white leading-tight">
                            ¿Tenés un <span class="bg-gradient-to-r from-blue-400 via-cyan-400 to-teal-400 bg-clip-text text-transparent">proyecto</span> en mente?
                        </h2>
                        <p class="text-slate-400 mt-4 text-base sm:text-lg leading-relaxed font-normal">
                            Escribinos. Ya sea para solucionar un problema crítico de infraestructura o para delegar tu desarrollo web, estamos listos para responderte.
                        </p>
                    </div>

                    <div class="space-y-4 max-w-md mx-auto lg:mx-0">
                        <div class="flex items-start gap-4 p-4 bg-slate-900/20 rounded-2xl border border-slate-900/60 backdrop-blur-sm">
                            <div class="p-3 bg-blue-500/10 rounded-xl text-blue-400 border border-blue-500/10">
                                <i data-lucide="mail" class="size-5"></i>
                            </div>
                            <div class="text-left">
                                <h4 class="text-sm font-bold text-white tracking-wide">Correo Corporativo</h4>
                                <p class="text-xs text-slate-400 mt-0.5">contact@ferchudev.com</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4 p-4 bg-slate-900/20 rounded-2xl border border-slate-900/60 backdrop-blur-sm">
                            <div class="p-3 bg-teal-500/10 rounded-xl text-teal-400 border border-teal-500/10">
                                <i data-lucide="shield-check" class="size-5"></i>
                            </div>
                            <div class="text-left">
                                <h4 class="text-sm font-bold text-white tracking-wide">Disponibilidad de Mesa</h4>
                                <p class="text-xs text-slate-400 mt-0.5">Lunes a Viernes — Respuestas en menos de 24hs</p>
                            </div>
                        </div>
                    </div>

                    <div class="pt-4 border-t border-slate-900/80 max-w-sm mx-auto lg:mx-0 flex justify-around lg:justify-between items-center text-center">
                        <div class="text-left">
                            <span class="block text-2xl font-black text-white">100%</span>
                            <span class="text-xs text-slate-500 font-medium">Confidencialidad</span>
                        </div>
                        <div class="h-8 w-px bg-slate-800"></div>
                        <div class="text-left">
                            <span class="block text-2xl font-black text-blue-400">Garantía</span>
                            <span class="text-xs text-slate-500 font-medium">En Soporte IT</span>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-7">
                    <div class="relative bg-slate-900/30 backdrop-blur-md border border-slate-800/80 p-6 sm:p-10 md:p-12 rounded-3xl shadow-2xl shadow-black/50 overflow-hidden">

                        <div class="absolute -top-12 -right-12 size-36 bg-blue-500/10 rounded-full blur-2xl pointer-events-none"></div>

                        @if(session('success'))
                            <div class="bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 p-4 rounded-xl mb-8 text-center text-sm font-medium flex items-center justify-center gap-2.5 shadow-lg shadow-emerald-950/20 animate-fade-in">
                                <span class="size-2 rounded-full bg-emerald-400 animate-pulse"></span>
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
                            @csrf

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                <div>
                                    <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Nombre</label>
                                    <input type="text" name="name" placeholder="Tu nombre" value="{{ old('name') }}"
                                        class="w-full bg-slate-950/40 border @error('name') border-red-500/40 focus:border-red-500 focus:ring-red-500/10 @else border-slate-800/80 focus:border-blue-500 focus:ring-blue-500/10 @enderror rounded-xl p-3.5 text-white placeholder-slate-600 outline-none transition-all duration-200 focus:ring-4 text-sm font-medium"
                                        required>
                                    @error('name') <span class="text-red-400 text-xs mt-1.5 block font-medium">{{ $message }}</span> @enderror
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Email</label>
                                    <input type="email" name="email" placeholder="Tu email" value="{{ old('email') }}"
                                        class="w-full bg-slate-950/40 border @error('email') border-red-500/40 focus:border-red-500 focus:ring-red-500/10 @else border-slate-800/80 focus:border-blue-500 focus:ring-blue-500/10 @enderror rounded-xl p-3.5 text-white placeholder-slate-600 outline-none transition-all duration-200 focus:ring-4 text-sm font-medium"
                                        required>
                                    @error('email') <span class="text-red-400 text-xs mt-1.5 block font-medium">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div>
                                <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Asunto</label>
                                <input type="text" name="subject" placeholder="¿En qué podemos ayudarte?" value="{{ old('subject') }}"
                                    class="w-full bg-slate-950/40 border border-slate-800/80 focus:border-blue-500 focus:ring-blue-500/10 rounded-xl p-3.5 text-white placeholder-slate-600 outline-none transition-all duration-200 focus:ring-4 text-sm font-medium">
                            </div>

                            <div>
                                <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Mensaje</label>
                                <textarea name="message" placeholder="Contanos detalladamente sobre tu idea o problema de infraestructura técnica..." rows="5"
                                    class="w-full bg-slate-950/40 border @error('message') border-red-500/40 focus:border-red-500 focus:ring-red-500/10 @else border-slate-800/80 focus:border-blue-500 focus:ring-blue-500/10 @enderror rounded-xl p-3.5 text-white placeholder-slate-600 outline-none resize-none transition-all duration-200 focus:ring-4 text-sm font-medium leading-relaxed"
                                    required>{{ old('message') }}</textarea>
                                @error('message') <span class="text-red-400 text-xs mt-1.5 block font-medium">{{ $message }}</span> @enderror
                            </div>

                            <div class="pt-2">
                                <button type="submit"
                                    class="w-full bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-500 hover:to-blue-600 text-white font-bold py-4 rounded-xl transition-all duration-200 shadow-xl shadow-blue-950/50 transform hover:-translate-y-0.5 active:translate-y-0 cursor-pointer text-center tracking-wide text-sm flex items-center justify-center gap-2">
                                    <i data-lucide="send" class="size-4"></i>
                                    Enviar Mensaje Corporativo
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </section>
</x-layouts.app>
