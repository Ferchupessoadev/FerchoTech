<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <script src="https://unpkg.com/lucide@latest"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-950 text-slate-100 antialiased h-full min-h-screen">
    <div class="flex h-full min-h-screen overflow-hidden">

        <x-dashboard.sidebar></x-dashboard.sidebar>

        <div class="flex-1 flex flex-col min-w-0 h-screen overflow-hidden">

            <header class="sticky top-0 z-40 w-full bg-slate-950/50 backdrop-blur-md border-b border-slate-900 h-16 flex items-center justify-between px-6 sm:px-8 shrink-0">

                <div class="flex items-center gap-2.5">
                    <span class="text-sm font-medium text-slate-400 select-none">
                        {{ $section ?? 'Panel' }}
                    </span>
                    @if(isset($title))
                        <i data-lucide="chevron-right" class="size-3.5 text-slate-600"></i>
                        <span class="text-sm font-semibold text-white tracking-wide">
                            {{ $title }}
                        </span>
                    @endif
                </div>

                <div class="flex items-center gap-4">

                    <button class="relative p-2.5 text-slate-400 hover:text-white transition-all rounded-xl hover:bg-slate-900 border border-transparent hover:border-slate-800/60 cursor-pointer group">
                        <i data-lucide="bell" class="size-5 transition-transform group-hover:rotate-12"></i>
                        <span class="absolute top-2 right-2 size-2 bg-blue-500 rounded-full ring-2 ring-slate-950"></span>
                    </button>

                    <div class="h-5 w-[1px] bg-slate-800/80"></div>

                    @auth
                        <div class="flex items-center gap-3 pl-1">
                            <div class="flex flex-col items-end hidden sm:flex">
                                <span class="text-sm font-semibold text-slate-200 tracking-tight leading-none mb-1">
                                    {{ auth()->user()->name }}
                                </span>
                                <span class="text-xs text-slate-500 font-medium leading-none">
                                    {{ auth()->user()->getRoleNames()->first() ?? 'Usuario' }}
                                </span>
                            </div>

                            <div class="size-9 rounded-xl bg-gradient-to-br from-blue-500/20 to-cyan-500/10 border border-blue-500/30 flex items-center justify-center text-blue-400 font-bold text-sm shadow-md shadow-blue-500/5 select-none transition-transform hover:scale-105 overflow-hidden">
                                @if (auth()->user()->avatar)
                                    <img src="{{ auth()->user()->avatar }}"
                                         alt="{{ auth()->user()->name }}"
                                         class="w-full h-full object-cover">
                                @else
                                    <span>{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
                                @endif
                            </div>
                        </div>
                    @endauth
                </div>
            </header>

            <main class="flex-1 p-6 sm:p-8 overflow-y-auto bg-slate-950/20">
                <div class="max-w-7xl mx-auto w-full space-y-6">
                    {{ $slot }}
                </div>
            </main>

        </div>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>
