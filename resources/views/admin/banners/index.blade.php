<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Banner Yönetimi - StatsAnaliz</title>
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
        .banner-thumbnail { max-width: 150px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
    </style>
</head>
<body>
<div class="container-fluid p-0">
    <div class="row m-0">
        <div class="col-md-2 p-0 sidebar">
            <h4 class="text-center mb-5" style="color: #38bdf8; font-weight: bold;">StatsAnaliz</h4>
            <a href="{{ route('yonetim.index') ?? '#' }}"><i class="fa fa-dashboard mr-2"></i> Dashboard</a>
            <a href="{{ route('yonetim.banners.index') }}" class="active"><i class="fa fa-picture-o mr-2"></i> Banner Yönetimi</a>
            <a href="{{ route('dashboard') }}"><i class="fa fa-arrow-left mr-2"></i> Siteye Dön</a>
        </div>

        <div class="content-wrapper p-0">
            <nav class="navbar navbar-expand navbar-light d-flex justify-content-between">
                <span class="navbar-brand mb-0 h2 font-weight-bold">Slider Banner Yönetimi</span>
            </nav>

            <div class="content">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="card shadow-sm">
                    <div class="card-header bg-white font-weight-bold d-flex justify-content-between align-items-center">
                        <div><i class="fa fa-list"></i> Mevcut Bannerlar</div>
                        <a href="{{ route('yonetim.banners.create') }}" class="btn btn-sm btn-primary">
                            <i class="fa fa-plus"></i> Yeni Banner Ekle
                        </a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped text-center align-middle">
                            <thead class="thead-dark">
                            <tr>
                                <th>Görsel</th>
                                <th>Alt Metin</th>
                                <th>Durum</th>
                                <th>Yüklenme Tarihi</th>
                                <th width="180px">İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($banners as $banner)
                                <tr>
                                    <td class="align-middle">
                                        <img src="{{ asset($banner->image_path) }}" class="banner-thumbnail" alt="Banner">
                                    </td>
                                    <td class="align-middle">{{ $banner->alt_text ?? '-' }}</td>
                                    <td class="align-middle">
                                        @if($banner->is_active)
                                            <span class="badge badge-success px-2 py-1">Aktif</span>
                                        @else
                                            <span class="badge badge-danger px-2 py-1">Pasif</span>
                                        @endif
                                    </td>
                                    <td class="align-middle">{{ $banner->created_at->format('d.m.Y H:i') }}</td>
                                    <td class="align-middle">
                                        <a href="{{ route('yonetim.banners.edit', $banner->id) }}" class="btn btn-sm btn-warning mb-1"><i class="fa fa-edit"></i> Düzenle</a>
                                        <form action="{{ route('yonetim.banners.destroy', $banner->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Bu bannerı silmek istediğinize emin misiniz?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger mb-1"><i class="fa fa-trash"></i> Sil</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">Sistemde kayıtlı banner bulunamadı.</td>
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
