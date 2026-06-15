<x-layouts.app title="{{ $service->name }}">
    <header class="text-center py-16">
        <i data-lucide="{{ $service->icon }}" class="size-16 mx-auto text-blue-500"></i>
        <h1 class="text-4xl font-black text-white mt-4">{{ $service->name }}</h1>
    </header>

    <section class="max-w-4xl mx-auto p-8">
        <div class="text-slate-300 leading-relaxed">
            {{ $service->description }}
        </div>

    </section>
</x-layouts.app>
