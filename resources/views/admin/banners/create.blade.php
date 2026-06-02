<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Yeni Banner Ekle - StatsAnaliz</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f4f6f9; }
        .content { padding: 30px; }
    </style>
</head>
<body>
<div class="content">
    <h3 class="mb-4">Yeni Banner (Afiş) Ekle</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm" style="max-width: 600px;">
        <div class="card-body">
            <form action="{{ route('yonetim.banners.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group mb-3">
                    <label class="font-weight-bold">Banner Görseli Seçin *</label>
                    <input type="file" name="image" class="form-control-file" accept="image/*" required>
                    <small class="text-muted d-block mt-1">Önerilen boyut: 1920x1080 (Maks 5MB)</small>
                </div>

                <div class="form-group mb-4">
                    <label class="font-weight-bold">Açıklama / Alt Metin</label>
                    <input type="text" name="alt_text" class="form-control" placeholder="Örn: Hafta Sonu Fırsatı, VIP Analizler...">
                </div>

                <button type="submit" class="btn btn-success">Yükle ve Kaydet</button>
                <a href="{{ route('yonetim.banners.index') }}" class="btn btn-secondary">İptal</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
