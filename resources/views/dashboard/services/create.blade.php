<x-layouts.dashboard section="Dashboard" title="Nuevo Servicio">
    <div class="max-w-2xl mx-auto p-6 sm:p-8 bg-slate-900/40 backdrop-blur-md rounded-2xl border border-slate-800/80 shadow-xl">

        <div class="flex items-center gap-3 mb-6 pb-4 border-b border-slate-800/60">
            <div class="p-2 bg-emerald-500/10 text-emerald-500 rounded-xl border border-emerald-500/20">
                <i data-lucide="plus" class="size-5"></i>
            </div>
            <h2 class="text-2xl font-black tracking-tight text-white">
                {{ __('Nuevo Servicio') }}
            </h2>
        </div>

        <form action="{{ route('dashboard.services.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="name" class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">{{ __('Nombre') }}</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                       class="w-full rounded-xl bg-slate-950/60 border border-slate-800/80 p-3 text-sm text-slate-100 placeholder-slate-600 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition duration-200" />
                @error('name') <p class="mt-2 text-xs font-medium text-red-400">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="description" class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">{{ __('Descripción') }}</label>
                <textarea id="description" name="description" rows="3" required
                          class="w-full rounded-xl bg-slate-950/60 border border-slate-800/80 p-3 text-sm text-slate-100 placeholder-slate-600 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition duration-200 resize-none leading-relaxed">{{ old('description') }}</textarea>
                @error('description') <p class="mt-2 text-xs font-medium text-red-400">{{ $message }}</p> @enderror
            </div>

            {{-- Icon Picker (Misma lógica) --}}
            <div class="relative" id="icon-picker-container">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">{{ __('Icono del Servicio') }}</label>
                <input type="hidden" id="icon-hidden-input" name="icon" value="{{ old('icon', 'help-circle') }}" required>

                <button type="button" id="icon-dropdown-trigger"
                        class="w-full flex items-center justify-between rounded-xl border border-slate-800/80 bg-slate-950/60 p-3 shadow-sm text-left focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition duration-200 cursor-pointer group">
                    <div class="flex items-center space-x-3">
                        <div class="p-2 bg-slate-900 rounded-lg text-blue-400 border border-slate-800/40">
                            <i id="current-icon-preview" data-lucide="{{ old('icon', 'help-circle') }}" class="size-5"></i>
                        </div>
                        <span id="current-icon-name" class="text-sm font-semibold text-slate-200">{{ old('icon', 'Seleccionar icono...') }}</span>
                    </div>
                    <i data-lucide="chevron-down" class="size-4 text-slate-500 group-hover:text-slate-300 transition-colors"></i>
                </button>

                <div id="icon-dropdown-menu" class="hidden absolute z-50 mt-2 w-full rounded-xl bg-slate-950 shadow-2xl ring-1 ring-slate-800 p-4 border border-slate-800/60">
                    <div class="relative mb-3">
                        <input type="text" id="icon-search-input" placeholder="Buscar icono..."
                               class="w-full pl-9 pr-4 py-2 bg-slate-900 border border-slate-800 rounded-lg text-sm text-slate-200 focus:outline-none focus:border-blue-500 transition-all">
                        <i data-lucide="search" class="absolute left-3 top-2.5 size-4 text-slate-500"></i>
                    </div>
                    <div id="icons-grid" class="grid grid-cols-6 gap-2 max-h-48 overflow-y-auto p-1 scrollbar-thin scrollbar-thumb-slate-800"></div>
                </div>
                @error('icon') <p class="mt-2 text-xs font-medium text-red-400">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-800/60 mt-6">
                <a href="{{ route('dashboard.services.index') }}" class="inline-flex items-center justify-center px-4 py-2.5 bg-slate-900 border border-slate-800 hover:bg-slate-800 rounded-xl font-semibold text-xs text-slate-300 uppercase tracking-widest transition cursor-pointer">
                    Cancelar
                </a>
                <button type="submit" class="inline-flex items-center justify-center px-5 py-2.5 bg-emerald-600 hover:bg-emerald-500 active:scale-95 text-white font-semibold text-xs rounded-xl uppercase tracking-widest shadow-lg shadow-emerald-600/10 transition-all cursor-pointer">
                    {{ __('Crear Servicio') }}
                </button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            lucide.createIcons();

            const trigger = document.getElementById('icon-dropdown-trigger');
            const menu = document.getElementById('icon-dropdown-menu');
            const searchInput = document.getElementById('icon-search-input');
            const grid = document.getElementById('icons-grid');
            const hiddenInput = document.getElementById('icon-hidden-input');
            const currentName = document.getElementById('current-icon-name');
            const previewContainer = document.getElementById('current-icon-preview').parentElement;

            // Abrir / Cerrar el menú desplegable
            trigger.addEventListener('click', () => {
                menu.classList.toggle('hidden');
                if (!menu.classList.contains('hidden')) {
                    searchInput.focus();
                    fetchIcons('');
                }
            });

            // Cerrar si hacen clic fuera
            document.addEventListener('click', (e) => {
                if (!document.getElementById('icon-picker-container').contains(e.target)) {
                    menu.classList.add('hidden');
                }
            });

            // Buscador con Debounce
            let timeout = null;
            searchInput.addEventListener('input', (e) => {
                clearTimeout(timeout);
                timeout = setTimeout(() => {
                    fetchIcons(e.target.value);
                }, 300);
            });

            function fetchIcons(query) {
                grid.innerHTML = '<div class="col-span-6 text-center text-xs text-slate-500 py-4">Buscando...</div>';

                fetch(`/api/lucide-icons/search?q=${encodeURIComponent(query)}`)
                    .then(res => res.json())
                    .then(icons => {
                        grid.innerHTML = '';

                        if(icons.length === 0) {
                            grid.innerHTML = '<div class="col-span-6 text-center text-xs text-slate-600 py-4">No se encontraron iconos</div>';
                            return;
                        }

                        icons.forEach(iconName => {
                            const btn = document.createElement('button');
                            btn.type = 'button';
                            // Clases actualizadas para la grilla interna con estética Dark
                            btn.className = 'p-2.5 bg-slate-900/60 border border-slate-800/60 rounded-xl flex flex-col items-center justify-center hover:bg-blue-600/10 hover:border-blue-500/40 transition-all duration-150 group cursor-pointer';
                            btn.title = iconName;
                            btn.innerHTML = `<i data-lucide="${iconName}" class="size-5 text-slate-400 group-hover:text-blue-400 transition-colors"></i>`;

                            btn.addEventListener('click', () => {
                                selectIcon(iconName);
                            });

                            grid.appendChild(btn);
                        });

                        lucide.createIcons();
                    });
            }

            function selectIcon(name) {
                hiddenInput.value = name;
                currentName.innerText = name;
                previewContainer.innerHTML = `<i id="current-icon-preview" data-lucide="${name}" class="size-5"></i>`;
                lucide.createIcons();
                menu.classList.add('hidden');
                searchInput.value = '';
            }
        });
    </script>
</x-layouts.dashboard>
