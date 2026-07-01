<x-layouts.dashboard section="Bandeja de Entrada" title="Detalle del Mensaje">
    <div class="mb-4">
        <a href="{{ route('dashboard.message.index') }}"
           class="inline-flex items-center gap-2 text-sm font-medium text-slate-400 hover:text-white transition-colors group">
            <i data-lucide="arrow-left" class="size-4 transition-transform group-hover:-translate-x-1"></i>
            Volver a la bandeja de entrada
        </a>
    </div>

    <div class="max-w-4xl mx-auto bg-slate-900/40 backdrop-blur-md rounded-2xl border border-slate-800/80 shadow-xl overflow-hidden">

        <div class="p-6 sm:p-8 border-b border-slate-900/60 bg-slate-950/20 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="flex items-center gap-4">
                <div class="size-12 rounded-xl bg-gradient-to-br from-blue-500/10 to-cyan-500/5 border border-slate-800 flex items-center justify-center text-blue-400 font-bold text-lg shadow-inner select-none">
                    {{ strtoupper(substr($message->name, 0, 1)) }}
                </div>

                <div>
                    <h1 class="text-xl font-bold text-white tracking-tight leading-snug">
                        {{ $message->name }}
                    </h1>
                    <a href="mailto:{{ $message->email }}" class="text-sm text-blue-400 hover:underline inline-flex items-center gap-1 mt-0.5 font-medium">
                        {{ $message->email }}
                        <i data-lucide="external-link" class="size-3 text-blue-500/70"></i>
                    </a>
                </div>
            </div>

            <div class="text-xs font-semibold text-slate-500 bg-slate-950/60 border border-slate-900 px-3 py-1.5 rounded-lg self-start sm:self-center flex items-center gap-1.5">
                <i data-lucide="calendar" class="size-3.5 text-slate-600"></i>
                {{ $message->created_at->format('d M, Y - H:i') }}
                <span class="text-slate-700">•</span>
                <span class="text-slate-400">{{ $message->created_at->diffForHumans() }}</span>
            </div>
        </div>

        <div class="p-6 sm:p-8 bg-transparent">
            <div class="text-xs font-bold uppercase tracking-widest text-slate-500 mb-4 flex items-center gap-2">
                <i data-lucide="message-square" class="size-3.5 text-blue-500"></i>
                Contenido del Mensaje
            </div>

            <div class="text-slate-300 text-base leading-relaxed whitespace-pre-wrap font-normal bg-slate-950/30 rounded-xl p-5 border border-slate-900/50 shadow-inner">
                {{ $message->message }}
            </div>
        </div>

        <div class="px-6 py-4 bg-slate-950/40 border-t border-slate-900/60 flex items-center justify-between gap-4">

            <a href="mailto:{{ $message->email }}?subject=RE: Contacto Fercho Tech"
               class="inline-flex items-center gap-2 px-4 py-2 bg-slate-900 border border-slate-800 text-slate-200 hover:text-white hover:bg-slate-800 text-xs font-bold uppercase tracking-wider rounded-xl transition duration-150 cursor-pointer">
                <i data-lucide="reply" class="size-4 text-blue-400"></i>
                Responder por Correo
            </a>

            <form action="{{ route('dashboard.message.destroy', $message->id) }}" method="POST" onsubmit="return confirm('¿Estás completamente seguro de que deseas eliminar permanentemente este mensaje de tu bandeja?');">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="inline-flex items-center gap-2 px-4 py-2 bg-red-500/10 hover:bg-red-500 text-red-400 hover:text-white border border-red-500/20 hover:border-transparent text-xs font-bold uppercase tracking-wider rounded-xl transition-all duration-200 cursor-pointer group"
                        title="Eliminar mensaje definitivamente">
                    <i data-lucide="trash-2" class="size-4 text-red-400/80 group-hover:text-white transition-colors"></i>
                    Eliminar Mensaje
                </button>
            </form>
        </div>
    </div>
</x-layouts.dashboard>
