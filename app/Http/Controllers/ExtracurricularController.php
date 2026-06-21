<?php

namespace App\Http\Controllers;

use App\Models\Extracurricular;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExtracurricularController extends Controller
{
    public function showPublic(Extracurricular $extracurricular)
    {
        return view('extracurriculars.show', compact('extracurricular'));
    }

    public function index()
    {
        $extracurriculars = Extracurricular::latest()->get();
        return view('admin.extracurriculars.index', compact('extracurriculars'));
    }

    public function create()
    {
        return view('admin.extracurriculars.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'slug' => 'required|string|max:255|unique:extracurriculars,slug',
            'description' => 'nullable|string',
            'description_en' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        unset($validated['image']);
        $extracurricular = new Extracurricular($validated);

        if ($request->hasFile('image')) {
            $extracurricular->image_path = $request->file('image')->store('extracurriculars', 'public');
        }

        $extracurricular->save();

        return redirect()->route('admin.extracurriculars.index')->with('success', 'Ekstrakurikuler berhasil ditambahkan');
    }

    public function edit(Extracurricular $extracurricular)
    {
        return view('admin.extracurriculars.edit', compact('extracurricular'));
    }

    public function update(Request $request, Extracurricular $extracurricular)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'slug' => 'required|string|max:255|unique:extracurriculars,slug,' . $extracurricular->id,
            'description' => 'nullable|string',
            'description_en' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        unset($validated['image']);
        $extracurricular->fill($validated);

        if ($request->hasFile('image')) {
            if ($extracurricular->image_path) {
                Storage::disk('public')->delete($extracurricular->image_path);
            }
            $extracurricular->image_path = $request->file('image')->store('extracurriculars', 'public');
        }

        $extracurricular->save();

        return redirect()->route('admin.extracurriculars.index')->with('success', 'Ekstrakurikuler berhasil diupdate');
    }

    public function destroy(Extracurricular $extracurricular)
    {
        if ($extracurricular->image_path) {
            Storage::disk('public')->delete($extracurricular->image_path);
        }
        
        $extracurricular->delete();

        return redirect()->route('admin.extracurriculars.index')->with('success', 'Ekstrakurikuler berhasil dihapus');
    }
}
