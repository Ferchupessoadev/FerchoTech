<x-layouts.app :title="$post->title . ' - FerchoTech'">
    <article class="py-28 bg-gradient-to-b from-[#0b1329] to-[#080d1c] text-white relative min-h-screen overflow-hidden">

        <div class="absolute top-20 left-1/3 size-[500px] bg-blue-500/5 rounded-full blur-[150px] pointer-events-none"></div>
        <div class="absolute bottom-20 right-1/4 size-[400px] bg-purple-500/5 rounded-full blur-[130px] pointer-events-none"></div>

        <div class="max-w-4xl mx-auto px-4 sm:px-6 relative z-10">

            <div class="mb-8">
                <a href="{{ route('blog.index') }}"
                   class="inline-flex items-center gap-2 text-sm font-medium text-slate-400 hover:text-blue-400 transition-colors group">
                    <i data-lucide="arrow-left" class="size-4 group-hover:-translate-x-1 transition-transform"></i>
                    Volver al blog
                </a>
            </div>

            <header class="mb-10">
                <span class="inline-block text-xs font-bold text-blue-400 uppercase tracking-wider bg-blue-500/10 px-3 py-1 rounded-lg border border-blue-500/10 mb-4">
                    {{ $post->category->name }}
                </span>

                <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold tracking-tight text-white leading-tight mb-6">
                    {{ $post->title }}
                </h1>

                <div class="flex items-center gap-6 text-sm text-slate-400 border-y border-slate-800/60 py-4">
                    <div class="flex items-center gap-2">
                        <i data-lucide="calendar" class="size-4 text-slate-500"></i>
                        <span>Publicado el {{ $post->created_at->format('d \d\e M, Y') }}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i data-lucide="clock" class="size-4 text-slate-500"></i>
                        <span>{{ $post->created_at->diffForHumans() }}</span>
                    </div>
                </div>
            </header>

            @if($post->image_path)
                <div class="w-full h-64 sm:h-96 md:h-[450px] bg-slate-950 rounded-3xl overflow-hidden mb-12 border border-slate-800 shadow-2xl shadow-black/50">
                    <img src="{{ $post->image_path ? asset('storage/' . $post->image_path) : asset('assets/default-blog.png') }}"
                         class="w-full h-full object-cover object-center"
                         alt="Portada de {{ $post->title }}">
                </div>
            @endif

            <div class="quill-content text-slate-300 leading-relaxed text-base sm:text-lg space-y-6">
                {!! $post->content !!}
            </div>

            <footer class="mt-16 pt-8 border-t border-slate-800/60 flex flex-col sm:flex-row justify-between items-center gap-4">
                <p class="text-sm text-slate-500">
                    ¿Te sirvió el artículo? Compartilo con tu equipo técnico.
                </p>
                <a href="{{ route('contact') }}"
                   class="inline-flex items-center gap-2 px-5 py-2.5 bg-slate-900/60 hover:bg-blue-600 text-white border border-slate-800 hover:border-blue-500 rounded-xl text-sm font-semibold transition-all duration-200">
                    <i data-lucide="message-square" class="size-4"></i>
                    Consultar por soporte técnico
                </a>
            </footer>
            <section class="mt-16 pt-8 border-t border-slate-800/60">
                <h2 class="text-2xl font-bold text-white mb-6">Comentarios</h2>

                @auth
                    <form action="{{ route('comments.store', $post) }}" method="POST" class="bg-slate-900/50 p-6 rounded-2xl border border-slate-800">
                        @csrf
                        <textarea name="content" rows="3" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-4 text-white focus:ring-2 focus:ring-blue-500 outline-none transition-all" placeholder="Escribe tu comentario aquí..."></textarea>
                        <button type="submit" class="mt-4 px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-xl font-semibold transition-colors">
                            Publicar comentario
                        </button>
                    </form>
                @else
                    <div class="bg-slate-900/30 border border-slate-800 p-8 rounded-2xl text-center">
                        <p class="text-slate-400 mb-6">Para comentar en este artículo, debes iniciar sesión.</p>
                        <div class="flex justify-center gap-4">
                            <a href="{{ route('login') }}" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-xl font-semibold transition-colors">
                                Iniciar sesión
                            </a>
                            <a href="{{ route('register') }}" class="px-6 py-2 bg-slate-800 hover:bg-slate-700 text-white rounded-xl font-semibold transition-colors">
                                Registrarse
                            </a>
                        </div>
                    </div>
                @endauth

                <div class="mt-10 space-y-6">
                    @foreach($post->comments as $comment)
                        <div class="p-4 bg-slate-900/20 rounded-xl border border-slate-800/50">
                            <p class="text-blue-400 font-bold text-sm">{{ $comment->user->name }}</p>
                            <p class="text-slate-300 mt-1">{{ $comment->content }}</p>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>
    </article>

    <style>
        .quill-content p {
            margin-bottom: 1.5rem;
        }
        .quill-content strong {
            color: #ffffff;
            font-weight: 700;
        }
        .quill-content h2 {
            font-size: 1.75rem;
            font-weight: 800;
            color: #ffffff;
            margin-top: 2rem;
            margin-bottom: 1rem;
            letter-tight: -0.025em;
        }
        .quill-content h3 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #ffffff;
            margin-top: 1.75rem;
            margin-bottom: 0.75rem;
        }
        .quill-content ul {
            list-style-type: disc;
            padding-left: 1.5rem;
            margin-bottom: 1.5rem;
        }
        .quill-content ol {
            list-style-type: decimal;
            padding-left: 1.5rem;
            margin-bottom: 1.5rem;
        }
        .quill-content li {
            margin-bottom: 0.5rem;
        }
        .quill-content a {
            color: #3b82f6;
            text-decoration: underline;
            transition: color 0.2s;
        }
        .quill-content a:hover {
            color: #60a5fa;
        }
        .quill-content img {
            max-width: 70%;
            height: auto;
        }

        @media screen and (max-width: 768px) {
            .quill-content img {
                max-width: 100%;
            }
        }

        /* Ajuste interactivo extra para redimensionar imágenes nativamente si falla el manejador */
        .ql-editor img {
            max-width: 100%;
            height: auto;
        }
        /* Contenedor del bloque de código (estilo Terminal Linux) */
        .ql-container .ql-editor pre,
        pre {
            background-color: #030712 !important; /* Fondo negro profundo */
            border: 1px solid #1e293b !important; /* Borde slate premium */
            border-left: 4px solid #3b82f6 !important; /* Línea lateral azul brillante de Fercho Tech */
            color: #38bdf8 !important; /* Texto celeste/cian de consola */
            font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace !important;
            font-size: 0.85rem !important;
            padding: 1rem 1.25rem !important;
            border-radius: 0.5rem;
            overflow-x: auto;
            margin: 1.5rem 0 !important;
            box-shadow: inset 0 2px 4px 0 rgba(0, 0, 0, 0.6);
        }

        /* Color para comentarios o texto secundario dentro del código */
        pre code em,
        pre em {
            color: #64748b !important; /* Gris slate para anotaciones */
            font-style: normal;
        }
    </style>

    <script>

        const blocks = document.querySelectorAll("pre");

        blocks.forEach((block) => {
            // Nos aseguramos de que sea relativo para posicionar el botón arriba a la derecha
            block.style.position = "relative";

            // Creamos el botón con clases de Tailwind
            const button = document.createElement("button");
            button.className = "absolute top-2 right-2 px-2 py-1 text-[10px] font-bold font-mono uppercase bg-slate-900 hover:bg-blue-600/20 border border-slate-800 hover:border-blue-500/50 text-slate-400 hover:text-blue-400 rounded-md transition-all cursor-pointer select-none";
            button.innerText = "Copiar";

            block.appendChild(button);

            // Acción de copiado al hacer clic
            button.addEventListener("click", async function (e) {
                e.preventDefault(); // Evitamos cualquier acción secundaria

                // Obtenemos solo el texto del código (excluyendo el texto del propio botón)
                const codeText = block.querySelector("code") ? block.querySelector("code").innerText : block.innerText.replace("COPIAR", "").trim();

                try {
                    await navigator.clipboard.writeText(codeText);
                    button.innerText = "¡Copiado!";
                    button.classList.add("text-emerald-400", "border-emerald-500/50", "bg-emerald-500/10");

                    // Revertir el estado del botón después de 2 segundos
                    setTimeout(() => {
                        button.innerText = "Copiar";
                        button.className = button.className.replace("text-emerald-400 border-emerald-500/50 bg-emerald-500/10", "");
                    }, 2000);
                } catch (err) {
                    console.error("No se pudo copiar el código: ", err);
                }
            });
        });
    </script>
</x-layouts.app>
