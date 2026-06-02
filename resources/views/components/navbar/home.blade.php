<!-- Nav Principal -->
<nav id="main-navbar" class="fixed top-0 z-50 w-full px-6 py-6 flex justify-between items-center border-b border-slate-900 bg-transparent transition-all duration-300">
    <a href="{{ route('home') }}" class="transition-transform duration-200 hover:scale-[1.02]">
        <h1 class="text-2xl font-black tracking-tight text-blue-500">
            Fercho <span class="text-white">Tech</span>
        </h1>
    </a>

    <!-- Enlaces de navegación -->
<div class="flex items-center gap-10 text-sm font-medium">

        <a href="{{ route('home') }}"
           class="transition-colors duration-200 {{ Route::is('home') ? 'text-blue-500 font-bold' : 'text-slate-300 hover:text-blue-400' }}">
            Inicio
        </a>

        <a href="{{ route('about') }}"
           class="transition-colors duration-200 {{ Route::is('about') ? 'text-blue-500 font-bold' : 'text-slate-300 hover:text-blue-400' }}">
            Nosotros
        </a>

        <div class="relative">
            <button id="menu-btn" class="flex items-center gap-1 transition-colors duration-200 focus:outline-none py-2 cursor-pointer text-slate-300 hover:text-blue-400 group">
                <span>Servicios</span>
                <div id="menu-arrow" class="transition-transform duration-300 ease-in-out">
                    <i data-lucide="chevron-down" class="size-4"></i>
                </div>
            </button>

            <div id="menu-dropdown" class="absolute left-1/2 -translate-x-1/2 mt-2 w-56 hidden opacity-0 scale-95 transition-all duration-200 z-50">
                <div class="bg-slate-950/95 backdrop-blur-xl border border-slate-800 rounded-xl shadow-2xl overflow-hidden p-1">
                    <a href="{{ route('home') }}#soporte" class="flex items-center gap-3 px-4 py-3 rounded-lg text-slate-400 hover:bg-slate-900 hover:text-blue-400 transition-all duration-150">
                        <i data-lucide="monitor" class="size-4"></i>
                        <span class="text-sm">Soporte Técnico</span>
                    </a>
                    <a href="{{ route('home') }}#desarrollo" class="flex items-center gap-3 px-4 py-3 rounded-lg text-slate-400 hover:bg-slate-900 hover:text-blue-400 transition-all duration-150">
                        <i data-lucide="code" class="size-4"></i>
                        <span class="text-sm">Desarrollo Web</span>
                    </a>
                </div>
            </div>
        </div>

        <a href="{{ route('contact') }}"
           class="transition-colors duration-200 {{ Route::is('contact') ? 'text-blue-500 font-bold' : 'text-slate-300 hover:text-blue-400' }}">
            Contacto
        </a>
    </div>
</nav>

<!-- Espaciador para que el header no se meta abajo del navbar fijo -->
<div class="h-[81px]"></div>

<script>
    const btn = document.getElementById('menu-btn');
    const menu = document.getElementById('menu-dropdown');
    const arrow = document.getElementById('menu-arrow');
    const navbar = document.getElementById('main-navbar');

    // Función unificada para cerrar el menú de manera limpia
    function closeMenu() {
        if (!menu.classList.contains('hidden')) {
            menu.classList.add('opacity-0', 'scale-95');
            menu.classList.remove('opacity-100', 'scale-100');
            arrow.classList.remove('rotate-180');
            setTimeout(() => menu.classList.add('hidden'), 200);
        }
    }

    // Toggle de apertura y cierre del menú
    btn.addEventListener('click', (e) => {
        e.stopPropagation();
        const isHidden = menu.classList.contains('hidden');

        if (isHidden) {
            menu.classList.remove('hidden');
            setTimeout(() => {
                menu.classList.remove('opacity-0', 'scale-95');
                menu.classList.add('opacity-100', 'scale-100');
                arrow.classList.add('rotate-180'); // Tailwind rota el icono nativamente
            }, 10);
        } else {
            closeMenu();
        }
    });

    // Cerrar al hacer clic afuera (Bug de preventDefault corregido)
    document.addEventListener('click', () => closeMenu());

    // Control del scroll unificado usando clases nativas de Tailwind
    window.addEventListener('scroll', () => {
        if (window.scrollY > 20) {
            navbar.classList.remove('py-6', 'bg-transparent');
            navbar.classList.add('py-4', 'bg-slate-950/80', 'backdrop-blur-md', 'shadow-lg', 'shadow-black/20');
        } else {
            navbar.classList.remove('py-4', 'bg-slate-950/80', 'backdrop-blur-md', 'shadow-lg', 'shadow-black/20');
            navbar.classList.add('py-6', 'bg-transparent');
        }
    });
</script>
