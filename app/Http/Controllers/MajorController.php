<?php

namespace App\Http\Controllers;

use App\Models\Major;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MajorController extends Controller
{
    public function showPublic(Major $major)
    {
        return view('majors.show', compact('major'));
    }

    public function index()
    {
        $majors = Major::latest()->get();
        return view('admin.majors.index', compact('majors'));
    }

    public function create()
    {
        return view('admin.majors.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'slug' => 'required|string|max:255|unique:majors,slug',
            'description' => 'required|string',
            'description_en' => 'nullable|string',
            'icon' => 'nullable|string|max:100',
            'image' => 'nullable|image|max:2048',
        ]);

        unset($validated['image']);
        $major = new Major($validated);

        if ($request->hasFile('image')) {
            $major->image_path = $request->file('image')->store('majors', 'public');
        }

        $major->save();

        return redirect()->route('admin.majors.index')->with('success', 'Jurusan berhasil ditambahkan');
    }

    public function edit(Major $major)
    {
        return view('admin.majors.edit', compact('major'));
    }

    public function update(Request $request, Major $major)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'slug' => 'required|string|max:255|unique:majors,slug,' . $major->id,
            'description' => 'required|string',
            'description_en' => 'nullable|string',
            'icon' => 'nullable|string|max:100',
            'image' => 'nullable|image|max:2048',
        ]);

        unset($validated['image']);
        $major->fill($validated);

        if ($request->hasFile('image')) {
            if ($major->image_path) {
                Storage::disk('public')->delete($major->image_path);
            }
            $major->image_path = $request->file('image')->store('majors', 'public');
        }

        $major->save();

        return redirect()->route('admin.majors.index')->with('success', 'Jurusan berhasil diupdate');
    }

    public function destroy(Major $major)
    {
        if ($major->image_path) {
            Storage::disk('public')->delete($major->image_path);
        }
        
        $major->delete();

        return redirect()->route('admin.majors.index')->with('success', 'Jurusan berhasil dihapus');
    }
}
