<x-layouts.app title="Registrarse - Fercho Tech">

    <section class="min-h-screen flex items-center justify-center px-6 py-12 relative overflow-hidden">

        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[400px] h-[400px] bg-blue-500/5 rounded-full blur-3xl pointer-events-none"></div>

        <div class="relative max-w-md w-full bg-slate-900/40 backdrop-blur-md border border-slate-800/60 p-8 sm:p-10 rounded-3xl shadow-2xl shadow-black/50 z-10">

            <div class="text-center mb-8">
                <h2 class="text-3xl font-black tracking-tight text-white">
                    Fercho <span class="bg-gradient-to-r from-blue-400 to-indigo-500 bg-clip-text text-transparent">Tech</span>
                </h2>
                <p class="text-slate-400 text-sm mt-2">Crea tu cuenta gratuita</p>
            </div>

            <form action="{{ route('register.store') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Nombre Completo</label>
                    <div class="relative group">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-500 group-focus-within:text-blue-500 transition-colors duration-200">
                            <i data-lucide="user" class="size-5"></i>
                        </span>
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Juan Pérez"
                            class="w-full pl-11 pr-4 py-3.5 bg-slate-950/60 border @error('name') border-red-500/50 @else border-slate-800 @enderror rounded-xl text-white placeholder-slate-600 outline-none transition-all focus:ring-4 focus:ring-blue-500/20"
                            required>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Correo Electrónico</label>
                    <div class="relative group">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-500 group-focus-within:text-blue-500 transition-colors duration-200">
                            <i data-lucide="mail" class="size-5"></i>
                        </span>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="tu@ejemplo.com"
                            class="w-full pl-11 pr-4 py-3.5 bg-slate-950/60 border @error('email') border-red-500/50 @else border-slate-800 @enderror rounded-xl text-white placeholder-slate-600 outline-none transition-all focus:ring-4 focus:ring-blue-500/20"
                            required>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Contraseña</label>
                    <div class="relative group">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-500 group-focus-within:text-blue-500 transition-colors duration-200">
                            <i data-lucide="lock" class="size-5"></i>
                        </span>
                        <input type="password" name="password" placeholder="••••••••"
                            class="w-full pl-11 pr-4 py-3.5 bg-slate-950/60 border @error('password') border-red-500/50 @else border-slate-800 @enderror rounded-xl text-white placeholder-slate-600 outline-none transition-all focus:ring-4 focus:ring-blue-500/20"
                            required>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Confirmar Contraseña</label>
                    <div class="relative group">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-500 group-focus-within:text-blue-500 transition-colors duration-200">
                            <i data-lucide="shield-check" class="size-5"></i>
                        </span>
                        <input type="password" name="password_confirmation" placeholder="••••••••"
                            class="w-full pl-11 pr-4 py-3.5 bg-slate-950/60 border border-slate-800 rounded-xl text-white placeholder-slate-600 outline-none transition-all focus:ring-4 focus:ring-blue-500/20"
                            required>
                    </div>
                </div>

                <div class="pt-2">
                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3.5 px-4 rounded-xl transition-all duration-200 shadow-lg shadow-blue-500/25 hover:shadow-blue-500/40 transform hover:-translate-y-0.5 active:translate-y-0 cursor-pointer">
                        Crear Cuenta
                    </button>
                </div>
            </form>

            <div class="relative my-8">
                <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-gray-400/30"></div></div>
                <div class="relative flex justify-center text-xs uppercase text-gray-400"><span class="bg-slate-900 px-2">o regístrate con</span></div>
            </div>

            <div class="grid grid-cols-1 gap-3">
                <a href="{{ route('auth.redirect', 'discord') }}" class="flex items-center justify-center gap-3 py-3 px-4 rounded-xl bg-[#5865F2] hover:bg-[#4752F2] text-white transition-all font-semibold text-sm shadow-lg active:scale-[0.98]">
                    <i data-lucide="discord" class="size-5"></i> <span>Discord</span>
                </a>
                <a href="{{ route('auth.redirect', 'google') }}" class="flex items-center justify-center gap-3 py-3 px-4 rounded-xl bg-white hover:bg-slate-100 text-slate-900 transition-all font-semibold text-sm shadow-lg active:scale-[0.98]">
                    <i data-lucide="chrome" class="size-5"></i> <span>Google</span>
                </a>
            </div>

            <div class="mt-8 pt-6 border-t border-slate-800/80 text-center">
                <p class="text-slate-400 text-sm">
                    ¿Ya tienes cuenta?
                    <a href="{{ route('login') }}" class="text-blue-500 font-bold hover:text-blue-400 transition-colors ml-1">Inicia sesión</a>
                </p>
            </div>
        </div>
    </section>

</x-layouts.app>
