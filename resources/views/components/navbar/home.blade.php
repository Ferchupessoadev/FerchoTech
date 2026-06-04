<nav id="main-navbar" class="fixed top-0 z-50 w-full px-6 py-6 flex justify-between items-center bg-transparent transition-all duration-300">
    <a href="{{ route('home') }}" class="transition-transform duration-200 hover:scale-[1.02]">
        <h1 class="text-2xl font-black tracking-tight text-blue-500">
            Fercho <span class="text-white">Tech</span>
        </h1>
    </a>

    <div class="hidden md:flex items-center gap-10 text-sm font-medium">
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

    <button id="mobile-toggle-btn" class="md:hidden flex items-center justify-center p-2 text-slate-300 hover:text-blue-400 focus:outline-none cursor-pointer z-50">
        <i id="hamburger-icon" data-lucide="menu" class="size-6 transition-transform duration-200"></i>
    </button>
</nav>

<div id="sidebar-overlay" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-40 hidden opacity-0 transition-opacity duration-300"></div>

<aside id="mobile-sidebar" class="fixed top-0 right-0 h-full w-72 bg-slate-950/95 backdrop-blur-xl border-l border-slate-800/80 z-40 translate-x-full transition-transform duration-300 ease-in-out flex flex-col p-6 pt-24">
    <div class="flex flex-col gap-6 text-base font-semibold">
        <a href="{{ route('home') }}"
           class="p-3 rounded-xl transition-all duration-150 flex items-center gap-3 {{ Route::is('home') ? 'bg-blue-500/10 text-blue-400' : 'text-slate-300 hover:bg-slate-900' }}">
            <i data-lucide="home" class="size-5"></i> Inicio
        </a>

        <a href="{{ route('about') }}"
           class="p-3 rounded-xl transition-all duration-150 flex items-center gap-3 {{ Route::is('about') ? 'bg-blue-500/10 text-blue-400' : 'text-slate-300 hover:bg-slate-900' }}">
            <i data-lucide="users" class="size-5"></i> Nosotros
        </a>

        <div class="border-t border-slate-800/60 pt-4 mt-2">
            <span class="text-xs font-bold text-slate-500 uppercase tracking-wider px-3">Servicios</span>
            <div class="flex flex-col gap-2 mt-3">
                <a href="{{ route('home') }}#soporte" class="mobile-nav-link p-3 rounded-xl text-slate-400 hover:bg-slate-900 hover:text-blue-400 transition-all duration-150 flex items-center gap-3">
                    <i data-lucide="monitor" class="size-5"></i> Soporte Técnico
                </a>
                <a href="{{ route('home') }}#desarrollo" class="mobile-nav-link p-3 rounded-xl text-slate-400 hover:bg-slate-900 hover:text-blue-400 transition-all duration-150 flex items-center gap-3">
                    <i data-lucide="code" class="size-5"></i> Desarrollo Web
                </a>
            </div>
        </div>

        <a href="{{ route('contact') }}"
           class="p-3 rounded-xl transition-all duration-150 flex items-center gap-3 border-t border-slate-800/60 pt-6 {{ Route::is('contact') ? 'bg-blue-500/10 text-blue-400' : 'text-slate-300 hover:bg-slate-900' }}">
            <i data-lucide="mail" class="size-5"></i> Contacto
        </a>
    </div>
</aside>

<div class="h-[81px]"></div>

<script>
    const btn = document.getElementById('menu-btn');
    const menu = document.getElementById('menu-dropdown');
    const arrow = document.getElementById('menu-arrow');
    const navbar = document.getElementById('main-navbar');

    const mobileToggleBtn = document.getElementById('mobile-toggle-btn');
    const hamburgerIcon = document.getElementById('hamburger-icon');
    const mobileSidebar = document.getElementById('mobile-sidebar');
    const sidebarOverlay = document.getElementById('sidebar-overlay');
    const mobileNavLinks = document.querySelectorAll('.mobile-nav-link, #mobile-sidebar a');

    function closeMenu() {
        if (!menu.classList.contains('hidden')) {
            menu.classList.add('opacity-0', 'scale-95');
            menu.classList.remove('opacity-100', 'scale-100');
            arrow.classList.remove('rotate-180');
            setTimeout(() => menu.classList.add('hidden'), 200);
        }
    }

    btn.addEventListener('click', (e) => {
        e.stopPropagation();
        const isHidden = menu.classList.contains('hidden');
        if (isHidden) {
            menu.classList.remove('hidden');
            setTimeout(() => {
                menu.classList.remove('opacity-0', 'scale-95');
                menu.classList.add('opacity-100', 'scale-100');
                arrow.classList.add('rotate-180');
            }, 10);
        } else {
            closeMenu();
        }
    });

    function openSidebar() {
        mobileSidebar.classList.remove('translate-x-full');
        sidebarOverlay.classList.remove('hidden');
        setTimeout(() => sidebarOverlay.classList.add('opacity-100'), 10);
        hamburgerIcon.setAttribute('data-lucide', 'x');
        lucide.createIcons();
    }

    function closeSidebar() {
        mobileSidebar.classList.add('translate-x-full');
        sidebarOverlay.classList.remove('opacity-100');
        setTimeout(() => sidebarOverlay.classList.add('hidden'), 300);
        hamburgerIcon.setAttribute('data-lucide', 'menu');
        lucide.createIcons();
    }

    mobileToggleBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        const isClosed = mobileSidebar.classList.contains('translate-x-full');
        if (isClosed) openSidebar(); else closeSidebar();
    });

    sidebarOverlay.addEventListener('click', closeSidebar);
    document.addEventListener('click', () => {
        closeMenu();
    });

    mobileNavLinks.forEach(link => {
        link.addEventListener('click', closeSidebar);
    });

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
