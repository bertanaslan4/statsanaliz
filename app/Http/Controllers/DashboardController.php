<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner; // Banner modelini dahil ettik
use App\Models\Game;   // İleride tahminleri de çekmek isterseniz diye ekledik

class DashboardController extends Controller
{
    public function index()
    {
        // Sadece aktif olan bannerları veritabanından çek
        $banners = Banner::where('is_active', true)->orderBy('created_at', 'desc')->get();

        // Dashboard görünümüne banner verilerini gönder
        return view('dashboard', compact('banners'));
    }
}
