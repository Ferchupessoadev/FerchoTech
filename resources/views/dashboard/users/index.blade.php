<x-layouts.dashboard section="Dashboard" title="Usuarios">

    <div class="max-w-7xl mx-auto space-y-8">

        {{-- Header --}}
        <div class="flex flex-col md:flex-row justify-between gap-6">
            <div>
                <h1 class="text-4xl font-bold text-white tracking-tight">
                    Gestión de Usuarios
                </h1>
                <p class="text-slate-400 mt-2">
                    Administra usuarios, roles y permisos desde aquí.
                </p>
            </div>

            <div class="bg-slate-900/50 border border-slate-800 rounded-2xl px-6 py-4 min-w-52">
                <div class="text-sm text-slate-400">Usuarios registrados</div>
                <div class="text-3xl font-bold text-white mt-1">
                    {{ $users->count() }}
                </div>
            </div>
        </div>

        {{-- Tabla --}}
        <div class="overflow-hidden rounded-3xl border border-slate-800 bg-slate-900/40 backdrop-blur-xl shadow-2xl">

            <table class="w-full">
                <thead>
                <tr class="border-b border-slate-800 bg-slate-950/40 text-slate-400 uppercase text-xs tracking-wider">
                    <th class="px-8 py-5 text-left">Usuario</th>
                    <th class="px-8 py-5 text-left">Rol principal</th>
                    <th class="px-8 py-5 text-left">Registrado</th>
                    <th class="px-8 py-5 text-right">Acciones</th>
                </tr>
                </thead>

                <tbody class="divide-y divide-slate-800/50">

                @forelse($users as $user)
                    <tr class="group hover:bg-white/[0.03] transition">

                        {{-- Usuario --}}
                        <td class="px-8 py-6">
                            <div class="flex items-center gap-4">

                                <div class="relative">
                                    @if ($user->avatar)
                                        <img
                                            src="{{ $user->avatar }}"
                                            class="size-14 rounded-2xl object-cover border border-slate-700"
                                            alt="{{ $user->name }}"
                                        >
                                    @else
                                        <div class="size-14 rounded-2xl border border-slate-700 bg-slate-800 flex items-center justify-center">
                                            <span class="text-lg font-bold text-slate-200">
                                                {{
                                                    collect(explode(' ', $user->name))
                                                        ->take(2)
                                                        ->map(fn ($part) => strtoupper(substr($part, 0, 1)))
                                                        ->implode('')
                                                }}
                                            </span>
                                        </div>
                                    @endif

                                    @if($user->email_verified_at)
                                        <div class="absolute -bottom-1 -right-1 size-4 rounded-full bg-emerald-500 border-2 border-slate-900"></div>
                                    @endif
                                </div>

                                <div>
                                    <div class="font-semibold text-white">
                                        {{ $user->name }}
                                    </div>

                                    <div class="text-sm text-slate-500">
                                        {{ $user->email }}
                                    </div>
                                </div>

                            </div>
                        </td>

                        {{-- Rol --}}
                        <td class="px-8 py-6">

                            @php
                                $role = $user->getRoleNames()->first();
                            @endphp

                            @if($role)
                                <span
                                    @class([
                                        'inline-flex px-3 py-1 rounded-full text-xs font-bold uppercase border',
                                        'bg-red-500/10 text-red-400 border-red-500/20' => $role === 'admin',
                                        'bg-amber-500/10 text-amber-400 border-amber-500/20' => $role === 'moderator',
                                        'bg-emerald-500/10 text-emerald-400 border-emerald-500/20' => $role === 'vip',
                                        'bg-slate-800 text-slate-300 border-slate-700' => !in_array($role,['admin','moderator','vip']),
                                    ])
                                >
                                    {{ $role }}
                                </span>
                            @else
                                <span class="text-slate-500 text-sm">
                                    Sin rol
                                </span>
                            @endif

                        </td>

                        {{-- Fecha --}}
                        <td class="px-8 py-6">
                            <div class="text-slate-300">
                                {{ $user->created_at->format('d/m/Y') }}
                            </div>

                            <div class="text-xs text-slate-500 mt-1">
                                {{ $user->created_at->diffForHumans() }}
                            </div>
                        </td>

                        {{-- Acciones --}}
                        <td class="px-8 py-6">
                            <div class="flex justify-end gap-2">

                                <a
                                    href="#"
                                    class="size-10 rounded-xl bg-slate-800 hover:bg-blue-500/20 border border-slate-700 hover:border-blue-500/30 flex items-center justify-center text-slate-400 hover:text-blue-400 transition"
                                >
                                    <i data-lucide="square-pen" class="size-4"></i>
                                </a>

                                <form action="{{ route('dashboard.users.destroy', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        onclick="return confirm('¿Eliminar usuario?')"
                                        class="size-10 rounded-xl bg-slate-800 hover:bg-red-500/20 border border-slate-700 hover:border-red-500/30 flex items-center justify-center text-slate-400 hover:text-red-400 transition"
                                    >
                                        <i data-lucide="trash-2" class="size-4"></i>
                                    </button>
                                </form>

                            </div>
                        </td>

                    </tr>
                @empty

                    <tr>
                        <td colspan="4" class="py-20 text-center">

                            <div class="flex flex-col items-center gap-4">

                                <div class="size-20 rounded-3xl bg-slate-800 flex items-center justify-center">
                                    <i data-lucide="users" class="size-10 text-slate-500"></i>
                                </div>

                                <div>
                                    <h3 class="text-xl font-semibold text-slate-300">
                                        No hay usuarios registrados
                                    </h3>

                                    <p class="text-slate-500 mt-1">
                                        Los usuarios aparecerán aquí cuando se registren.
                                    </p>
                                </div>

                            </div>

                        </td>
                    </tr>

                @endforelse

                </tbody>
            </table>

        </div>

    </div>

</x-layouts.dashboard>
