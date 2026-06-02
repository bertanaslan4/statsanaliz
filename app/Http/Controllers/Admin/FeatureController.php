<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    // LİSTELEME SAYFASI
    public function index()
    {
        $features = Feature::orderBy('id', 'desc')->get();
        return view('admin.features.index', compact('features'));
    }

    // EKLEME SAYFASI
    public function create()
    {
        return view('admin.features.create');
    }

    // VERİTABANINA KAYDETME
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:features,name',
        ]);

        Feature::create([
            'name' => $request->name
        ]);

        return redirect()->route('yonetim.features.index')->with('success', 'Maç özelliği başarıyla eklendi.');
    }

    // SİLME İŞLEMİ
    public function destroy(Feature $feature)
    {
        $feature->delete();
        return redirect()->route('yonetim.features.index')->with('success', 'Özellik başarıyla silindi.');
    }
}
