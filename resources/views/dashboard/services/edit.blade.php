<x-layouts.dashboard>
    <div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-sm">
        <h2 class="text-3xl font-semibold leading-tight text-gray-800 mb-6">
            {{ __('Editar Servicio') }}
        </h2>

        <form action="{{ route('dashboard.services.update', $service) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Nombre') }}</label>
                <input id="name" type="text" name="name" value="{{ old('name', $service->name) }}" required autofocus class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-gray-900 p-2 border" />
                @error('name') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">{{ __('Descripción') }}</label>
                <input id="description" type="text" name="description" value="{{ old('description', $service->description) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-gray-900 p-2 border" />
                @error('description') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div class="relative" id="icon-picker-container">
                <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('Icono del Servicio') }}</label>

                <input type="hidden" id="icon-hidden-input" name="icon" value="{{ old('icon', $service->icon) }}" required>

                <button type="button" id="icon-dropdown-trigger" class="w-full flex items-center justify-between rounded-md border border-gray-300 bg-white p-3 shadow-sm text-left focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <div class="flex items-center space-x-3">
                        <div class="p-1.5 bg-gray-100 rounded text-gray-700">
                            <i id="current-icon-preview" data-lucide="{{ old('icon', $service->icon ?? 'help-circle') }}" class="w-5 h-5"></i>
                        </div>
                        <span id="current-icon-name" class="font-medium text-gray-900">{{ old('icon', $service->icon ?? 'Seleccionar icono...') }}</span>
                    </div>
                    <i data-lucide="chevron-down" class="w-5 h-5 text-gray-400"></i>
                </button>

                <div id="icon-dropdown-menu" class="hidden absolute z-10 mt-2 w-full rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 p-4 border border-gray-200">
                    <div class="relative mb-3">
                        <input type="text" id="icon-search-input" placeholder="Buscar icono (ej: tv, home, heart...)" class="w-full pl-9 pr-4 py-2 border rounded-md text-sm text-slate-800 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <i data-lucide="search" class="absolute left-3 top-2.5 w-4 h-4 text-gray-400"></i>
                    </div>

                    <div id="icons-grid" class="grid grid-cols-6 gap-2 max-h-48 overflow-y-auto p-1 text-gray-600">
                        </div>
                </div>
                @error('icon') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center justify-end pt-4 border-t border-gray-100">
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 transition">
                    {{ __('Guardar') }}
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

            // Seleccionamos el CONTENEDOR del icono, no el icono directamente
            const previewContainer = document.getElementById('current-icon-preview').parentElement;

            // Abrir / Cerrar el menú desplegable
            trigger.addEventListener('click', () => {
                menu.classList.toggle('hidden');
                if (!menu.classList.contains('hidden')) {
                    searchInput.focus();
                    fetchIcons(''); // Cargar iconos iniciales
                }
            });

            // Cerrar el menú si hacen clic fuera
            document.addEventListener('click', (e) => {
                if (!document.getElementById('icon-picker-container').contains(e.target)) {
                    menu.classList.add('hidden');
                }
            });

            // Buscador con retraso (Debounce)
            let timeout = null;
            searchInput.addEventListener('input', (e) => {
                clearTimeout(timeout);
                timeout = setTimeout(() => {
                    fetchIcons(e.target.value);
                }, 300);
            });

            function fetchIcons(query) {
                grid.innerHTML = '<div class="col-span-6 text-center text-sm text-gray-800 py-4">Buscando...</div>';

                fetch(`/api/lucide-icons/search?q=${encodeURIComponent(query)}`)
                    .then(res => res.json()) // 👈 Corregido de ->then a .then
                    .then(icons => {        // 👈 Corregido de ->then a .then
                        grid.innerHTML = '';

                        if(icons.length === 0) {
                            grid.innerHTML = '<div class="col-span-6 text-center text-sm text-gray-400 py-4">No se encontraron iconos</div>';
                            return;
                        }

                        icons.forEach(iconName => {
                            const btn = document.createElement('button');
                            btn.type = 'button';
                            btn.className = 'p-2 border rounded flex flex-col items-center justify-center hover:bg-indigo-50 hover:border-indigo-500 transition group';
                            btn.title = iconName;
                            btn.innerHTML = `<i data-lucide="${iconName}" class="w-6 h-6 text-gray-700 group-hover:text-indigo-600"></i>`;

                            btn.addEventListener('click', () => {
                                selectIcon(iconName);
                            });

                            grid.appendChild(btn);
                        });

                        // Renderiza los nuevos iconos inyectados en la grilla
                        lucide.createIcons();
                    });
            }

            function selectIcon(name) {
                hiddenInput.value = name;
                currentName.innerText = name;

                previewContainer.innerHTML = `<i id="current-icon-preview" data-lucide="${name}" class="w-5 h-5"></i>`;

                lucide.createIcons();

                menu.classList.add('hidden');
                searchInput.value = '';
            }
        });
    </script>
</x-layouts.dashboard>
