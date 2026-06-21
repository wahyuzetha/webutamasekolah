<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AchievementController extends Controller
{
    /**
     * Tampilan daftar prestasi untuk Publik
     */
    public function indexPublic()
    {
        $achievements = Achievement::latest('achievement_date')->paginate(9);
        return view('achievements.index', compact('achievements'));
    }

    /**
     * Tampilan detail prestasi untuk Publik
     */
    public function showPublic(Achievement $achievement)
    {
        $recent_achievements = Achievement::latest('achievement_date')->where('id', '!=', $achievement->id)->take(5)->get();
        return view('achievements.show', compact('achievement', 'recent_achievements'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Admin index
        $achievements = Achievement::latest('achievement_date')->paginate(10);
        return view('admin.achievements.index', compact('achievements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.achievements.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'slug' => 'required|string|max:255|unique:achievements,slug',
            'content' => 'required|string',
            'content_en' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'achievement_date' => 'nullable|date',
        ]);

        $achievement = new Achievement();
        $achievement->title = $validated['title'];
        $achievement->title_en = $validated['title_en'] ?? null;
        $achievement->slug = $validated['slug'];
        $achievement->content = $validated['content'];
        $achievement->content_en = $validated['content_en'] ?? null;
        $achievement->achievement_date = $validated['achievement_date'] ?? null;

        if ($request->hasFile('image')) {
            $achievement->image_path = $request->file('image')->store('achievements', 'public');
        }

        $achievement->save();

        return redirect()->route('admin.achievements.index')->with('success', 'Prestasi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Achievement $achievement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Achievement $achievement)
    {
        return view('admin.achievements.edit', compact('achievement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Achievement $achievement)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'slug' => 'required|string|max:255|unique:achievements,slug,' . $achievement->id,
            'content' => 'required|string',
            'content_en' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'achievement_date' => 'nullable|date',
        ]);

        $achievement->title = $validated['title'];
        $achievement->title_en = $validated['title_en'] ?? null;
        $achievement->slug = $validated['slug'];
        $achievement->content = $validated['content'];
        $achievement->content_en = $validated['content_en'] ?? null;
        $achievement->achievement_date = $validated['achievement_date'] ?? null;

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($achievement->image_path) {
                Storage::disk('public')->delete($achievement->image_path);
            }
            $achievement->image_path = $request->file('image')->store('achievements', 'public');
        }

        $achievement->save();

        return redirect()->route('admin.achievements.index')->with('success', 'Prestasi berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Achievement $achievement)
    {
        if ($achievement->image_path) {
            Storage::disk('public')->delete($achievement->image_path);
        }
        
        $achievement->delete();

        return redirect()->route('admin.achievements.index')->with('success', 'Prestasi berhasil dihapus');
    }
}
