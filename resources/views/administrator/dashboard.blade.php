<x-layouts.dashboard title="Dashboard">
    <header class="flex justify-between items-center mb-10">
        <h1 class="text-2xl font-bold">Bandeja de Entrada</h1>
        <span class="bg-blue-500/20 text-blue-400 px-3 py-1 rounded-full text-sm border border-blue-500/30">
            {{ $messages->total() }} Mensajes totales
        </span>
    </header>

    <div class="bg-gray-900 rounded-2xl border border-gray-800 overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-800/50 border-b border-gray-800">
                <tr>
                    <th class="px-6 py-4 font-semibold text-gray-300">Remitente</th>
                    <th class="px-6 py-4 font-semibold text-gray-300">Mensaje</th>
                    <th class="px-6 py-4 font-semibold text-gray-300">Fecha</th>
                    <th class="px-6 py-4 font-semibold text-gray-300 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-800">
                @forelse ($messages as $msg)
                    <tr class="hover:bg-gray-800/30 transition">
                        <td class="px-6 py-4">
                            <div class="font-medium">{{ $msg->name }}</div>
                            <div class="text-sm text-gray-500">{{ $msg->email }}</div>
                        </td>
                        <td class="px-6 py-4 text-gray-400">
                            <p class="truncate w-64">{{ $msg->message }}</p>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">
                            {{ $msg->created_at->diffForHumans() }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            <a href={{ route('dashboard.message', $msg->id) }}>
                                <button class="text-blue-500 hover:text-blue-400 p-2" title="Leer">
                                    <i data-lucide="eye" class="size-5"></i>
                                </button>
                            </a>
                            <button class="text-red-500 hover:text-red-400 p-2" title="Eliminar">
                                <i data-lucide="trash-2" class="size-5"></i>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-10 text-center text-gray-500">
                            No hay mensajes nuevos.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $messages->links() }}
    </div>
</x-layouts.dashboard>
