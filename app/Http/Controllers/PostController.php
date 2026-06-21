<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Tampilan daftar berita untuk Publik
     */
    public function indexPublic()
    {
        $posts = Post::with('author')->latest()->paginate(9);
        return view('posts.index', compact('posts'));
    }

    /**
     * Tampilan detail berita untuk Publik
     */
    public function showPublic(Post $post)
    {
        $post->load('author');
        $recent_posts = Post::latest()->where('id', '!=', $post->id)->take(5)->get();
        return view('posts.show', compact('post', 'recent_posts'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Admin index
        $posts = Post::latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'slug' => 'required|string|max:255|unique:posts,slug',
            'content' => 'required|string',
            'content_en' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $post = new Post();
        $post->title = $validated['title'];
        $post->title_en = $validated['title_en'] ?? null;
        $post->slug = $validated['slug'];
        $post->content = $validated['content'];
        $post->content_en = $validated['content_en'] ?? null;
        $post->author_id = auth()->id();

        if ($request->hasFile('image')) {
            $post->image_path = $request->file('image')->store('posts', 'public');
        }

        $post->save();

        return redirect()->route('admin.posts.index')->with('success', 'Berita berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'slug' => 'required|string|max:255|unique:posts,slug,' . $post->id,
            'content' => 'required|string',
            'content_en' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $post->title = $validated['title'];
        $post->title_en = $validated['title_en'] ?? null;
        $post->slug = $validated['slug'];
        $post->content = $validated['content'];
        $post->content_en = $validated['content_en'] ?? null;

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($post->image_path) {
                Storage::disk('public')->delete($post->image_path);
            }
            $post->image_path = $request->file('image')->store('posts', 'public');
        }

        $post->save();

        return redirect()->route('admin.posts.index')->with('success', 'Berita berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->image_path) {
            Storage::disk('public')->delete($post->image_path);
        }
        
        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Berita berhasil dihapus');
    }
}
