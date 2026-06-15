<x-layouts.dashboard section="Dashboard" title="Estadísticas">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div class="space-y-6">

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">

            <div class="bg-slate-900/30 backdrop-blur-md border border-slate-900 rounded-2xl p-6 relative overflow-hidden group">
                <div class="absolute top-0 right-0 p-4 text-blue-500/10 group-hover:text-blue-500/20 transition-colors">
                    <i data-lucide="eye" class="size-12"></i>
                </div>
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider block">Visitas Totales</span>
                <span class="text-3xl font-black text-white block mt-2 font-mono">{{ number_format($totalViews) }}</span>
                <span class="text-xs text-emerald-400 font-medium flex items-center gap-1 mt-2">
                    <i data-lucide="trending-up" class="size-3"></i> +12.4% este mes
                </span>
            </div>

            <div class="bg-slate-900/30 backdrop-blur-md border border-slate-900 rounded-2xl p-6 relative overflow-hidden group">
                <div class="absolute top-0 right-0 p-4 text-indigo-500/10 group-hover:text-indigo-500/20 transition-colors">
                    <i data-lucide="file-text" class="size-12"></i>
                </div>
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider block">Artículos Publicados</span>
                <span class="text-3xl font-black text-white block mt-2 font-mono">{{ $totalPosts }}</span>
                <a href="{{ route('dashboard.blog.index') }}" class="text-xs text-blue-400 hover:text-blue-300 font-medium inline-flex items-center gap-1 mt-2 transition-colors">
                    Gestionar blog <i data-lucide="arrow-right" class="size-3"></i>
                </a>
            </div>

            <div class="bg-slate-900/30 backdrop-blur-md border border-slate-900 rounded-2xl p-6 relative overflow-hidden group">
                <div class="absolute top-0 right-0 p-4 text-purple-500/10 group-hover:text-purple-500/20 transition-colors">
                    <i data-lucide="folder" class="size-12"></i>
                </div>
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider block">Categorías</span>
                <span class="text-3xl font-black text-white block mt-2 font-mono">{{ $totalCategories }}</span>
                <span class="text-xs text-slate-500 block mt-2">Estructura del ecosistema</span>
            </div>

            <div class="bg-slate-900/30 backdrop-blur-md border border-slate-900 rounded-2xl p-6 relative overflow-hidden group">
                <div class="absolute top-0 right-0 p-4 text-amber-500/10 group-hover:text-amber-500/20 transition-colors">
                    <i data-lucide="users" class="size-12"></i>
                </div>
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider block">Operadores</span>
                <span class="text-3xl font-black text-white block mt-2 font-mono">{{ $totalUsers }}</span>
                <span class="text-xs text-slate-500 block mt-2">Cuentas con credenciales</span>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <div class="lg:col-span-2 bg-slate-900/20 backdrop-blur-md border border-slate-900 rounded-2xl p-6 shadow-2xl flex flex-col justify-between">
                <div class="mb-4">
                    <h3 class="text-sm font-bold uppercase tracking-wider text-slate-200">Flujo de Tráfico Semanal</h3>
                    <p class="text-xs text-slate-500">Muestreo de interacciones en las últimas 168 horas.</p>
                </div>
                <div class="relative w-full h-64">
                    <canvas id="trafficChart"></canvas>
                </div>
            </div>

            <div class="bg-slate-900/20 backdrop-blur-md border border-slate-900 rounded-2xl p-6 shadow-2xl flex flex-col justify-between">
                <div>
                    <div class="mb-4">
                        <h3 class="text-sm font-bold uppercase tracking-wider text-slate-200">Contenido Top</h3>
                        <p class="text-xs text-slate-500">Artículos con mayor rendimiento reciente.</p>
                    </div>
                    <div class="space-y-4">
                        @forelse($topPosts as $post)
                            <div class="flex items-center gap-3 p-2 rounded-xl hover:bg-slate-900/40 transition-colors group">
                                <div class="size-10 rounded-lg bg-slate-950 border border-slate-900 overflow-hidden flex-shrink-0">
                                    <img src="{{ $post->image_path ? asset('storage/' . $post->image_path) : asset('assets/default-blog.png') }}" class="w-full h-full object-cover">
                                </div>
                                <div class="min-w-0 flex-1">
                                    <span class="text-xs font-bold text-slate-200 block truncate group-hover:text-blue-400 transition-colors">{{ $post->title }}</span>
                                    <span class="text-[10px] font-mono text-slate-500 uppercase">{{ $post->category->name ?? 'Sin Categoría' }}</span>
                                </div>
                                <div class="text-right font-mono text-xs text-slate-400">
                                    {{ rand(80, 250) }} <span class="text-[10px] text-slate-600">vistas</span>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-8 text-xs text-slate-600 font-normal">
                                No hay publicaciones registradas.
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const ctx = document.getElementById('trafficChart').getContext('2d');

            const gradient = ctx.createLinearGradient(0, 0, 0, 250);
            gradient.addColorStop(0, 'rgba(59, 130, 246, 0.2)');
            gradient.addColorStop(1, 'rgba(59, 130, 246, 0.0)');

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: {!! json_encode($chartLabels) !!},
                    datasets: [{
                        label: 'Visitas',
                        data: {!! json_encode($chartData) !!},
                        borderColor: '#3b82f6',
                        borderWidth: 2.5,
                        pointBackgroundColor: '#3b82f6',
                        pointHoverRadius: 6,
                        backgroundColor: gradient,
                        fill: true,
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        x: {
                            grid: { display: false },
                            ticks: { color: '#64748b', font: { size: 10, family: 'monospace' } }
                        },
                        y: {
                            grid: { color: 'rgba(30, 41, 59, 0.3)' },
                            ticks: { color: '#64748b', font: { size: 10, family: 'monospace' } }
                        }
                    }
                }
            });
        });
    </script>
</x-layouts.dashboard>
