<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key')->toArray();
        return view('admin.settings.index', compact('settings'));
    }

    public function sejarah()
    {
        $settings = Setting::all()->pluck('value', 'key')->toArray();
        return view('admin.settings.sejarah', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->except(['_token', '_method', 'about_image', 'footer_logo']);

        if ($request->hasFile('about_image')) {
            $path = $request->file('about_image')->store('settings', 'public');
            $data['about_image_path'] = $path;
        }

        if ($request->hasFile('footer_logo')) {
            $path = $request->file('footer_logo')->store('settings', 'public');
            $data['footer_logo_path'] = $path;
        }

        foreach ($data as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        return redirect()->back()->with('success', 'Pengaturan berhasil disimpan');
    }
}
