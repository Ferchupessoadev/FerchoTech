<x-layouts.dashboard section="Dashboard" title="Bandeja de Entrada">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-2">
        <div>
            <h2 class="text-3xl font-black tracking-tight text-white">
                Bandeja de Entrada
            </h2>
            <p class="text-sm text-slate-400 mt-1">
                Gestiona y responde a las consultas de clientes potenciales desde el formulario de contacto.
            </p>
        </div>

        <div class="self-start sm:self-center">
            <span class="inline-flex items-center gap-2 bg-blue-500/10 text-blue-400 px-3 py-1.5 rounded-xl text-xs font-bold uppercase tracking-wider border border-blue-500/20 shadow-sm shadow-blue-500/5">
                <i data-lucide="inbox" class="size-3.5"></i>
                {{ $messages->total() }} {{ $messages->total() == 1 ? 'Mensaje' : 'Mensajes' }}
            </span>
        </div>
    </div>

    <div class="bg-slate-900/40 backdrop-blur-md rounded-2xl border border-slate-800/80 shadow-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-slate-950/40 border-b border-slate-900/60">
                    <tr>
                        <th scope="col" class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-widest">Remitente</th>
                        <th scope="col" class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-widest">Mensaje</th>
                        <th scope="col" class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-widest">Fecha</th>
                        <th scope="col" class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-widest text-center w-28">Acciones</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-900/60 bg-transparent">
                    @forelse ($messages as $msg)
                        <tr class="hover:bg-slate-900/30 transition-colors duration-150 group">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="font-semibold text-slate-200 text-sm group-hover:text-white transition-colors">
                                    {{ $msg->name }}
                                </div>
                                <div class="text-xs text-slate-500 font-medium mt-0.5">
                                    {{ $msg->email }}
                                </div>
                            </td>

                            <td class="px-6 py-4 text-sm text-slate-400 max-w-xs md:max-w-md">
                                <p class="truncate leading-relaxed">
                                    {{ $msg->message }}
                                </p>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-xs font-medium text-slate-500">
                                <span class="inline-flex items-center gap-1.5">
                                    <i data-lucide="clock" class="size-3 text-slate-600"></i>
                                    {{ $msg->created_at->diffForHumans() }}
                                </span>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <div class="flex items-center justify-center gap-1">
                                    <a href="{{ route('dashboard.message', $msg->id) }}"
                                       class="inline-flex items-center justify-center p-2 text-slate-400 hover:text-blue-400 hover:bg-blue-500/10 rounded-lg border border-transparent hover:border-blue-500/20 transition-all duration-200 cursor-pointer"
                                       title="Leer mensaje">
                                        <i data-lucide="eye" class="size-4.5"></i>
                                        <span class="sr-only">Leer</span>
                                    </a>

                                    <form action="{{ route('dashboard.message.destroy', $msg->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este mensaje?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="inline-flex items-center justify-center p-2 text-slate-500 hover:text-red-400 hover:bg-red-500/10 rounded-lg border border-transparent hover:border-red-500/20 transition-all duration-200 cursor-pointer"
                                                title="Eliminar">
                                            <i data-lucide="trash-2" class="size-4.5"></i>
                                            <span class="sr-only">Eliminar</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center justify-center gap-3 text-slate-500">
                                    <div class="p-3 bg-slate-950/40 rounded-2xl border border-slate-900">
                                        <i data-lucide="mail-open" class="size-8 text-slate-600"></i>
                                    </div>
                                    <p class="text-sm font-medium text-slate-400">No hay mensajes nuevos en tu bandeja.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @if($messages->hasPages())
        <div class="mt-6 p-4 bg-slate-950/30 rounded-xl border border-slate-900/60 custom-dashboard-pagination">
            {{ $messages->links() }}
        </div>
    @endif
</x-layouts.dashboard>
