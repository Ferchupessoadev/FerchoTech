@php
    $isActive = Route::is($routeName);
@endphp

<a href="{{ $href }}"
   {{ $attributes->merge(['class' => 'relative px-4 py-2 rounded-xl transition-all duration-300 group ' . ($isActive ? 'text-blue-400 bg-blue-500/10' : 'text-slate-300 hover:text-white hover:bg-slate-900/60')]) }}>

    {{ $label }}
</a>
