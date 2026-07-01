<x-layouts.app title="Iniciar Sesión - Fercho Tech">
    <x-slot:seo>
        <meta name="robots" content="noindex, nofollow">
    </x-slot:seo>
    <section class="min-h-screen flex items-center justify-center px-6 py-12 relative overflow-hidden">

        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[400px] h-[400px] bg-blue-500/5 rounded-full blur-3xl pointer-events-none"></div>

        <div class="relative max-w-md w-full bg-slate-900/40 backdrop-blur-md border border-slate-800/60 p-8 sm:p-10 rounded-3xl shadow-2xl shadow-black/50 z-10">

            <div class="text-center mb-8">
                <h2 class="text-3xl font-black tracking-tight text-white">
                    Fercho <span class="bg-gradient-to-r from-blue-400 to-indigo-500 bg-clip-text text-transparent">Tech</span>
                </h2>
                <p class="text-slate-400 text-sm mt-2">Bienvenido de nuevo</p>
            </div>
            @if (session('status'))
                <div class="mb-6 p-4 rounded-xl border border-green-500/30 bg-green-500/10 text-green-400 text-sm flex items-center gap-2">
                    <i data-lucide="check-circle" class="size-5"></i>
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('login.store') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Correo Electrónico</label>
                    <div class="relative group">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-500 group-focus-within:text-blue-500 transition-colors duration-200">
                            <i data-lucide="mail" class="size-5"></i>
                        </span>
                        <input type="email" tabIndex="1" name="email" value="{{ old('email') }}" placeholder="tu@ejemplo.com"
                            class="w-full pl-11 pr-4 py-3.5 bg-slate-950/60 border @error('email') border-red-500/50 focus:border-red-500 focus:ring-red-500/20 @else border-slate-800 focus:border-blue-500 focus:ring-blue-500/20 @enderror rounded-xl text-white placeholder-slate-600 outline-none transition-all duration-200 focus:ring-4"
                            required>
                    </div>
                    @error('email')
                        <p class="text-red-400 text-xs mt-2 flex items-center gap-1 font-medium">
                            <i data-lucide="alert-circle" class="size-3.5"></i> {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Contraseña</label>
                    <div class="relative group">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-500 group-focus-within:text-blue-500 transition-colors duration-200">
                            <i data-lucide="lock" class="size-5"></i>
                        </span>
                        <input type="password" tabIndex="2" name="password" placeholder="••••••••"
                            class="w-full pl-11 pr-4 py-3.5 bg-slate-950/60 border @error('password') border-red-500/50 focus:border-red-500 focus:ring-red-500/20 @else border-slate-800 focus:border-blue-500 focus:ring-blue-500/20 @enderror rounded-xl text-white placeholder-slate-600 outline-none transition-all duration-200 focus:ring-4"
                            required>
                    </div>
                    @error('password')
                        <p class="text-red-400 text-xs mt-2 flex items-center gap-1 font-medium">
                            <i data-lucide="alert-circle" class="size-3.5"></i> {{ $message }}
                        </p>
                    @enderror

                    <div class="flex justify-end mt-2.5">
                        <a href="{{ route('password.request') }}" class="text-xs text-blue-400 hover:text-blue-300 transition-colors duration-150 font-medium">
                            ¿Olvidaste tu contraseña?
                        </a>
                    </div>
                </div>

                <div class="pt-2">
                    <button type="submit"
                        tabIndex="3"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3.5 px-4 rounded-xl transition-all duration-200 shadow-lg shadow-blue-500/25 hover:shadow-blue-500/40 transform hover:-translate-y-0.5 active:translate-y-0 cursor-pointer text-center tracking-wide">
                        Iniciar Sesión
                    </button>
                </div>
            </form>

            <div class="relative my-8">
                <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-gray-400/30"></div></div>
                <div class="relative flex justify-center text-xs uppercase text-gray-400"><span class="bg-slate-900 px-2">o continuar con</span></div>
            </div>
            <div class="grid grid-cols-1 gap-3">
                <a href="{{ route('auth.redirect', 'discord') }}"
                   class="flex items-center justify-center gap-3 py-3 px-4 rounded-xl bg-[#5865F2] hover:bg-[#4752F2] text-white transition-all duration-200 font-semibold text-sm shadow-lg shadow-indigo-900/20 active:scale-[0.98]">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M20.317 4.37a19.791 19.791 0 0 0-4.885-1.515.074.074 0 0 0-.079.037c-.21.375-.444.864-.608 1.25a18.27 18.27 0 0 0-5.487 0 12.64 12.64 0 0 0-.617-1.25.077.077 0 0 0-.079-.037A19.736 19.736 0 0 0 3.677 4.37a.07.07 0 0 0-.032.027C.533 9.046-.32 13.58.103 18.055a.07.07 0 0 0 .026.046 19.89 19.89 0 0 0 5.982 3.075.074.074 0 0 0 .079-.036 14.634 14.634 0 0 0 1.263-2.062.075.075 0 0 0-.041-.103 12.78 12.78 0 0 1-1.847-.887.075.075 0 0 1-.007-.124c.125-.094.25-.192.373-.29a.074.074 0 0 1 .077-.005 13.91 13.91 0 0 0 11.666 0 .074.074 0 0 1 .077.005c.123.098.248.196.374.29a.075.075 0 0 1-.006.124 12.924 12.924 0 0 1-1.848.887.075.075 0 0 0-.04.103c.394.675.823 1.327 1.263 2.062a.074.074 0 0 0 .079.036 19.89 19.89 0 0 0 5.982-3.075.074.074 0 0 0 .026-.046c.557-5.744-.925-10.74-3.538-14.658a.077.077 0 0 0-.033-.027zM8.02 15.332c-1.183 0-2.157-1.085-2.157-2.419 0-1.333.956-2.419 2.157-2.419 1.21 0 2.176 1.096 2.157 2.419 0 1.334-.956 2.419-2.157 2.419zm7.975 0c-1.183 0-2.157-1.085-2.157-2.419 0-1.333.955-2.419 2.157-2.419 1.21 0 2.176 1.096 2.157 2.419 0 1.334-.946 2.419-2.157 2.419z"/></svg>
                    <span>Continuar con Discord</span>
                </a>

                <a href="{{ route('auth.redirect', 'google') }}"
                   class="flex items-center justify-center gap-3 py-3 px-4 rounded-xl bg-white hover:bg-slate-100 text-slate-900 transition-all duration-200 font-semibold text-sm shadow-lg active:scale-[0.98]">
                    <svg class="w-5 h-5" viewBox="0 0 24 24"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
                    <span>Continuar con Google</span>
                </a>
            </div>
            <div class="mt-8 pt-6 border-t border-slate-800/80 text-center">
                <p class="text-slate-400 text-sm">
                    ¿No tienes cuenta?
                    <a href="#" class="text-blue-500 font-bold hover:text-blue-400 transition-colors duration-150 ml-1">Regístrate gratis</a>
                </p>
            </div>
        </div>
    </section>

</x-layouts.app>
