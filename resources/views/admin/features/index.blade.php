<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Maç Özellikleri - StatsAnaliz</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f4f6f9; }
        .sidebar { height: 100vh; background: #212529; color: #fff; padding-top: 20px; position: fixed; width: 16.666667%; }
        .sidebar a { color: #c2c7d0; text-decoration: none; padding: 15px 20px; display: block; transition: 0.3s; }
        .sidebar a:hover, .sidebar a.active { background: #343a40; color: #fff; border-left: 4px solid #38bdf8; }
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
            <a href="{{ route('yonetim.games.index') }}"><i class="fa fa-futbol-o mr-2"></i> Tahminler</a>
            <a href="{{ route('yonetim.features.index') }}" class="active"><i class="fa fa-list mr-2"></i> Maç Özellikleri</a>
            <a href="{{ route('dashboard') }}"><i class="fa fa-arrow-left mr-2"></i> Siteye Dön</a>
        </div>

        <div class="content-wrapper p-0">
            <nav class="navbar navbar-expand navbar-light d-flex justify-content-between">
                <span class="navbar-brand mb-0 h2 font-weight-bold">Maç Özellik Yönetimi</span>
            </nav>

            <div class="content">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="card shadow-sm">
                    <div class="card-header bg-white font-weight-bold d-flex justify-content-between align-items-center">
                        <div><i class="fa fa-tags"></i> Sistemdeki Maç Özellikleri</div>
                        <a href="{{ route('yonetim.features.create') }}" class="btn btn-sm btn-primary">
                            <i class="fa fa-plus"></i> Yeni Özellik Ekle
                        </a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead class="thead-dark">
                            <tr>
                                <th width="50px">ID</th>
                                <th>Özellik Adı (Örn: İlk Yarı Sonucu, Kırmızı Kart)</th>
                                <th width="100px">İşlem</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($features as $feature)
                                <tr>
                                    <td>{{ $feature->id }}</td>
                                    <td class="font-weight-bold">{{ $feature->name }}</td>
                                    <td>
                                        <form action="{{ route('yonetim.features.destroy', $feature->id) }}" method="POST" onsubmit="return confirm('Bu özelliği silmek istediğinize emin misiniz?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Sil</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center text-muted">Henüz hiç özellik eklenmemiş.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
