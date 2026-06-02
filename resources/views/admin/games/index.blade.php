<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tahminler - StatsAnaliz</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css" rel="stylesheet">
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
            <a href="{{ route('yonetim.games.index') }}" class="active"><i class="fa fa-futbol-o mr-2"></i> Tahminler</a>
            <a href="{{ route('dashboard') }}"><i class="fa fa-arrow-left mr-2"></i> Siteye Dön</a>
        </div>

        <div class="content-wrapper p-0">
            <nav class="navbar navbar-expand navbar-light d-flex justify-content-between">
                <span class="navbar-brand mb-0 h2 font-weight-bold">Tahmin Yönetimi</span>
            </nav>

            <div class="content">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="card shadow-sm">
                    <div class="card-header bg-white font-weight-bold d-flex justify-content-between align-items-center">
                        <div><i class="fa fa-futbol-o"></i> Tüm Maçlar / Tahminler</div>
                        <a href="{{ route('yonetim.features.index') }}" class="btn btn-sm btn-primary">
                            <i class="fa fa-plus"></i> Özellikler
                        </a>
                        <a href="{{ route('yonetim.games.create') }}" class="btn btn-sm btn-primary">
                            <i class="fa fa-plus"></i> Yeni Tahmin Ekle
                        </a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped w-100" id="games-table">
                            <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Karşılaşma (Takımlar)</th>
                                <th>Maç Saati</th>
                                <th>İY 0.5 Üst %</th>
                                <th>Kombo %</th>
                                <th>Durum</th>
                                <th width="120px">İşlemler</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(function () {
        $('#games-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('yonetim.games.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'teams', name: 'teams'},
                {data: 'match_time', name: 'match_time'},
                {data: 'iy_05_ust_percent', name: 'iy_05_ust_percent'},
                {data: 'combo_probability_percent', name: 'combo_probability_percent'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            language: { url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/tr.json" }
        });
    });
</script>
</body>
</html>
