<aside class="w-64 bg-slate-950/80 backdrop-blur-xl border-r border-slate-900 hidden md:flex flex-col h-screen sticky top-0 transition-all duration-300">
    <div class="p-6 border-b border-slate-900/60">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-3 group">
            <div class="p-2 bg-blue-500/10 text-blue-500 rounded-xl border border-blue-500/20 group-hover:scale-105 transition-transform duration-200">
                <i data-lucide="layout-dashboard" class="size-5"></i>
            </div>
            <h2 class="text-lg font-black tracking-tight text-white group-hover:text-slate-200 transition-colors">
                Dashboard
            </h2>
        </a>
    </div>

    <nav class="flex-1 px-4 py-6 flex flex-col gap-1.5 overflow-y-auto">
        <a href="{{ route('home') }}" target="_blank" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium text-slate-400 hover:bg-slate-900 hover:text-slate-200 transition-all duration-200 group"> <i data-lucide="globe" class="size-5 text-slate-500 group-hover:text-blue-400 transition-colors"></i>
            Ver Sitio Web
        </a>

        <div class="border-t border-slate-900/45 my-1 mx-2"></div>
        <a href="{{ route('dashboard.message.index') }}"
           class="relative flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition-all duration-200 group {{ request()->routeIs('dashboard.message.index') ? 'bg-blue-500/10 text-blue-400 font-semibold' : 'text-slate-400 hover:bg-slate-900 hover:text-slate-200' }}">
            <span class="absolute left-0 top-3 bottom-3 w-1 rounded-r-md bg-blue-500 transition-transform scale-y-0 group-hover:scale-y-100 {{ request()->routeIs('dashboard.message.index') ? 'scale-y-100' : '' }}"></span>
            <i data-lucide="mail" class="size-5 transition-colors group-hover:text-blue-400 {{ request()->routeIs('dashboard.message.index') ? 'text-blue-400' : 'text-slate-500' }}"></i>
            Mensajes
        </a>

        <a href="{{ route('dashboard.statistics') }}"
           class="relative flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition-all duration-200 group {{ request()->routeIs('stats') ? 'bg-blue-500/10 text-blue-400 font-semibold' : 'text-slate-400 hover:bg-slate-900 hover:text-slate-200' }}">
            <span class="absolute left-0 top-3 bottom-3 w-1 rounded-r-md bg-blue-500 transition-transform scale-y-0 group-hover:scale-y-100 {{ request()->routeIs('stats') ? 'scale-y-100' : '' }}"></span>
            <i data-lucide="bar-chart-3" class="size-5 transition-colors group-hover:text-blue-400 {{ request()->routeIs('stats') ? 'text-blue-400' : 'text-slate-500' }}"></i>
            Estadísticas
        </a>

        <a href="{{ route('dashboard.services.index') }}"
           class="relative flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition-all duration-200 group {{ request()->routeIs('dashboard.services.index') ? 'bg-blue-500/10 text-blue-400 font-semibold' : 'text-slate-400 hover:bg-slate-900 hover:text-slate-200' }}">
            <span class="absolute left-0 top-3 bottom-3 w-1 rounded-r-md bg-blue-500 transition-transform scale-y-0 group-hover:scale-y-100 {{ request()->routeIs('dashboard.services.index') ? 'scale-y-100' : '' }}"></span>
            <i data-lucide="layers" class="size-5 transition-colors group-hover:text-blue-400 {{ request()->routeIs('dashboard.services.index') ? 'text-blue-400' : 'text-slate-500' }}"></i>
            Servicios
        </a>
        <a href="{{ route('dashboard.users.index') }}"
           class="relative flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition-all duration-200 group {{ request()->routeIs('dashboard.users.index') ? 'bg-blue-500/10 text-blue-400 font-semibold' : 'text-slate-400 hover:bg-slate-900 hover:text-slate-200' }}">
            <span class="absolute left-0 top-3 bottom-3 w-1 rounded-r-md bg-blue-500 transition-transform scale-y-0 group-hover:scale-y-100 {{ request()->routeIs('dashboard.users.index') ? 'scale-y-100' : '' }}"></span>
            <i data-lucide="users" class="size-5 transition-colors group-hover:text-blue-400 {{ request()->routeIs('dashboard.users.index') ? 'text-blue-400' : 'text-slate-500' }}"></i>
            Usuarios
        </a>

        <a href="{{ route('dashboard.blog.index') }}"
           class="relative flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition-all duration-200 group {{ request()->routeIs('dashboard.blog.index') ? 'bg-blue-500/10 text-blue-400 font-semibold' : 'text-slate-400 hover:bg-slate-900 hover:text-slate-200' }}">
            <span class="absolute left-0 top-3 bottom-3 w-1 rounded-r-md bg-blue-500 transition-transform scale-y-0 group-hover:scale-y-100 {{ request()->routeIs('dashboard.blog.index') ? 'scale-y-100' : '' }}"></span>
            <i data-lucide="file-text" class="size-5 transition-colors group-hover:text-blue-400 {{ request()->routeIs('dashboard.blog.index') ? 'text-blue-400' : 'text-slate-500' }}"></i>
            Publicaciones
        </a>

        <a href="{{ route('dashboard.settings.index') }}"
           class="relative flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition-all duration-200 group {{ request()->routeIs('dashboard.settings.index') ? 'bg-blue-500/10 text-blue-400 font-semibold' : 'text-slate-400 hover:bg-slate-900 hover:text-slate-200' }}">
            <span class="absolute left-0 top-3 bottom-3 w-1 rounded-r-md bg-blue-500 transition-transform scale-y-0 group-hover:scale-y-100 {{ request()->routeIs('dashboard.settings.index') ? 'scale-y-100' : '' }}"></span>
            <i data-lucide="settings" class="size-5 transition-colors group-hover:text-blue-400 {{ request()->routeIs('dashboard.settings.index') ? 'text-blue-400' : 'text-slate-500' }}"></i>
            Configuraciones
        </a>
    </nav>

    <div class="p-4 border-t border-slate-900/60">
        <form method="POST" action="{{ route('logout') }}" class="w-full">
            @csrf
            <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium text-red-400 hover:bg-red-500/10 hover:text-red-300 transition-all duration-200 cursor-pointer group">
                <i data-lucide="log-out" class="size-5 text-red-400/70 group-hover:text-red-300 transition-colors"></i>
                <span>Cerrar Sesión</span>
            </button>
        </form>
    </div>
</aside>
