<x-layouts.dashboard section="Dashboard" title="Configuraciones">
    <div class="max-w-4xl">
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-white">Configuraciones generales</h1>
            <p class="text-slate-400 mt-1">Gestiona tus enlaces y preferencias del sistema.</p>
        </div>

        <section class="bg-slate-900/40 backdrop-blur-md border border-slate-800 rounded-3xl p-6 sm:p-8 shadow-2xl">
            <div class="flex items-center gap-3 mb-6">
                <div class="p-2 bg-blue-500/10 rounded-lg text-blue-400">
                    <i data-lucide="globe" class="size-5"></i>
                </div>
                <h3 class="text-lg font-semibold text-white">Enlaces de Redes Sociales</h3>
            </div>

            <div class="grid gap-4">
                @foreach ($settings as $setting)
                    <div class="group flex items-center justify-between p-4 bg-slate-950/50 rounded-xl border border-slate-800 hover:border-blue-500/30 transition-all duration-300">
                        <div class="flex flex-col">
                            <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">
                                {{ str_replace('_', ' ', $setting->key) }}
                            </span>
                            <span class="text-sm text-slate-300 font-medium mt-0.5">
                                {{ $setting->value }}
                            </span>
                        </div>
                        <button class="text-slate-600 hover:text-blue-400 transition-colors">
                            <i data-lucide="edit-3" class="size-4"></i>
                        </button>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
</x-layouts.dashboard>
