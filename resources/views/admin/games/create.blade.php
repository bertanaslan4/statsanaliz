<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Yeni Tahmin Ekle</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f4f6f9; }
        .content { padding: 30px; }
    </style>
</head>
<body>
<div class="content">
    <h3 class="mb-4">Yeni Tahmin Ekle</h3>
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('yonetim.games.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-12 form-group mb-3">
                        <label class="font-weight-bold text-primary">Kategori (Spor Dalı)</label>
                        <select name="category" class="form-control" required>
                            <option value="football">Futbol ⚽</option>
                            <option value="basketball">Basketbol 🏀</option>
                            <option value="volleyball">Voleybol 🏐</option>
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Takımlar (Örn: Xamax - Yverdon)</label>
                        <input type="text" name="teams" class="form-control" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Maç Tarihi ve Saati</label>
                        <input type="datetime-local" name="match_time" class="form-control" required>
                    </div>
                    <div class="col-md-6 form-group mt-3">
                        <label>İY 0.5 Üst Yüzdesi (%)</label>
                        <input type="number" name="iy_05_ust_percent" class="form-control">
                    </div>
                    <div class="col-md-6 form-group mt-3">
                        <label>Kombo Olasılık Yüzdesi (%)</label>
                        <input type="number" name="combo_probability_percent" class="form-control">
                    </div>
                    <div class="col-md-6 form-group mt-3">
                        <label>Durum</label>
                        <select name="status" class="form-control" required>
                            <option value="pending">Bekliyor (Henüz Başlamadı)</option>
                            <option value="started">Başladı (Canlı)</option>
                            <option value="finished">Bitti</option>
                        </select>
                    </div>

                    <div class="col-md-12 mt-5">
                        <h5 class="border-bottom pb-2 text-primary"><i class="fa fa-tags"></i> Maç Özellikleri ve Yorumlar</h5>
                    </div>

                    @foreach($features as $feature)
                        <div class="col-md-6 mt-3">
                            <div class="card bg-light border-0 shadow-sm">
                                <div class="card-body p-3">
                                    <div class="form-check font-weight-bold mb-2">
                                        <input class="form-check-input" type="checkbox" name="features[{{ $feature->id }}][selected]" value="1" id="feature_{{ $feature->id }}">
                                        <label class="form-check-label text-dark" for="feature_{{ $feature->id }}">
                                            {{ $feature->name }}
                                        </label>
                                    </div>
                                    <input type="text" name="features[{{ $feature->id }}][comment]" class="form-control form-control-sm" placeholder="Yorum / Analiz girin...">
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-success">Kaydet</button>
                    <a href="{{ route('yonetim.games.index') }}" class="btn btn-secondary">İptal</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
