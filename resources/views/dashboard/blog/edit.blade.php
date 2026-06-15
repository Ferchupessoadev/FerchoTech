<x-layouts.dashboard section="Blog" title="Editar Artículo">
    <div class="max-w-3xl mx-auto space-y-6">
        <div>
            <a href="{{ route('dashboard.blog.index') }}" class="inline-flex items-center gap-2 text-xs font-bold text-slate-400 hover:text-white transition-colors uppercase tracking-wider font-mono">
                <i data-lucide="arrow-left" class="size-4"></i> Volver al listado
            </a>
        </div>

        <div class="bg-slate-900/30 backdrop-blur-md border border-slate-900 rounded-2xl p-6 sm:p-8 shadow-2xl">
            <form id="blog-form" action="{{ route('dashboard.blog.update', $post) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="space-y-2">
                    <label for="title" class="block text-xs font-bold uppercase tracking-wider text-slate-300">Título del Artículo</label>
                    <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}" required class="w-full px-4 py-3 rounded-xl bg-[#050b14]/80 border border-slate-800 text-slate-100 font-medium text-sm focus:outline-none focus:border-blue-500/80 transition-all">
                </div>

                <div class="space-y-2">
                    <label for="description" class="block text-xs font-bold uppercase tracking-wider text-slate-300">Descripción Corta</label>
                    <textarea id="description" name="description" rows="2" required class="w-full px-4 py-3 rounded-xl bg-[#050b14]/80 border border-slate-800 text-slate-100 font-medium text-sm focus:outline-none focus:border-blue-500/80 transition-all resize-none">{{ old('description', $post->description) }}</textarea>
                </div>

                <div class="space-y-2">
                    <label for="category_id" class="block text-xs font-bold uppercase tracking-wider text-slate-300">Categoría</label>
                    <select id="category_id" name="category_id" required class="w-full px-4 py-3 rounded-xl bg-[#050b14]/80 border border-slate-800 text-slate-100 font-medium text-sm focus:outline-none">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-300">Imagen de Portada</label>
                    <div class="flex items-center gap-4 mb-2">
                        <img src="{{ asset('storage/' . $post->image_path) }}" class="size-16 object-cover rounded-lg border border-slate-800" alt="Portada actual">
                        <p class="text-xs text-slate-500 italic">Imagen actual guardada.</p>
                    </div>
                    <div class="relative w-full px-4 py-3 rounded-xl bg-[#050b14]/80 border border-slate-800 flex items-center gap-3 cursor-pointer">
                        <input type="file" id="image" name="image" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer w-full h-full">
                        <span id="file-chosen" class="text-sm text-slate-500">Cambiar portada...</span>
                    </div>
                </div>

                <input type="hidden" id="content" name="content">

                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-300">Contenido</label>
                    <div id="editor" class="bg-[#050b14]/80 text-slate-100 min-h-[300px]"></div>
                </div>

                <div class="pt-4 border-t border-slate-900/60 flex justify-end">
                    <button type="submit" class="inline-flex items-center gap-2 px-6 py-3 bg-blue-600 hover:bg-blue-500 text-sm font-bold rounded-xl text-white transition-all">
                        <i data-lucide="save" class="size-4"></i> Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('assets/quilljs/quill.min.js') }}"></script>
    <link href={{ asset('assets/quilljs/quill.snow.css')}} rel="stylesheet">
    <script src="{{ asset('assets/quilljs/image-resize.min.js')}}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // 2. Inicializar Quill
            const quill = new Quill('#editor', {
                theme: 'snow',
                modules: {
                    toolbar: [
                        [{ 'header': [1, 2, 3, 4] }],
                        ['bold', 'italic', 'underline', 'strike'],
                        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                        ['blockquote', 'code-block'],
                        ['link', 'image'],
                        ['clean']
                    ],
                    imageResize: { displaySize: true }
                }
            });

            // 3. Inyectar contenido existente de forma segura (usando json_encode para escapar)
            const oldContent = {!! json_encode($post->content) !!};
            if (oldContent) {
                quill.root.innerHTML = oldContent;
            }

            // 4. Handler de imágenes
            quill.getModule('toolbar').addHandler('image', function() {
                const input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.onchange = async () => {
                    const file = input.files[0];
                    if (!file) return;

                    const formData = new FormData();
                    formData.append('image', file);

                    try {
                        const response = await fetch("{{ route('dashboard.blog.upload-image') }}", {
                            method: "POST",
                            body: formData,
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json'
                            }
                        });
                        const data = await response.json();
                        if (data.url) {
                            const range = quill.getSelection();
                            quill.insertEmbed(range.index, 'image', data.url);
                            quill.setSelection(range.index + 1);
                        }
                    } catch (error) { console.error("Error al subir:", error); }
                    finally { input.remove(); }
                };
                input.click();
            });

            // 5. Sincronizar al enviar
            document.getElementById('blog-form').onsubmit = function() {
                document.getElementById('content').value = quill.root.innerHTML;
            };
        });
    </script>
</x-layouts.dashboard>
