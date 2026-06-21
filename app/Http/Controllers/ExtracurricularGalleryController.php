<?php

namespace App\Http\Controllers;

use App\Models\Extracurricular;
use App\Models\ExtracurricularGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExtracurricularGalleryController extends Controller
{
    public function index(Extracurricular $extracurricular)
    {
        $galleries = $extracurricular->galleries()->latest()->get();
        return view('admin.extracurriculars.gallery', compact('extracurricular', 'galleries'));
    }

    public function store(Request $request, Extracurricular $extracurricular)
    {
        $request->validate([
            'images' => 'required|array',
            'images.*' => 'required|image|max:2048',
            'caption' => 'nullable|string|max:255',
            'caption_en' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('extracurricular_galleries', 'public');
                
                $extracurricular->galleries()->create([
                    'image_path' => $path,
                    'caption' => $request->caption,
                    'caption_en' => $request->caption_en,
                ]);
            }
        }

        return back()->with('success', 'Foto galeri berhasil diunggah');
    }

    public function destroy(Extracurricular $extracurricular, ExtracurricularGallery $gallery)
    {
        if ($gallery->extracurricular_id !== $extracurricular->id) {
            abort(403);
        }

        if ($gallery->image_path) {
            Storage::disk('public')->delete($gallery->image_path);
        }

        $gallery->delete();

        return back()->with('success', 'Foto galeri berhasil dihapus');
    }
}
