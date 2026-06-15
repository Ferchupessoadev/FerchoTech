@php
    $isActive = Route::is($routeName);
    $activeClasses = 'bg-blue-500/10 text-blue-400 border border-blue-500/20';
    $inactiveClasses = 'text-slate-300 hover:bg-slate-900 hover:text-white';
@endphp

<a href="{{ $href }}"
   {{ $attributes->merge(['class' => 'p-3.5 rounded-xl transition-all duration-200 flex items-center gap-3.5 ' . ($isActive ? $activeClasses : $inactiveClasses)]) }}>

    <i data-lucide="{{ $icon }}" class="size-5"></i>
    {{ $label }}
</a>
