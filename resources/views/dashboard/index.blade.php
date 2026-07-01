<x-layouts.dashboard section="Dashboard" title="Panel de control">
<div class="mb-8">
    <h4 class="text-sm font-semibold text-gray-400 uppercase tracking-wider mb-4">Acciones Rápidas</h4>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

        <!-- Acción: Crear Artículo -->
        <a href="{{ route('dashboard.blog.create') }}" class="group flex items-center gap-4 p-4 bg-[#0b0e17] border border-gray-800/60 rounded-xl hover:border-indigo-500/50 hover:bg-[#0f1422]/50 transition-all duration-200 shadow-lg">
            <div class="p-3 bg-indigo-500/10 text-indigo-400 rounded-lg group-hover:bg-indigo-600 group-hover:text-white transition-colors duration-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 2v6h6"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 13H8m6 4H8m2-8H8"></path>
                </svg>
            </div>
            <div>
                <h5 class="font-semibold text-gray-200 group-hover:text-white text-sm transition-colors">Crear Artículo</h5>
                <p class="text-xs text-gray-500 mt-0.5">Publica contenido en el blog o sitio web</p>
            </div>
        </a>

        <a href="{{ route('dashboard.services.create') }}" class="group flex items-center gap-4 p-4 bg-[#0b0e17] border border-gray-800/60 rounded-xl hover:border-emerald-500/50 hover:bg-[#0f1422]/50 transition-all duration-200 shadow-lg">
            <div class="p-3 bg-emerald-500/10 text-emerald-400 rounded-lg group-hover:bg-emerald-600 group-hover:text-white transition-colors duration-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13a1 1 0 01-1 1H4a1 1 0 01-1-1V5a1 1 0 011-1h16a1 1 0 011 1v8z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14v7m-3-3h6m-5-10h4"></path>
                </svg>
            </div>
            <div>
                <h5 class="font-semibold text-gray-200 group-hover:text-white text-sm transition-colors">Crear Servicio</h5>
                <p class="text-xs text-gray-500 mt-0.5">Añade una nueva prestación u oferta</p>
            </div>
        </a>

        <a href="#" class="group flex items-center gap-4 p-4 bg-[#0b0e17] border border-gray-800/60 rounded-xl hover:border-amber-500/50 hover:bg-[#0f1422]/50 transition-all duration-200 shadow-lg">
            <div class="p-3 bg-amber-500/10 text-amber-400 rounded-lg group-hover:bg-amber-600 group-hover:text-white transition-colors duration-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
            </div>
            <div>
                <h5 class="font-semibold text-gray-200 group-hover:text-white text-sm transition-colors">Crear Reporte</h5>
                <p class="text-xs text-gray-500 mt-0.5">Genera estadísticas y análisis de datos</p>
            </div>
        </a>

    </div>
</div>

</x-layouts.dashboard>
