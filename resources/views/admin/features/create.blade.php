<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Yeni Özellik Ekle - StatsAnaliz</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f4f6f9; }
        .content { padding: 30px; }
    </style>
</head>
<body>
<div class="content">
    <h3 class="mb-4">Yeni Maç Özelliği Ekle</h3>

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
            <form action="{{ route('yonetim.features.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label class="font-weight-bold">Özellik Adı</label>
                    <input type="text" name="name" class="form-control" placeholder="Örn: Karşılıklı Gol Oranı, Kırmızı Kart İhtimali" required autofocus>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-success">Kaydet</button>
                    <a href="{{ route('yonetim.features.index') }}" class="btn btn-secondary">İptal</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
