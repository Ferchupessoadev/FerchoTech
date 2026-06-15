<!DOCTYPE html>
<html lang="es" class="h-full bg-gray-950">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña - Fercho Sistemas</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="h-full flex flex-col justify-center px-6 py-12 lg:px-8 text-gray-100 font-sans">

    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <div class="flex justify-center items-center gap-2 mb-6">
            <div class="bg-blue-600 p-2 rounded-lg shadow-lg shadow-blue-500/20">
                <i data-lucide="terminal" class="size-6 text-white"></i>
            </div>
            <span class="text-xl font-bold tracking-tight bg-gradient-to-r from-white to-gray-400 bg-clip-text text-transparent">
                Fercho Sistemas
            </span>
        </div>
        <h2 class="text-center text-2xl font-bold tracking-tight text-white">
            Establecer nueva contraseña
        </h2>
        <p class="mt-2 text-center text-sm text-gray-400">
            Por favor, introduce tu nueva credencial de acceso de forma segura.
        </p>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-gray-900/50 border border-gray-800/60 p-8 rounded-2xl shadow-xl backdrop-blur-sm">

            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-600/10 border border-red-500/30 rounded-xl text-red-400 text-sm flex flex-col gap-1">
                    <div class="flex items-center gap-2 font-semibold">
                        <i data-lucide="alert-circle" class="size-4 shrink-0"></i>
                        <span>Hubo un problema con los datos:</span>
                    </div>
                    <ul class="list-disc list-inside pl-1 text-xs text-gray-400 mt-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('password.store') }}" method="POST" class="space-y-6">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-300">Correo Electrónico</label>
                    <div class="mt-2 relative rounded-xl shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-500">
                            <i data-lucide="mail" class="size-4"></i>
                        </div>
                        <input type="email" name="email" id="email"
                            value="{{ request()->email ?? old('email') }}"
                            required readonly
                            class="block w-full rounded-xl bg-gray-950/60 border border-gray-800 pl-10 pr-3 py-3 text-gray-400 text-sm focus:outline-none cursor-not-allowed">
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-300">Nueva Contraseña</label>
                    <div class="mt-2 relative rounded-xl shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-500">
                            <i data-lucide="lock" class="size-4"></i>
                        </div>
                        <input type="password" name="password" id="password" required autofocus
                            placeholder="••••••••"
                            class="block w-full rounded-xl bg-gray-950 border border-gray-800 pl-10 pr-3 py-3 text-white placeholder-gray-600 text-sm transition duration-200 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/10">
                    </div>
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-300">Confirmar Contraseña</label>
                    <div class="mt-2 relative rounded-xl shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-500">
                            <i data-lucide="shield-check" class="size-4"></i>
                        </div>
                        <input type="password" name="password_confirmation" id="password_confirmation" required
                            placeholder="••••••••"
                            class="block w-full rounded-xl bg-gray-950 border border-gray-800 pl-10 pr-3 py-3 text-white placeholder-gray-600 text-sm transition duration-200 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/10">
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="w-full text-white font-bold py-3 px-4 rounded-xl transition duration-300 transform shadow-lg bg-blue-600 hover:bg-blue-500 hover:scale-[1.01] active:scale-95 shadow-blue-900/20 cursor-pointer">
                        Restablecer Contraseña
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>
