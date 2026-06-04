<x-layouts.dashboard>
    <h2 class="font-semibold text-3xl leading-tight">
        {{ __('Servicios') }}
    </h2>

    <table class="min-w-full divide-y divide-gray-200">
        <thead>
            <tr>
                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Nombre
                </th>
                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Descripción
                </th>
                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Icon
                </th>
                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($services as $service)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap truncate text-sm">
                        {{ $service->name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $service->description }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <i data-lucide="{{ $service->icon }}" class="size-5"></i>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="{{ route('dashboard.services.edit', $service) }}" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


</x-layouts.dashboard>
