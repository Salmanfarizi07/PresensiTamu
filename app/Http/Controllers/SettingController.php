<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    // Halaman form edit
    public function edit()
    {
        $settings = Setting::pluck('value', 'key')->toArray();
        return view('setting', compact('settings'));
    }

    // Proses update data
    public function update(Request $request)
    {
        Setting::updateOrCreate(
            ['key' => 'landing_title'],
            ['value' => $request->landing_title]
        );

        Setting::updateOrCreate(
            ['key' => 'landing_description'],
            ['value' => $request->landing_description]
        );

        return back()->with('success', 'Pengaturan berhasil diperbarui');
    }
}
