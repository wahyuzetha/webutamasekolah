<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::latest()->get();
        return view('admin.teachers.index', compact('teachers'));
    }

    public function create()
    {
        return view('admin.teachers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'position_en' => 'nullable|string|max:255',
            'nuptk' => 'nullable|string|max:255',
            'nip' => 'nullable|string|max:255',
            'tempat_lahir' => 'nullable|string|max:255',
            'agama' => 'nullable|string|max:255',
            'jenis_kelamin' => 'nullable|string|max:255',
            'status_pegawai' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'alamat' => 'nullable|string',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'image' => 'nullable|image|max:2048',
        ]);

        unset($validated['image']);
        $teacher = new Teacher($validated);

        if ($request->hasFile('image')) {
            $teacher->image_path = $request->file('image')->store('teachers', 'public');
        }

        $teacher->save();

        return redirect()->route('admin.teachers.index')->with('success', 'Data Guru berhasil ditambahkan');
    }

    public function edit(Teacher $teacher)
    {
        return view('admin.teachers.edit', compact('teacher'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'position_en' => 'nullable|string|max:255',
            'nuptk' => 'nullable|string|max:255',
            'nip' => 'nullable|string|max:255',
            'tempat_lahir' => 'nullable|string|max:255',
            'agama' => 'nullable|string|max:255',
            'jenis_kelamin' => 'nullable|string|max:255',
            'status_pegawai' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'alamat' => 'nullable|string',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'image' => 'nullable|image|max:2048',
        ]);

        unset($validated['image']);
        $teacher->fill($validated);

        if ($request->hasFile('image')) {
            if ($teacher->image_path) {
                Storage::disk('public')->delete($teacher->image_path);
            }
            $teacher->image_path = $request->file('image')->store('teachers', 'public');
        }

        $teacher->save();

        return redirect()->route('admin.teachers.index')->with('success', 'Data Guru berhasil diupdate');
    }

    public function destroy(Teacher $teacher)
    {
        if ($teacher->image_path) {
            Storage::disk('public')->delete($teacher->image_path);
        }
        
        $teacher->delete();

        return redirect()->route('admin.teachers.index')->with('success', 'Data Guru berhasil dihapus');
    }
}
