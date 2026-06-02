<!DOCTYPE html>
<html lang={{ str_replace('_', '-', app()->getLocale()) }}>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - Fercho sistemas</title>
    <script src="https://unpkg.com/lucide@latest"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-900 text-gray-100 font-sans">
    <x-navbar.home></x-navbar.home>
    <section class="min-h-[calc(100vh-89px)] bg-gray-950 flex items-center justify-center px-6 py-12">
        <div class="max-w-md w-full bg-gray-900 rounded-3xl border border-gray-800 p-10 shadow-2xl">

            <div class="text-center mb-10">
                <h1 class="text-3xl font-bold tracking-tighter text-blue-500">
                    Fercho <span class="text-white">Tech</span>
                </h1>
                <p class="text-gray-400 mt-2">Restablecer tu contraseña</p>
                <p class="text-gray-500 text-xs mt-1 px-4">
                    Ingresa tu correo y te enviaremos un enlace para que puedas generar una nueva contraseña.
                </p>
            </div>

            @if (session('status'))
                <div class="mb-6 p-4 bg-blue-600/10 border border-blue-500/30 rounded-xl text-blue-400 text-sm flex items-start gap-3">
                    <i data-lucide="check-circle" class="size-5 shrink-0 mt-0.5"></i>
                    <span>{{ session('status') }}</span>
                </div>
            @endif

            @if ($errors->has('throttle'))
                <div id="throttle-alert" class="mb-6 p-4 bg-red-600/10 border border-red-500/30 rounded-xl text-red-400 text-sm flex items-start gap-3">
                    <i data-lucide="clock" class="size-5 shrink-0 mt-0.5"></i>
                    <span>
                        Demasiados intentos. Por favor, intente de nuevo en
                        <strong id="countdown-seconds">{{ $errors->first('throttle') }}</strong> segundos.
                    </span>
                </div>
            @endif

            <form action="{{ route('password.reset.store') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Correo Electrónico</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-500">
                            <i data-lucide="mail" class="size-5"></i>
                        </span>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="tu@ejemplo.com" required
                            class="w-full pl-11 pr-4 py-3 bg-gray-800 border @error('email') border-red-500 @else border-gray-700 @enderror rounded-xl text-white placeholder-gray-500 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition">
                    </div>

                    @error('email')
                        <p class="text-red-500 text-xs mt-2 flex items-center gap-1">
                            <i data-lucide="alert-circle" class="size-3"></i> {{ $message }}
                        </p>
                    @enderror
                </div>

                <button type="submit" id="submit-btn"
                    class="w-full text-white font-bold py-3 px-4 rounded-xl transition duration-300 transform shadow-lg
                           bg-blue-600 hover:bg-blue-500 hover:scale-[1.02] active:scale-95 shadow-blue-900/20
                           disabled:bg-gray-800 disabled:text-gray-500 disabled:border disabled:border-gray-700 disabled:cursor-not-allowed disabled:scale-100 disabled:shadow-none">
                    Enviar enlace de recuperación
                </button>
            </form>

            <div class="mt-8 pt-6 border-t border-gray-800 text-center">
                <p class="text-gray-400 text-sm">
                    ¿Recordaste tu contraseña?
                    <a href="{{ route('login') }}" class="text-blue-500 font-semibold hover:text-blue-400 transition inline-flex items-center gap-1">
                        Volver al login
                    </a>
                </p>
            </div>
        </div>
    </section>
    <script>lucide.createIcons();</script>
</body>
</html>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const secondsElement = document.getElementById('countdown-seconds');
    const alertElement = document.getElementById('throttle-alert');
    const submitBtn = document.getElementById('submit-btn');

    if (!secondsElement || !alertElement || !submitBtn) return;

    let timeRemaining = parseInt(secondsElement.textContent.trim(), 10);
    if (isNaN(timeRemaining)) {
        timeRemaining = 60;
    }

    // === 1. BLOQUEAR EL BOTÓN (Tailwind aplicará los estilos 'disabled:' automáticamente) ===
    submitBtn.disabled = true;

    // === 2. INICIAR CUENTA REGRESIVA ===
    const countdown = setInterval(function () {
        timeRemaining--;

        if (timeRemaining <= 0) {
            clearInterval(countdown);

            // Desvanecer la alerta
            alertElement.style.transition = "opacity 0.5s ease";
            alertElement.style.opacity = "0";
            setTimeout(() => { alertElement.remove(); }, 500);

            // === 3. DESBLOQUEAR EL BOTÓN (Vuelve a ser azul al instante) ===
            submitBtn.disabled = false;

        } else {
            secondsElement.textContent = timeRemaining;
        }
    }, 1000);
});
</script>
