<x-layouts.dashboard section="Dashboard" title="Blog">
    <div class="max-w-6xl mx-auto">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
            <div>
                <h2 class="text-3xl font-extrabold text-white tracking-tight">Gestión de Contenido</h2>
                <p class="text-slate-400 mt-1">Administra tus artículos, ediciones y publicaciones.</p>
            </div>
            <a href="{{ route('dashboard.blog.create') }}"
               class="inline-flex items-center gap-2 px-5 py-2.5 bg-blue-600 hover:bg-blue-500 text-xs font-bold rounded-xl text-white transition-all shadow-lg shadow-blue-950/50">
                <i data-lucide="plus" class="size-4"></i> Nuevo Artículo
            </a>
        </div>

        @if(session('success'))
            <div class="mb-6 p-4 bg-emerald-500/10 border border-emerald-500/20 rounded-xl text-emerald-400 text-sm flex items-center gap-3">
                <i data-lucide="check-circle" class="size-5"></i>
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-slate-900/40 backdrop-blur-md border border-slate-800 rounded-2xl overflow-hidden shadow-2xl">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-slate-800 bg-slate-950/30 text-slate-400 text-xs font-bold uppercase tracking-wider">
                        <th class="p-6">Artículo</th>
                        <th class="p-6 text-center">Estado</th>
                        <th class="p-6 text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/50">
                    @forelse($posts as $post)
                        <tr class="hover:bg-white/5 transition-colors group">
                            <td class="p-6">
                                <div class="flex items-center gap-4">
                                    <div class="size-14 rounded-lg bg-slate-950 border border-slate-800 overflow-hidden flex-shrink-0">
                                        <img src="{{ $post->image_path ? asset('storage/' . $post->image_path) : 'https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=200&q=80' }}"
                                             class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity" alt="">
                                    </div>
                                    <div>
                                        <div class="font-semibold text-slate-200 group-hover:text-white transition-colors">{{ $post->title }}</div>
                                        <div class="text-xs text-slate-500 font-mono mt-0.5">{{ $post->created_at->format('d M, Y') }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="p-6 text-center">
                                <span class="px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                                    Publicado
                                </span>
                            </td>
                            <td class="p-6 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('dashboard.blog.edit', $post) }}" class="p-2 text-slate-500 hover:text-blue-400 transition-colors" title="Editar">
                                        <i data-lucide="edit-3" class="size-4"></i>
                                    </a>
                                    <form action="{{ route('dashboard.blog.destroy', $post) }}" method="POST" onsubmit="return confirm('¿Eliminar?');">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="p-2 text-slate-500 hover:text-red-400 transition-colors" title="Eliminar">
                                            <i data-lucide="trash-2" class="size-4"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="p-16 text-center text-slate-500">
                                <i data-lucide="folder-open" class="size-10 mx-auto mb-3 opacity-50"></i>
                                <p>No hay artículos creados.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            @if($posts->hasPages())
                <div class="p-6 border-t border-slate-800 bg-slate-950/20">
                    {{ $posts->links() }}
                </div>
            @endif
        </div>
    </div>
</x-layouts.dashboard>
