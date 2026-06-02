<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Banner Düzenle - StatsAnaliz</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f4f6f9; }
        .content { padding: 30px; }
    </style>
</head>
<body>
<div class="content">
    <h3 class="mb-4">Banner Düzenle</h3>

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
            <form action="{{ route('yonetim.banners.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="text-center mb-4 bg-light p-3 rounded">
                    <p class="font-weight-bold mb-2">Mevcut Görsel</p>
                    <img src="{{ asset($banner->image_path) }}" alt="Current Banner" style="max-height: 200px; border-radius: 8px;">
                </div>

                <div class="form-group mb-3">
                    <label class="font-weight-bold">Görseli Değiştir (İsteğe Bağlı)</label>
                    <input type="file" name="image" class="form-control-file" accept="image/*">
                    <small class="text-muted d-block mt-1">Eğer yeni resim seçmezseniz mevcut olan kalır.</small>
                </div>

                <div class="form-group mb-3">
                    <label class="font-weight-bold">Açıklama / Alt Metin</label>
                    <input type="text" name="alt_text" class="form-control" value="{{ $banner->alt_text }}">
                </div>

                <div class="form-group mb-4">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="isActiveSwitch" name="is_active" value="1" {{ $banner->is_active ? 'checked' : '' }}>
                        <label class="custom-control-label font-weight-bold" for="isActiveSwitch">Sitede Göster (Aktif)</label>
                    </div>
                    <small class="text-muted d-block mt-1">Kapatırsanız resmi silmeden siteden gizleyebilirsiniz.</small>
                </div>

                <button type="submit" class="btn btn-primary">Değişiklikleri Kaydet</button>
                <a href="{{ route('yonetim.banners.index') }}" class="btn btn-secondary">İptal</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
