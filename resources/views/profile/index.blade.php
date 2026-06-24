@php
    $user = auth()->user();
    $initials = Str::initials($user->name);
@endphp

<x-layouts.app title="Perfil - Fercho Tech">
    <div class="max-w-5xl mx-auto py-8 px-4 sm:px-6">

        <x-alerts.alert />

        <div class="bg-slate-900/40 backdrop-blur-xl border border-slate-800/80 rounded-3xl p-6 sm:p-8 shadow-2xl shadow-black/40 relative overflow-hidden">
            <div class="absolute -top-24 -left-24 size-48 bg-blue-500/10 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute -bottom-24 -right-24 size-48 bg-indigo-500/10 rounded-full blur-3xl pointer-events-none"></div>

            <div class="relative flex flex-col md:flex-row items-center justify-between gap-6 pb-6">

                <div class="flex flex-col sm:flex-row items-center gap-5 text-center sm:text-left w-full md:w-auto">

                    <div class="relative group size-28 sm:size-32 shrink-0" x-data="avatarPreview()">
                        <form id="avatar-form" method="POST" action="{{ route('profile.update.avatar') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <input
                                type="file"
                                name="avatar"
                                id="avatar-input"
                                class="hidden"
                                accept="image/*"
                                @change="fileChosen"
                            >
                        </form>

                        <div class="size-full rounded-2xl overflow-hidden bg-slate-950/60 border border-slate-700/50 shadow-xl transition-all duration-300 group-hover:border-blue-500/80">
                            <template x-if="imageUrl">
                                <img :src="imageUrl" class="size-full object-cover" alt="Vista previa del avatar">
                            </template>
                            <template x-if="!imageUrl">
                                @if ($user->hasMedia('avatars'))
                                    <img src="{{ $user->getFirstMediaUrl('avatars', 'thumb') }}" alt="Avatar de {{ $user->name }}" class="size-full object-cover">
                                @else
                                    <div class="size-full bg-gradient-to-br from-blue-600/20 to-indigo-600/20 text-blue-400 flex items-center justify-center text-3xl font-black uppercase tracking-wider">
                                        {{ $initials }}
                                    </div>
                                @endif
                            </template>
                        </div>

                        <label for="avatar-input" class="absolute bottom-1 right-1 bg-slate-900/90 hover:bg-blue-600 backdrop-blur-md text-slate-300 hover:text-white p-2 rounded-xl shadow-lg border border-slate-800 cursor-pointer transition-all duration-200 hover:scale-105 flex items-center justify-center">
                            <i data-lucide="camera" class="size-4"></i>
                        </label>

                        <div x-show="imageUrl" x-transition class="absolute -bottom-10 left-1/2 -translate-x-1/2 whitespace-nowrap z-30" style="display: none;">
                            <button
                                form="avatar-form"
                                type="submit"
                                class="px-2.5 py-1 bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-[11px] rounded-lg transition-all shadow-md shadow-emerald-600/20 cursor-pointer flex items-center gap-1"
                            >
                                <i data-lucide="check" class="size-3"></i> Guardar
                            </button>
                        </div>
                    </div>

                    <div class="space-y-1">
                        <div class="flex flex-col sm:flex-row items-center gap-2.5 justify-center sm:justify-start">
                            <h1 class="text-2xl font-black tracking-tight text-white capitalize">
                                {{ $user->name }}
                            </h1>

                            @if($user->roles && $user->roles->count() > 0)
                                @foreach($user->roles as $role)
                                    <span class="px-2.5 py-0.5 rounded-md text-[10px] font-black uppercase tracking-widest bg-blue-500/10 text-blue-400 border border-blue-500/20 shadow-sm">
                                        {{ $role->name }}
                                    </span>
                                @endforeach
                            @else
                                <span class="px-2.5 py-0.5 rounded-md text-[10px] font-black uppercase tracking-widest bg-slate-800/80 text-slate-400 border border-slate-700/60 shadow-sm">
                                    {{ $user->role ?? 'Usuario' }}
                                </span>
                            @endif
                        </div>

                        <p class="text-slate-400 text-sm font-medium flex items-center justify-center sm:justify-start gap-1.5">
                            <i data-lucide="mail" class="size-3.5 text-slate-500"></i>
                            {{ $user->email }}
                        </p>
                    </div>
                </div>

                <div class="flex items-center gap-2 shrink-0">
                    <button class="px-3.5 py-2 bg-slate-800/60 hover:bg-slate-800 text-slate-200 text-xs font-bold rounded-xl border border-slate-700/40 transition-colors cursor-pointer flex items-center gap-1.5">
                        <i data-lucide="settings" class="size-3.5"></i>
                        <span>Editar información</span>
                    </button>
                </div>
            </div>

            <div class="mt-4 -mx-6 sm:-mx-8 px-6 sm:px-8 border-t border-slate-800/40 flex gap-2 bg-slate-950/10">
                <button class="px-3 py-3 text-blue-500 border-b-2 border-blue-500 text-xs font-bold tracking-wider uppercase">
                    Información
                </button>
                <button class="px-3 py-3 text-slate-400 hover:text-slate-200 text-xs font-semibold tracking-wider uppercase transition-colors cursor-pointer">
                    Seguridad
                </button>
                <button class="px-3 py-3 text-slate-400 hover:text-slate-200 text-xs font-semibold tracking-wider uppercase transition-colors cursor-pointer">
                    Actividad
                </button>
            </div>

        </div>

        <div class="grid md:grid-cols-3 gap-6 mt-6">

            <div class="md:col-span-1 space-y-6">
                <div class="bg-slate-900/40 backdrop-blur-xl border border-slate-800/80 rounded-2xl p-5 shadow-xl">
                    <h3 class="text-sm font-bold text-white mb-4 uppercase tracking-wider text-slate-400">Introducción</h3>

                    <div class="space-y-4 text-xs text-slate-300">
                        <div class="flex items-center gap-3 text-slate-400">
                            <i data-lucide="calendar" class="size-4 shrink-0 text-slate-500"></i>
                            <span>Miembro desde el <b class="text-slate-200 font-medium">{{ $user->created_at->format('d/m/Y') }}</b></span>
                        </div>

                        <div class="flex items-center gap-3 text-slate-400">
                            <i data-lucide="shield-check" class="size-4 shrink-0 text-emerald-500"></i>
                            <span>
                                @if($user->email_verified_at)
                                    <span class="text-emerald-400 font-medium">Email verificado</span>
                                @else
                                    <span class="text-amber-400 font-medium">Verificación pendiente</span>
                                @endif
                            </span>
                        </div>

                        <div class="flex items-center gap-3 text-slate-400">
                            <i data-lucide="activity" class="size-4 shrink-0 text-blue-400"></i>
                            <span>Estado: <span class="text-emerald-400 font-bold">Activa</span></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="md:col-span-2 space-y-6">
                <div class="bg-slate-900/40 backdrop-blur-xl border border-slate-800/80 rounded-2xl p-6 shadow-xl">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="p-2 bg-slate-950/60 rounded-xl text-blue-400 border border-slate-800/60">
                            <i data-lucide="user" class="size-4.5"></i>
                        </div>
                        <h2 class="text-base font-bold text-white tracking-tight">Información de la cuenta</h2>
                    </div>

                    <div class="grid sm:grid-cols-2 gap-4">
                        <div class="bg-slate-950/20 p-3.5 rounded-xl border border-slate-800/40">
                            <p class="text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Nombre Completo</p>
                            <p class="text-slate-200 font-medium text-sm capitalize">{{ $user->name }}</p>
                        </div>

                        <div class="bg-slate-950/20 p-3.5 rounded-xl border border-slate-800/40">
                            <p class="text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Dirección de correo</p>
                            <p class="text-slate-200 font-medium text-sm">{{ $user->email }}</p>
                        </div>

                        <div class="bg-slate-950/20 p-3.5 rounded-xl border border-slate-800/40">
                            <p class="text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Identificador único (ID)</p>
                            <p class="text-slate-400 font-mono text-xs">#000{{ $user->id }}</p>
                        </div>

                        <div class="bg-slate-950/20 p-3.5 rounded-xl border border-slate-800/40">
                            <p class="text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Fecha de Verificación</p>
                            <p class="text-slate-200 font-medium text-sm">
                                {{ $user->email_verified_at ? $user->email_verified_at->format('d/m/Y H:i') : 'No verificado' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-layouts.app>

<script>
    function avatarPreview() {
        return {
            imageUrl: null,
            fileChosen(event) {
                const file = event.target.files[0];
                if (!file) return;

                const reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = (e) => {
                    this.imageUrl = e.target.result;
                };
            }
        }
    }
</script>
