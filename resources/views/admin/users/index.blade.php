<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Kullanıcılar - StatsAnaliz</title>

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
        .dataTables_wrapper .dataTables_paginate .paginate_button { padding: 0 !important; margin: 0 !important; border: none !important; }
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
                <span class="navbar-brand mb-0 h2 font-weight-bold">Kullanıcı Yönetimi</span>
                <div>
                    <span class="mr-3 font-weight-bold">{{ Auth::user()->name ?? 'Yönetici' }}</span>
                </div>
            </nav>

            <div class="content">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="card shadow-sm">
                    <div class="card-header bg-white font-weight-bold d-flex justify-content-between align-items-center">
                        <div><i class="fa fa-users"></i> Tüm Kullanıcılar</div>
                        <a href="{{ route('yonetim.users.create') }}" class="btn btn-sm btn-primary">
                            <i class="fa fa-plus"></i> Yeni Kullanıcı Ekle
                        </a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped w-100" id="users-table">
                            <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>İsim Soyisim</th>
                                <th>E-Posta</th>
                                <th>Yetki</th>
                                <th>Kayıt Tarihi</th>
                                <th width="100px">İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
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

<script type="text/javascript">
    $(function () {
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });

        var table = $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('yonetim.users.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'is_admin', name: 'is_admin'},
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/tr.json"
            }
        });
    });
</script>
</body>
</html>
