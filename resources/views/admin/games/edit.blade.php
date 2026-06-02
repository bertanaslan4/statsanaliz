<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Tahmin Düzenle - StatsAnaliz</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f4f6f9; }
        .content { padding: 30px; }
        .form-check-label { font-weight: 600; cursor: pointer; }
    </style>
</head>
<body>
<div class="content">
    <h3 class="mb-4">Tahmin Düzenle: <span class="text-primary">{{ $game->teams }}</span></h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('yonetim.games.update', $game->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-12 form-group mb-3">
                        <label class="font-weight-bold text-primary">Kategori (Spor Dalı)</label>
                        <select name="category" class="form-control" required>
                            <option value="football" {{ $game->category == 'football' ? 'selected' : '' }}>Futbol ⚽</option>
                            <option value="basketball" {{ $game->category == 'basketball' ? 'selected' : '' }}>Basketbol 🏀</option>
                            <option value="volleyball" {{ $game->category == 'volleyball' ? 'selected' : '' }}>Voleybol 🏐</option>
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Takımlar</label>
                        <input type="text" name="teams" class="form-control" value="{{ old('teams', $game->teams) }}" required>
                    </div>

                    <div class="col-md-6 form-group">
                        <label>Maç Tarihi ve Saati</label>
                        <input type="datetime-local" name="match_time" class="form-control" value="{{ old('match_time', \Carbon\Carbon::parse($game->match_time)->format('Y-m-d\TH:i')) }}" required>
                    </div>

                    <div class="col-md-6 form-group mt-3">
                        <label>İY 0.5 Üst Yüzdesi (%)</label>
                        <input type="number" name="iy_05_ust_percent" class="form-control" value="{{ old('iy_05_ust_percent', $game->iy_05_ust_percent) }}">
                    </div>
                    <div class="col-md-6 form-group mt-3">
                        <label>Kombo Olasılık Yüzdesi (%)</label>
                        <input type="number" name="combo_probability_percent" class="form-control" value="{{ old('combo_probability_percent', $game->combo_probability_percent) }}">
                    </div>

                    <div class="col-md-6 form-group mt-3">
                        <label>Durum</label>
                        <select name="status" class="form-control" required>
                            <option value="pending" {{ $game->status == 'pending' ? 'selected' : '' }}>Bekliyor</option>
                            <option value="started" {{ $game->status == 'started' ? 'selected' : '' }}>Başladı</option>
                            <option value="finished" {{ $game->status == 'finished' ? 'selected' : '' }}>Bitti</option>
                        </select>
                    </div>

                    <div class="col-md-6 form-group mt-3">
                        <label class="d-block mb-2">Genel Maç Sonuçları</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="iy_05_ust_result" id="iy_05_ust_result" value="1" {{ $game->iy_05_ust_result ? 'checked' : '' }}>
                            <label class="form-check-label text-success" for="iy_05_ust_result">İY 0.5 Üst Geldi</label>
                        </div>
                        <div class="form-check form-check-inline ml-3">
                            <input class="form-check-input" type="checkbox" name="ms_15_ust_result" id="ms_15_ust_result" value="1" {{ $game->ms_15_ust_result ? 'checked' : '' }}>
                            <label class="form-check-label text-success" for="ms_15_ust_result">MS 1.5 Üst Geldi</label>
                        </div>
                    </div>

                    <div class="col-md-12 mt-5">
                        <h5 class="border-bottom pb-2 text-primary"><i class="fa fa-tags"></i> Dinamik Maç Özellikleri, Yorumlar ve Sonuçlar</h5>
                    </div>

                    @foreach($features as $feature)
                        @php
                            $hasFeature = $game->features->contains($feature->id);
                            $pivot = $hasFeature ? $game->features->where('id', $feature->id)->first()->pivot : null;
                        @endphp
                        <div class="col-md-6 mt-3">
                            <div class="card {{ $hasFeature ? 'border-primary' : 'bg-light border-0' }} shadow-sm">
                                <div class="card-body p-3">
                                    <div class="form-check font-weight-bold mb-2">
                                        <input class="form-check-input" type="checkbox" name="features[{{ $feature->id }}][selected]" value="1" id="feature_{{ $feature->id }}" {{ $hasFeature ? 'checked' : '' }}>
                                        <label class="form-check-label {{ $hasFeature ? 'text-primary' : 'text-dark' }}" for="feature_{{ $feature->id }}">
                                            {{ $feature->name }}
                                        </label>
                                    </div>
                                    <input type="text" name="features[{{ $feature->id }}][comment]" class="form-control form-control-sm mb-2" value="{{ $pivot->comment ?? '' }}" placeholder="Yorum / Analiz girin...">

                                    <select name="features[{{ $feature->id }}][is_successful]" class="form-control form-control-sm">
                                        <option value="">⏳ Sonuç Bekleniyor</option>
                                        <option value="1" {{ isset($pivot->is_successful) && $pivot->is_successful === 1 ? 'selected' : '' }}>✅ Tuttu (+)</option>
                                        <option value="0" {{ isset($pivot->is_successful) && $pivot->is_successful === 0 ? 'selected' : '' }}>❌ Tutmadı (-)</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Değişiklikleri Kaydet</button>
                    <a href="{{ route('yonetim.games.index') }}" class="btn btn-secondary">İptal ve Geri Dön</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
