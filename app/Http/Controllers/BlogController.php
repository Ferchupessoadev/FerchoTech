<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::query()
        ->when($request->filled('search'), function ($query) use ($request) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        })
        ->when($request->filled('category'), function ($query) use ($request) {
            $query->whereHas('category', fn($q) => $q->where('slug', $request->category));
        })
        ->latest()
        ->paginate(9)
        ->withQueryString();

        $categories = Category::all();

        return view('blog.index', compact('posts', 'categories'));
    }

    public function show(Post $post)
    {
        $comments = $post->comments();
        return view('blog.show', compact('post', 'comments'));
    }

    public function search(Request $request)
    {
        return Post::with('category')
            ->when($request->q, function ($query, $q) {
                $query->where('title', 'like', "%{$q}%")
                      ->orWhere('description', 'like', "%{$q}%");
            })
            ->latest()
            ->limit(20)
            ->get();
    }
}
