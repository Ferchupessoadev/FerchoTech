<aside class="w-64 border-r border-gray-800 bg-gray-900 hidden md:block">
    <a href="{{ route('dashboard') }}" class="p-6 flex items-center gap-3">
        <h2 class="text-xl font-bold tracking-tighter">Dashboard</h2>
    </a>
    <nav class="mt-6">
        <a href="{{ route('dashboard') }}"
           class="flex items-center gap-3 px-6 py-4 transition {{ request()->routeIs('dashboard') ? 'bg-blue-600/10 border-r-4 border-blue-500 text-blue-400' : 'text-gray-400 hover:bg-gray-800' }}">
            <i data-lucide="mail"></i> Mensajes
        </a>

        <a href="#"
           class="flex items-center gap-3 px-6 py-4 transition {{ request()->routeIs('stats') ? 'bg-blue-600/10 border-r-4 border-blue-500 text-blue-400' : 'text-gray-400 hover:bg-gray-800' }}">
            <i data-lucide="layout-dashboard"></i> Estadísticas
        </a>
        <a href="{{ route('dashboard.services.index') }}"
           class="flex items-center gap-3 px-6 py-4 transition {{ request()->routeIs('dashboard.services.index') ? 'bg-blue-600/10 border-r-4 border-blue-500 text-blue-400' : 'text-gray-400 hover:bg-gray-800' }}">
            <i data-lucide="card-sim"></i> Servicios
        </a>
        <a href="{{ route('dashboard.post.index') }}"
           class="flex items-center gap-3 px-6 py-4 transition {{ request()->routeIs('dashboard.post.index') ? 'bg-blue-600/10 border-r-4 border-blue-500 text-blue-400' : 'text-gray-400 hover:bg-gray-800' }}">
            <i data-lucide="card-sim"></i> Publicaciones
        </a>
        <form method="POST" action={{ route('logout') }} class="mt-10 px-6">
            @csrf
            <button class="flex cursor-pointer items-center gap-3 text-red-400 hover:text-red-300 transition">
                <i data-lucide="log-out"></i> Cerrar Sesión
            </button>
        </form>
    </nav>
</aside>
