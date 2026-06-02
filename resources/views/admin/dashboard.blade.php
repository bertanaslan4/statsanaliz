<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StatsAnaliz - Yönetim Paneli</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f4f6f9; }
        .sidebar { height: 100vh; background: #212529; color: #fff; padding-top: 20px; position: fixed; width: 16.666667%; }
        .sidebar a { color: #c2c7d0; text-decoration: none; padding: 15px 20px; display: block; transition: 0.3s; }
        .sidebar a:hover { background: #343a40; color: #fff; border-left: 4px solid #38bdf8; }
        .content-wrapper { margin-left: 16.666667%; width: 83.333333%; }
        .content { padding: 30px; }
        .navbar { background: #fff; border-bottom: 1px solid #dee2e6; padding: 15px 30px; }
        .stat-card { border-radius: 10px; border: none; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
    </style>
</head>
<body>
<div class="container-fluid p-0">
    <div class="row m-0">

        <div class="col-md-2 p-0 sidebar">
            <h4 class="text-center mb-5" style="color: #38bdf8; font-weight: bold;">StatsAnaliz</h4>
            <a href="{{ route('yonetim.index') }}"><i class="fa fa-dashboard mr-2"></i> Dashboard</a>
            <a href="{{ route('yonetim.users.index') }}"><i class="fa fa-users mr-2"></i> Kullanıcılar</a>
            <a href="{{ route('yonetim.games.index') }}" class="active"><i class="fa fa-futbol-o mr-2"></i> Tahminler</a>
            <a href="{{ route('yonetim.banners.index') }}">Slider</a>
            <a href="{{ route('yonetim.settings.edit') }}">Ayarlar</a>
            <a href="{{ route('dashboard') }}"><i class="fa fa-arrow-left mr-2"></i> Siteye Dön</a>
        </div>

        <div class="content-wrapper p-0">
            <nav class="navbar navbar-expand navbar-light d-flex justify-content-between">
                <span class="navbar-brand mb-0 h2 font-weight-bold">Yönetim Özeti</span>
                <div>
                    <span class="mr-3 font-weight-bold">{{ Auth::user()->name ?? 'Yönetici' }}</span>
                </div>
            </nav>
            <div class="card-header bg-white font-weight-bold d-flex justify-content-between align-items-center">
                <div><i class="fa fa-list"></i> Sistemdeki Kullanıcılar</div>
                <a href="{{ route('yonetim.users.create') }}" class="btn btn-sm btn-primary">
                    <i class="fa fa-plus"></i> Yeni Kullanıcı Ekle
                </a>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card text-white bg-dark stat-card mb-4">
                            <div class="card-body">
                                <h5 class="card-title text-muted">Toplam Üye</h5>
                                <p class="card-text display-4">124</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white bg-primary stat-card mb-4">
                            <div class="card-body">
                                <h5 class="card-title text-light">Aktif Tahminler</h5>
                                <p class="card-text display-4">38</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white bg-success stat-card mb-4">
                            <div class="card-body">
                                <h5 class="card-title text-light">Başarı Oranı</h5>
                                <p class="card-text display-4">%82</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</body>
</html>
