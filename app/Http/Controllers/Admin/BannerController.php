<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    // Banner Listeleme
    public function index()
    {
        $banners = Banner::orderBy('created_at', 'desc')->get();
        return view('admin.banners.index', compact('banners'));
    }

    // Yeni Banner Ekleme Sayfası
    public function create()
    {
        return view('admin.banners.create');
    }

    // Yeni Banner Kaydetme
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'alt_text' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . \Illuminate\Support\Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('uploads'), $filename);

            Banner::create([
                'image_path' => 'uploads/' . $filename,
                'alt_text' => $request->alt_text,
                'is_active' => true,
            ]);

            return redirect()->route('yonetim.banners.index')->with('success', 'Banner başarıyla eklendi.');
        }

        return back()->withErrors(['image' => 'Resim yüklenirken bir sorun oluştu.']);
    }

    // Banner Düzenleme Sayfası
    public function edit(Banner $banner)
    {
        return view('admin.banners.edit', compact('banner'));
    }

    // Banner Güncelleme
    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'alt_text' => 'nullable|string|max:255',
        ]);

        $data = [
            'alt_text' => $request->alt_text,
            'is_active' => $request->has('is_active') ? true : false,
        ];

        // Eğer yeni resim yüklendiyse eski resmi sil ve yenisini kaydet
        if ($request->hasFile('image')) {
            $oldImagePath = public_path($banner->image_path);
            if (File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }

            $file = $request->file('image');
            $filename = time() . '_' . \Illuminate\Support\Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);

            $data['image_path'] = 'uploads/' . $filename;
        }

        $banner->update($data);

        return redirect()->route('yonetim.banners.index')->with('success', 'Banner başarıyla güncellendi.');
    }

    // Banner Silme
    public function destroy(Banner $banner)
    {
        $imagePath = public_path($banner->image_path);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }

        $banner->delete();

        return redirect()->route('yonetim.banners.index')->with('success', 'Banner başarıyla silindi.');
    }
}
