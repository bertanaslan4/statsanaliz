<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PredictionController extends Controller
{
    // Ortak verileri hazırlayan yardımcı metot
    private function prepareData($category, $title)
    {
        // Maçları, onlara bağlı özellikler (features) ile birlikte getir
        $games = Game::with('features')->where('category', $category)->orderBy('match_time', 'asc')->get();

        // Kullanıcı giriş yapmışsa, favoriye aldığı maçların ID'lerini bir dizi olarak al
        $favorites = Auth::check() ? Auth::user()->games()->pluck('games.id')->toArray() : [];

        return view('predictions.index', compact('games', 'title', 'favorites'));
    }

    public function football()
    {
        return $this->prepareData('football', 'Futbol Liste Analizleri');
    }

    public function basketball()
    {
        return $this->prepareData('basketball', 'Basketbol Liste Analizleri');
    }

    public function volleyball()
    {
        return $this->prepareData('volleyball', 'Voleybol Liste Analizleri');
    }

    // Favorilere Ekle/Çıkar (AJAX İsteği İçin)
    public function toggleFavorite(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['status' => 'error', 'message' => 'Giriş yapmalısınız.'], 401);
        }

        $user = Auth::user();
        $gameId = $request->game_id;

        // toggle() metodu maç favorilerdeyse çıkarır, değilse ekler
        $user->games()->toggle($gameId);

        return response()->json(['status' => 'success']);
    }
    // Favorilerim Sayfası
    public function favorites()
    {
        // Sadece giriş yapmış kullanıcının favoriye eklediği maçları, özellikleri ile birlikte getir
        $games = Auth::user()->games()->with('features')->orderBy('match_time', 'asc')->get();

        // Sayfa başlığı
        $title = "Favori Karşılaşmalarım";

        // Gelen maçların hepsi zaten kullanıcının favorisi olduğu için ID'lerini diziye çeviriyoruz (Checkboxlar tikli gelsin diye)
        $favorites = $games->pluck('id')->toArray();

        // Herhangi bir yeni blade dosyası oluşturmadan, mevcut tabloyu kullanıyoruz!
        return view('predictions.index', compact('games', 'title', 'favorites'));
    }
}
