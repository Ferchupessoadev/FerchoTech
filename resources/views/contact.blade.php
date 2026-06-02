<x-layouts.app title="Contactanos">
    <section id="contacto" class="py-28 bg-gradient-to-b from-[#0b1329] to-[#080d1c] text-white">
        <div class="max-w-3xl mx-auto px-4 sm:px-6">

            <div class="relative bg-slate-900/40 backdrop-blur-md border border-slate-800 p-8 sm:p-14 rounded-3xl shadow-2xl shadow-black/40">
                <div class="absolute -top-10 -right-10 w-40 h-40 bg-blue-500/10 rounded-full blur-2xl pointer-events-none"></div>

                <div class="text-center mb-10">
                    <span class="text-blue-500 font-semibold tracking-wider uppercase text-sm">¿Tienes un proyecto?</span>
                    <h3 class="text-3xl sm:text-4xl font-extrabold mt-2 tracking-tight">Contactanos</h3>
                </div>

                @if(session('success'))
                    <div class="bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 p-4 rounded-xl mb-8 text-center text-sm font-medium flex items-center justify-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Nombre</label>
                            <input type="text" name="name" placeholder="Tu nombre" value="{{ old('name') }}"
                                class="w-full bg-slate-950/50 border @error('name') border-red-500/50 focus:border-red-500 focus:ring-red-500/20 @else border-slate-800 focus:border-blue-500 focus:ring-blue-500/20 @enderror rounded-xl p-3.5 text-white placeholder-slate-600 outline-none transition-all duration-200 focus:ring-4"
                                required>
                            @error('name') <span class="text-red-400 text-xs mt-1.5 block font-medium">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Email</label>
                            <input type="email" name="email" placeholder="Tu email" value="{{ old('email') }}"
                                class="w-full bg-slate-950/50 border @error('email') border-red-500/50 focus:border-red-500 focus:ring-red-500/20 @else border-slate-800 focus:border-blue-500 focus:ring-blue-500/20 @enderror rounded-xl p-3.5 text-white placeholder-slate-600 outline-none transition-all duration-200 focus:ring-4"
                                required>
                            @error('email') <span class="text-red-400 text-xs mt-1.5 block font-medium">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Asunto</label>
                        <input type="text" name="subject" placeholder="Asunto del mensaje" value="{{ old('subject') }}"
                            class="w-full bg-slate-950/50 border border-slate-800 focus:border-blue-500 focus:ring-blue-500/20 rounded-xl p-3.5 text-white placeholder-slate-600 outline-none transition-all duration-200 focus:ring-4">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Mensaje</label>
                        <textarea name="message" placeholder="Contanos sobre tu idea o problema..." rows="5"
                            class="w-full bg-slate-950/50 border @error('message') border-red-500/50 focus:border-red-500 focus:ring-red-500/20 @else border-slate-800 focus:border-blue-500 focus:ring-blue-500/20 @enderror rounded-xl p-3.5 text-white placeholder-slate-600 outline-none resize-none transition-all duration-200 focus:ring-4"
                            required>{{ old('message') }}</textarea>
                        @error('message') <span class="text-red-400 text-xs mt-1.5 block font-medium">{{ $message }}</span> @enderror
                    </div>

                    <!-- Botón de Envío -->
                    <div class="pt-2">
                        <button type="submit"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 rounded-xl transition-all duration-200 shadow-lg shadow-blue-500/25 hover:shadow-blue-500/40 transform hover:-translate-y-0.5 active:translate-y-0 cursor-pointer text-center tracking-wide">
                            Enviar mensaje
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </section>
</x-layouts.app>
