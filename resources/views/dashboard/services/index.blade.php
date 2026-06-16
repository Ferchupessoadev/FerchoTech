<x-layouts.dashboard section="Dashboard" title="Servicios">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-2">
        <div>
            <h2 class="text-3xl font-black tracking-tight text-white">
                {{ __('Servicios') }}
            </h2>
            <p class="text-sm text-slate-400 mt-1">
                Administra los servicios tecnológicos y las características que se muestran en el sitio web.
            </p>
        </div>

        <a href="{{route('dashboard.services.store')}}" class="inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-blue-600 hover:bg-blue-500 active:scale-95 text-white text-sm font-semibold rounded-xl shadow-lg shadow-blue-600/10 transition-all duration-200 cursor-pointer">
            <i data-lucide="plus" class="size-4"></i>
            Nuevo Servicio
        </a>
    </div>

    <div class="bg-slate-900/40 backdrop-blur-md rounded-2xl border border-slate-800/80 shadow-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-800/60 match-table-elements">
                <thead class="bg-slate-950/40">
                    <tr>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-slate-400 uppercase tracking-widest">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-slate-400 uppercase tracking-widest">
                            Descripción
                        </th>
                        <th scope="col" class="px-6 py-4 class text-center text-xs font-bold text-slate-400 uppercase tracking-widest w-24">
                            Icono
                        </th>
                        <th scope="col" class="px-6 py-4 text-right text-xs font-bold text-slate-400 uppercase tracking-widest w-28">
                            Acciones
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-900/60 bg-transparent">
                    @forelse ($services as $service)
                        <tr class="hover:bg-slate-900/30 transition-colors duration-150 group">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-slate-200">
                                {{ $service->name }}
                            </td>

                            <td class="px-6 py-4 text-sm text-slate-400 max-w-md">
                                <p class="line-clamp-2 leading-relaxed">
                                    {{ $service->description }}
                                </p>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <div class="inline-flex p-2 bg-slate-950/60 rounded-xl text-blue-500 border border-slate-800/50 group-hover:border-blue-500/20 group-hover:bg-blue-500/5 transition-all duration-200">
                                    <i data-lucide="{{ $service->icon }}" class="size-5"></i>
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex items-center justify-end gap-2">
                                    <form action="{{ route('dashboard.services.destroy', $service) }}"
                                          method="POST"
                                          x-data
                                          @submit.prevent="Swal.fire({
                                              title: '¿Estás seguro?',
                                              text: 'Esta acción no se puede deshacer',
                                              icon: 'warning',
                                              showCancelButton: true,
                                              confirmButtonColor: '#ef4444',
                                              cancelButtonColor: '#64748b',
                                              confirmButtonText: 'Sí, eliminar',
                                              cancelButtonText: 'Cancelar'
                                          }).then((result) => {
                                              if (result.isConfirmed) {
                                                  $el.submit();
                                              }
                                          })"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="inline-flex items-center justify-center p-2 text-slate-400 hover:text-red-500 hover:bg-red-500/10 rounded-lg border border-transparent hover:border-red-500/20 transition-all duration-200 cursor-pointer"
                                            title="Eliminar Servicio"
                                        >
                                            <i data-lucide="trash" class="size-4"></i>
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
                                        <i data-lucide="layers-3" class="size-8 text-slate-600"></i>
                                    </div>
                                    <p class="text-sm font-medium text-slate-400">No hay servicios registrados en este momento.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.dashboard>
