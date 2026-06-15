<x-layouts.dashboard section="Blog" title="Crear Artículo">
    <div class="max-w-3xl mx-auto space-y-6">

        <div>
            <a href="{{ route('dashboard.blog.index') }}" class="inline-flex items-center gap-2 text-xs font-bold text-slate-400 hover:text-white transition-colors uppercase tracking-wider font-mono">
                <i data-lucide="arrow-left" class="size-4"></i> Volver al listado
            </a>
        </div>

        <div class="bg-slate-900/30 backdrop-blur-md border border-slate-900 rounded-2xl p-6 sm:p-8 shadow-2xl">
            <form id="blog-form" action="{{ route('dashboard.blog.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div class="space-y-2">
                    <label for="title" class="block text-xs font-bold uppercase tracking-wider text-slate-300">Título del Artículo</label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" required class="w-full px-4 py-3 rounded-xl bg-[#050b14]/80 border border-slate-800 text-slate-100 placeholder-slate-600 font-medium text-sm focus:outline-none focus:border-blue-500/80 focus:ring-1 focus:ring-blue-500/30 transition-all">
                    @error('title') <span class="text-xs text-red-400 font-medium block mt-1">{{ $message }}</span> @enderror
                </div>

                <div class="space-y-2">
                    <label for="description" class="block text-xs font-bold uppercase tracking-wider text-slate-300">Descripción Corta (Resumen)</label>
                    <textarea id="description" name="description" rows="2" required placeholder="Un pequeño resumen que aparecerá en las tarjetas del blog..."
                              class="w-full px-4 py-3 rounded-xl bg-[#050b14]/80 border border-slate-800 text-slate-100 placeholder-slate-600 font-medium text-sm focus:outline-none focus:border-blue-500/80 focus:ring-1 focus:ring-blue-500/30 transition-all shadow-inner resize-none">{{ old('description') }}</textarea>
                    @error('description') <span class="text-xs text-red-400 font-medium block mt-1">{{ $message }}</span> @enderror
                </div>

                <div class="space-y-2">
                    <label for="category_id" class="block text-xs font-bold uppercase tracking-wider text-slate-300">Categoría del Artículo</label>
                    <div class="relative">
                        <select id="category_id" name="category_id" required
                                class="w-full px-4 py-3 rounded-xl bg-[#050b14]/80 border border-slate-800 text-slate-100 font-medium text-sm focus:outline-none focus:border-blue-500/80 focus:ring-1 focus:ring-blue-500/30 transition-all appearance-none cursor-pointer shadow-inner">
                            <option value="" disabled selected class="text-slate-600 bg-slate-950">Seleccioná una categoría...</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }} class="bg-slate-950 text-slate-200">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <div class="absolute inset-y-0 right-4 flex items-center pointer-events-none text-slate-500">
                            <i data-lucide="chevron-down" class="size-4"></i>
                        </div>
                    </div>
                    @error('category_id') <span class="text-xs text-red-400 font-medium block mt-1">{{ $message }}</span> @enderror
                </div>

                <div class="space-y-2">
                    <label for="image" class="block text-xs font-bold uppercase tracking-wider text-slate-300">Imagen de Portada Principal</label>
                    <div class="relative w-full px-4 py-3 rounded-xl bg-[#050b14]/80 border border-slate-800 flex items-center gap-3 cursor-pointer group">
                        <input type="file" id="image" name="image" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer w-full h-full">
                        <div class="p-2 bg-slate-900 rounded-lg text-slate-400 group-hover:text-blue-400 transition-colors">
                            <i data-lucide="image" class="size-4"></i>
                        </div>
                        <span id="file-chosen" class="text-sm text-slate-500">Seleccionar portada (Max 2MB)</span>
                    </div>
                    @error('image') <span class="text-xs text-red-400 font-medium block mt-1">{{ $message }}</span> @enderror
                </div>

                <input type="hidden" id="content" name="content">

                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-300">Contenido del Artículo</label>
                    <div id="editor"></div>
                    @error('content') <span class="text-xs text-red-400 font-medium block mt-1">{{ $message }}</span> @enderror
                </div>

                <div class="pt-4 border-t border-slate-900/60 flex justify-end">
                    <button type="submit" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-500 hover:to-blue-600 text-sm font-bold rounded-xl text-white transition-all shadow-xl shadow-blue-950/50 transform hover:-translate-y-0.5 cursor-pointer">
                        <i data-lucide="save" class="size-4"></i>
                        Publicar Artículo
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('assets/quilljs/quill.min.js') }}"></script>
    <link href={{ asset('assets/quilljs/quill.snow.css')}} rel="stylesheet">
    <script src="{{ asset('assets/quilljs/image-resize.min.js')}}"></script>
    <script>
        // Inicializar el constructor de Quill con el plugin de resize inyectado
        const quill = new Quill('#editor', {
            theme: 'snow',
            placeholder: 'Comenzá a escribir o arrastrá imágenes directamente acá...',
            modules: {
                toolbar: [
                    [{ 'header': [1, 2, 3, 4] }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    ['blockquote', 'code-block'],
                    ['link', 'image'],
                    ['clean']
                ],
                imageResize: {
                    displaySize: true
                }
            }
        });
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
                } catch (error) {
                    console.error("Error al subir:", error);
                } finally {
                    input.remove();
                }
            };
            input.click();
        });

        document.getElementById('blog-form').onsubmit = function() {
            const contentInput = document.getElementById('content');
            contentInput.value = quill.root.innerHTML; // En Quill 1 se usa .root.innerHTML
            console.log("Contenido enviado:", contentInput.value);
        };
    </script>
</x-layouts.dashboard>
