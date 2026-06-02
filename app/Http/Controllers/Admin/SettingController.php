<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function edit()
    {
        // İlk satırı getir, yoksa id'si 1 olan boş bir satır oluştur
        $setting = Setting::firstOrCreate(['id' => 1]);
        return view('admin.settings.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'analyzed_matches' => 'required|integer',
            'success_rate' => 'required|integer|max:100',
            'live_notification' => 'required|string|max:50',
        ]);

        $setting = Setting::firstOrCreate(['id' => 1]);
        $setting->update($request->all());

        return back()->with('success', 'İstatistik ayarları başarıyla güncellendi.');
    }
}
