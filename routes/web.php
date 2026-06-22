<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\GameController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\PredictionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\DashboardController as UserDashboardController;
use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\Admin\FeatureController;
Route::get('/', function () {

    $banners = \App\Models\Banner::where('is_active', true)->orderBy('created_at', 'desc')->get();


    $setting = \App\Models\Setting::first();

    return view('welcome', compact('banners', 'setting'));
})->name('welcome');
Route::view('/gizlilik-politikasi', 'pages.privacy')->name('privacy');
Route::view('/kullanim-kosullari', 'pages.terms')->name('terms');

Route::middleware(['auth', IsAdmin::class])->prefix('yonetim')->name('yonetim.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    Route::get('/kullanicilar', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index'); // Yeni Eklenen
    Route::get('/kullanicilar/olustur', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('users.create');
    Route::post('/kullanicilar', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('users.store');
    Route::get('/ayarlar', [SettingController::class, 'edit'])->name('settings.edit');
    Route::post('/ayarlar', [SettingController::class, 'update'])->name('settings.update');
    Route::resource('tahminler', GameController::class)->parameters([
        'tahminler' => 'game'
    ])->names([
        'index' => 'games.index',
        'create' => 'games.create',
        'store' => 'games.store',
        'edit' => 'games.edit',
        'update' => 'games.update',
        'destroy' => 'games.destroy',
    ]);
    Route::resource('ozellikler', FeatureController::class)->except(['show', 'edit', 'update'])->parameters([
        'ozellikler' => 'feature'
    ])->names([
        'index' => 'features.index',
        'create' => 'features.create',
        'store' => 'features.store',
        'destroy' => 'features.destroy',
    ]);
    Route::resource('bannerlar', \App\Http\Controllers\Admin\BannerController::class)->parameters([
        'bannerlar' => 'banner'
    ])->names('banners');
});
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');

    Route::get('/futbol-tahminleri', [PredictionController::class, 'football'])->name('predictions.football');
    Route::get('/basketbol-tahminleri', [PredictionController::class, 'basketball'])->name('predictions.basketball');
    Route::get('/voleybol-tahminleri', [PredictionController::class, 'volleyball'])->name('predictions.volleyball');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/favori-toggle', [App\Http\Controllers\PredictionController::class, 'toggleFavorite'])->name('favorites.toggle');
    Route::get('/favorilerim', [App\Http\Controllers\PredictionController::class, 'favorites'])->name('favorites.index');
});

require __DIR__.'/auth.php';
