<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(7);

        return view('dashboard.blog.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::orderBy('name', 'asc')->get();

        return view('dashboard.blog.create', compact('categories'));
    }

    public function store(StorePostRequest $request)
    {
        $post = Post::create([
            'title'       => $request->title,
            'slug'        => Str::slug($request->title),
            'description' => $request->description,
            'category_id' => $request->category_id,
            'content'     => clean($request->content),
            'image_path'  => $request->file('image')?->store('blog', 'public'),
        ]);

        $this->syncEditorImages($post, $request);

        return redirect()->route('dashboard.blog.index')->with('success', 'Post creado con éxito.');
    }

    public function update(StorePostRequest $request, Post $post)
    {

        $post->update([
            'title'       => $request->title,
            'slug'        => Str::slug($request->title),
            'description' => $request->description,
            'category_id' => $request->category_id,
            'content'     => clean($request->content),
        ]);

        if ($request->hasFile('image')) {
            $post->update(['image_path' => $request->file('image')->store('blog', 'public')]);
        }

        // Limpieza: Borrar imágenes que ya no están en el HTML
        $this->cleanupRemovedImages($post, $request->content);

        // Sincronizar nuevas imágenes subidas
        $this->syncEditorImages($post, $request);

        return redirect()->route('dashboard.blog.index')->with('success', 'Post actualizado.');
    }

    private function syncEditorImages(Post $post, Request $request)
    {
        $userMedia = $request->user()->getMedia('temp_editor_images');

        if ($userMedia->isEmpty()) return;

        $content = $post->content;

        foreach ($userMedia as $media) {
            $oldUrl = route('media.preview', $media->id);
            $newMedia = $media->move($post, 'content', 'public');
            $content = str_replace($oldUrl, $newMedia->getUrl(), $content);
        }

        $post->update(['content' => clean($content)]);
    }

    private function cleanupRemovedImages(Post $post, $newContent)
    {
        foreach ($post->getMedia('content') as $media) {
            if (!str_contains($newContent, $media->getUrl())) {
                $media->delete();
            }
        }
    }

    public function edit(Post $post)
    {
        auth()->user()->clearMediaCollection('temp_editor_images');
        $categories = Category::orderBy('name', 'asc')->get();

        return view('dashboard.blog.edit', compact('post', 'categories'));
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('dashboard.blog.index')->with('success', 'Post eliminado.');
    }

    /**
     * Procesa la subida de imágenes internas desde el editor QuillJS
     */
    public function uploadEditorImage(Request $request)
    {
        $request->validate(['image' => 'required|image']);

        $media = $request->user()
            ->addMediaFromRequest('image')
            ->toMediaCollection('temp_editor_images', 'local');

        return response()->json(['url' => route('media.preview', $media->id)]);
    }
}
