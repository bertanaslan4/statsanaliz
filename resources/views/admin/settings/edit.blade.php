<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Site Ayarları - StatsAnaliz</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f4f6f9; }
        .content { padding: 30px; }
    </style>
</head>
<body>
<div class="content">
    <h3 class="mb-4">İstatistik ve Site Ayarları</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm" style="max-width: 600px;">
        <div class="card-body">
            <form action="{{ route('yonetim.settings.update') }}" method="POST">
                @csrf

                <div class="form-group mb-3">
                    <label class="font-weight-bold">Analiz Edilen Maç Sayısı</label>
                    <input type="number" name="analyzed_matches" class="form-control" value="{{ $setting->analyzed_matches }}" required>
                    <small class="text-muted">Örn: 1250 (Sadece sayı girin, + işareti sitede otomatik eklenir)</small>
                </div>

                <div class="form-group mb-3">
                    <label class="font-weight-bold">Başarı Oranı Yüzdesi</label>
                    <input type="number" name="success_rate" class="form-control" value="{{ $setting->success_rate }}" max="100" required>
                    <small class="text-muted">Örn: 85 (Sadece sayı girin, % işareti sitede otomatik eklenir)</small>
                </div>

                <div class="form-group mb-4">
                    <label class="font-weight-bold">Canlı Bildirim Metni</label>
                    <input type="text" name="live_notification" class="form-control" value="{{ $setting->live_notification }}" required>
                    <small class="text-muted">Örn: 24 (Yanında /7 yazısı sabittir)</small>
                </div>

                <button type="submit" class="btn btn-primary">Ayarları Kaydet</button>
                <a href="{{ route('yonetim.index') ?? '#' }}" class="btn btn-secondary">Geri Dön</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
