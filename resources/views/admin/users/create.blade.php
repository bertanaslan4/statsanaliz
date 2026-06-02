<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yeni Kullanıcı Ekle - StatsAnaliz</title>
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
            <a href="{{ route('dashboard') }}"><i class="fa fa-arrow-left mr-2"></i> Siteye Dön</a>
        </div>

        <div class="content-wrapper p-0">
            <nav class="navbar navbar-expand navbar-light d-flex justify-content-between">
                <span class="navbar-brand mb-0 h2 font-weight-bold">Yeni Kullanıcı Ekle</span>
                <div>
                    <span class="mr-3 font-weight-bold">{{ Auth::user()->name ?? 'Yönetici' }}</span>
                </div>
            </nav>

            <div class="content">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <form action="{{ route('yonetim.users.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>İsim Soyisim</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>E-Posta</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                                <div class="col-md-6 form-group mt-3">
                                    <label>Şifre</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                                <div class="col-md-6 form-group mt-3">
                                    <label>Telefon</label>
                                    <input type="text" name="phone" class="form-control">
                                </div>
                                <div class="col-md-6 form-group mt-3">
                                    <label>Yetki</label>
                                    <select name="is_admin" class="form-control" required>
                                        <option value="0">Normal Kullanıcı</option>
                                        <option value="1">Yönetici (Admin)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="btn btn-success">Kaydet</button>
                                <a href="{{ route('yonetim.index') }}" class="btn btn-secondary">İptal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
