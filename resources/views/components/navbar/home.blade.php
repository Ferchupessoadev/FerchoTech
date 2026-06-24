<nav
    x-data="{ scrolled: false, sidebarIsOpen: false }"
    @scroll.window="scrolled = (window.scrollY > 20)"
    @toggle-sidebar.window="sidebarIsOpen = !sidebarIsOpen"
    :class="scrolled || sidebarIsOpen
        ? 'bg-slate-950/90 border-slate-800/60 border-b shadow-xl shadow-black/40'
        : 'bg-slate-900/50 border-transparent shadow-none'"
    class="fixed top-0 left-0 right-0 z-50 w-full transition-all duration-300 ease-in-out backdrop-blur-md"
>
    <div class="max-w-7xl mx-auto px-6 py-5 flex justify-between items-center transition-all duration-300">
        <a href="{{ route('home') }}" class="transition-transform duration-300 hover:scale-105 active:scale-95 flex items-center">
            <h1 class="sr-only">Fercho Tech</h1>
            <img
                class="h-12 w-auto object-contain transition-all duration-300"
                src="{{ asset('assets/logo2.png') }}" alt="Logo de Fercho Tech"
            >
        </a>

        <div class="hidden md:flex items-center gap-2 text-sm font-medium">
            <x-navbar.nav-link href="{{ route('home') }}" label="Inicio" route-name="home" />
            <x-navbar.nav-link href="{{ route('about') }}" label="Nosotros" route-name="about" />
            @if(count($services) > 0)
                <div class="relative" x-data="{ open: false }">
                    <button
                        @click="open = !open"
                        @click.outside="open = false"
                        class="flex items-center gap-1.5 px-4 py-2 rounded-xl transition-all duration-300 text-slate-300 hover:text-white hover:bg-slate-900/60 focus:outline-none cursor-pointer group"
                    >
                        <span>Servicios</span>
                        <div class="transition-transform duration-300 ease-out text-slate-400 group-hover:text-white"
                             :class="open ? 'rotate-180' : ''">
                            <i data-lucide="chevron-down" class="size-4"></i>
                        </div>
                    </button>

                        <div
                            x-show="open"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 scale-95"
                            x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 scale-100"
                            x-transition:leave-end="opacity-0 scale-95"
                            class="absolute left-1/2 -translate-x-1/2 mt-3 w-60 z-50 origin-top"
                            style="display: none;"
                        >
                            <div class="bg-slate-950/95 backdrop-blur-2xl border border-slate-800 rounded-2xl shadow-2xl overflow-hidden p-1.5 dynamic-glow">
                                @foreach ($services as $service)
                                    <a href="{{ route('dashboard.services.show', $service)}}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 hover:bg-blue-500/10 hover:text-blue-400 transition-all duration-200">
                                        <div class="p-2 bg-slate-900 rounded-lg text-slate-400">
                                            <i data-lucide="{{ $service->icon }}" class="size-4"></i>
                                        </div>
                                        <span class="text-sm font-medium">{{ $service->name }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                </div>
            @endif
            <x-navbar.nav-link href="{{ route('blog.index') }}" label="Blog" route-name="blog.index" />
            <x-navbar.nav-link href="{{ route('contact') }}" label="Contactanos" route-name="contact" />
            <div class="hidden md:flex items-center gap-2 ml-4 border-l border-slate-800 pl-4">
                @guest
                    <div class="flex gap-5 items-center">
                        <a href="{{ route('login') }}" class="text-sm font-medium text-slate-300 hover:text-white transition-colors">
                            Iniciar sesión
                        </a>
                        <a href="{{ route('register') }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-xl text-sm font-medium transition-all shadow-lg shadow-blue-500/20">
                            Registrate
                        </a>
                    </div>
                @else
                    <div class="relative" x-data="{ userMenuOpen: false }">
                        <button
                            @click="userMenuOpen = !userMenuOpen"
                            @click.outside="userMenuOpen = false"
                            class="flex items-center gap-3 pl-2 pr-4 py-1.5 rounded-full border border-slate-700/60 bg-slate-900/40 hover:bg-slate-800/60 text-slate-200 hover:text-white transition-all duration-300 focus:outline-none cursor-pointer group scene-glow"
                        >
                        @if(Auth::user()->hasMedia('avatars'))
                            <img
                                src="{{ Auth::user()->getFirstMediaUrl('avatars', 'thumb') }}"
                                alt="Avatar de {{ Auth::user()->name }}"
                                class="size-8 rounded-full object-cover border border-blue-500/30 group-hover:border-blue-400 transition-colors"
                            >
                        @else
                            <div class="size-8 rounded-full bg-blue-600/10 border border-blue-500/30 text-blue-500 dark:text-blue-400 flex items-center justify-center text-xs font-bold uppercase tracking-wider group-hover:border-blue-400/60 transition-colors">
                                @php
                                    $words = explode(' ', Auth::user()->name);
                                    $initials = count($words) >= 2
                                        ? mb_substr($words[0], 0, 1) . mb_substr($words[1], 0, 1)
                                        : mb_substr($words[0], 0, 2);
                                @endphp
                                {{ $initials }}
                            </div>
                        @endif
                            <span class="text-sm font-medium tracking-wide">{{ Auth::user()->name }}</span>
                            <i data-lucide="chevron-down" class="size-4 text-slate-400 transition-transform duration-300" :class="userMenuOpen ? 'rotate-180' : ''"></i>
                        </button>

                        <div
                            x-show="userMenuOpen"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 scale-95 -translate-y-2"
                            x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                            x-transition:leave-end="opacity-0 scale-95 -translate-y-2"
                            class="absolute right-0 mt-3 w-56 z-50 origin-top-right"
                            style="display: none;"
                        >
                            <div class="bg-slate-950/95 backdrop-blur-2xl border border-slate-800/80 rounded-2xl shadow-2xl overflow-hidden p-1.5 space-y-0.5">
                                <a href="{{ route('profile.index') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-slate-300 hover:bg-blue-600/10 hover:text-blue-400 transition-all duration-200">
                                    <i data-lucide="user" class="size-4.5 text-slate-400 group-hover:text-blue-400"></i>
                                    <span class="text-sm font-medium">Perfil</span>
                                </a>
                                @role('admin')
                                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-slate-300 hover:bg-blue-600/10 hover:text-blue-400 transition-all duration-200">
                                        <i data-lucide="layout-dashboard" class="size-4.5 text-slate-400 group-hover:text-blue-400"></i>
                                        <span class="text-sm font-medium">Dashboard</span>
                                    </a>
                                @endrole

                                <a href="#" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-slate-300 hover:bg-blue-600/10 hover:text-blue-400 transition-all duration-200">
                                    <i data-lucide="settings" class="size-4.5 text-slate-400"></i>
                                    <span class="text-sm font-medium">Configuración</span>
                                </a>

                                <button @click="" class="w-full flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-slate-300 hover:bg-blue-600/10 hover:text-blue-400 transition-all duration-200 text-left cursor-pointer">
                                    <i data-lucide="sun" class="size-4.5 text-slate-400"></i>
                                    <span class="text-sm font-medium">Modo Claro</span>
                                </button>

                                <div class="border-t border-slate-900 my-1"></div>

                                <!-- Cerrar Sesión -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-slate-400 hover:bg-red-500/10 hover:text-red-400 transition-all duration-200 text-left cursor-pointer">
                                        <i data-lucide="log-out" class="size-4.5 text-slate-400"></i>
                                        <span class="text-sm font-medium">Desconectarse</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endguest
            </div>
        </div>


        <button @click="$dispatch('toggle-sidebar')" class="md:hidden flex items-center justify-center p-2.5 rounded-xl bg-slate-900/50 text-slate-300 hover:text-white hover:bg-slate-900 border border-slate-800/50 focus:outline-none cursor-pointer z-50 transition-all">
            <i id="hamburger-icon" data-lucide="menu" class="size-5 transition-transform duration-200"></i>
        </button>
    </div>
</nav>

<div id="sidebar-overlay" class="fixed inset-0 bg-black/70 backdrop-blur-md z-40 hidden opacity-0 transition-opacity duration-300"></div>


<div x-data="{ open: false }"
     @toggle-sidebar.window="open = !open"
     x-show="open"
     x-transition:enter="transition-opacity duration-300"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition-opacity duration-300"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     @click="$dispatch('toggle-sidebar')"
     @click="open = false"
     class="fixed inset-0 bg-black/70 backdrop-blur-md z-40"
     x-cloak>
</div>

<aside x-data="{ open: false }"
       @toggle-sidebar.window="open = !open"
       x-show="open"
       x-transition:enter="transition-transform duration-300 ease-out"
       x-transition:enter-start="translate-x-full"
       x-transition:enter-end="translate-x-0"
       x-transition:leave="transition-transform duration-300 ease-in"
       x-transition:leave-start="translate-x-0"
       x-transition:leave-end="translate-x-full"
       class="fixed top-0 right-0 h-full w-80 bg-slate-950/95 backdrop-blur-2xl border-l border-slate-900 z-40 p-6 pt-28"
       x-cloak>

    <div class="flex flex-col gap-3 text-base font-medium" @click="open = false">
        <x-navbar.sidebar-link href="{{ route('home') }}" label="Inicio" icon="home" route-name="home" />
        <x-navbar.sidebar-link href="{{ route('about') }}" label="Nosotros" icon="users" route-name="about" />
        <x-navbar.sidebar-link href="{{ route('blog.index') }}" label="Blog" icon="book-open" route-name="blog.index" />

        <div class="border-t border-slate-900 pt-4 mt-2">
            <span class="text-xs font-bold text-slate-500 uppercase tracking-widest px-3.5">Servicios</span>
            <div class="flex flex-col gap-1.5 mt-3">
                @foreach ($services as $service)
                    <a href="#" class="p-3.5 rounded-xl text-slate-400 hover:bg-slate-900 hover:text-white transition-all duration-200 flex items-center gap-3.5">
                        <i data-lucide="{{ $service->icon }}" class="size-5 text-slate-500"></i> {{ $service->name }}
                    </a>
                @endforeach
            </div>
        </div>
        <x-navbar.sidebar-link href="{{ route('contact') }}" label="Contacto" icon="mail" route-name="contact" />

        </div>
</aside>

<div class="pt-24 sm:pt-28"></div>
