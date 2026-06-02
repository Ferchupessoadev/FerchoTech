<!DOCTYPE html>
<html lang={{ str_replace('_', '-', app()->getLocale()) }}>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }} | Mensaje de {{ $message->name }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="flex min-h-screen bg-gray-950 text-white">
    <x-dashboard.sidebar></x-dashboard.sidebar>

    <main class="flex-1 p-8">
        <header class="flex justify-between items-center mb-10">
            <h1 class="text-2xl font-bold">Bandeja de Entrada</h1>
        </header>

        <div class="p-6 bg-gray-800 rounded-xl">
            <h1 class="text-3xl font-semibold mb-6">Mensaje de {{ $message->name }}</h1>
            <p class="text-gray-400 mb-6">{{ $message->message }}</p>
            <div class="flex justify-end">
                <form action={{ route('dashboard.message.destroy', $message->id) }} method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-500 hover:text-red-400 p-2" title="Eliminar">
                        <i data-lucide="trash-2" class="size-5"></i>
                    </button>
                </form>
            </div>
        </div>
    </main>
</div>

<script src="https://unpkg.com/lucide@latest"></script>
<script>lucide.createIcons();</script>
</body>
</html>
