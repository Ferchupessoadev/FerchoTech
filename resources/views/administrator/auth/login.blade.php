<x-layouts.app title="Iniciar Sesión - Fercho Tech">

    <section class="min-h-[calc(100vh-81px)] bg-[#080d1c] flex items-center justify-center px-6 py-12 relative overflow-hidden">

        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[400px] h-[400px] bg-blue-500/5 rounded-full blur-3xl pointer-events-none"></div>

        <div class="relative max-w-md w-full bg-slate-900/40 backdrop-blur-md border border-slate-800/60 p-8 sm:p-10 rounded-3xl shadow-2xl shadow-black/50 z-10">

            <div class="text-center mb-8">
                <h2 class="text-3xl font-black tracking-tight text-white">
                    Fercho <span class="bg-gradient-to-r from-blue-400 to-indigo-500 bg-clip-text text-transparent">Tech</span>
                </h2>
                <p class="text-slate-400 text-sm mt-2">Bienvenido de nuevo, accede a tu panel</p>
            </div>

            <form action="{{ route('login.store') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Correo Electrónico</label>
                    <div class="relative group">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-500 group-focus-within:text-blue-500 transition-colors duration-200">
                            <i data-lucide="mail" class="size-5"></i>
                        </span>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="tu@ejemplo.com"
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
                        <input type="password" name="password" placeholder="••••••••"
                            class="w-full pl-11 pr-4 py-3.5 bg-slate-950/60 border @error('password') border-red-500/50 focus:border-red-500 focus:ring-red-500/20 @else border-slate-800 focus:border-blue-500 focus:ring-blue-500/20 @enderror rounded-xl text-white placeholder-slate-600 outline-none transition-all duration-200 focus:ring-4"
                            required>
                    </div>
                    @error('password')
                        <p class="text-red-400 text-xs mt-2 flex items-center gap-1 font-medium">
                            <i data-lucide="alert-circle" class="size-3.5"></i> {{ $message }}
                        </p>
                    @enderror

                    <div class="flex justify-end mt-2.5">
                        <a href="{{ route('password.reset') }}" class="text-xs text-blue-400 hover:text-blue-300 transition-colors duration-150 font-medium">
                            ¿Olvidaste tu contraseña?
                        </a>
                    </div>
                </div>

                <div class="pt-2">
                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3.5 px-4 rounded-xl transition-all duration-200 shadow-lg shadow-blue-500/25 hover:shadow-blue-500/40 transform hover:-translate-y-0.5 active:translate-y-0 cursor-pointer text-center tracking-wide">
                        Iniciar Sesión
                    </button>
                </div>
            </form>

            <div class="mt-8 pt-6 border-t border-slate-800/80 text-center">
                <p class="text-slate-400 text-sm">
                    ¿No tienes cuenta?
                    <a href="#" class="text-blue-500 font-bold hover:text-blue-400 transition-colors duration-150 ml-1">Regístrate gratis</a>
                </p>
            </div>
        </div>
    </section>

</x-layouts.app>
