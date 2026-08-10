@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Kullanıcıyı Düzenle: {{ $user->name }}</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('yonetim.users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Ad Soyad</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="email">E-posta Adresi</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="is_admin">Kullanıcı Rolü</label>
                            <select name="is_admin" id="is_admin" class="form-control" required>
                                <option value="0" {{ !$user->is_admin ? 'selected' : '' }}>Üye</option>
                                <option value="1" {{ $user->is_admin ? 'selected' : '' }}>Yönetici</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="premium_days">VIP Süresi Ekle (Gün)</label>
                            <input type="number" name="premium_days" id="premium_days" class="form-control" min="0" placeholder="Örn: 365 (1 yıl için)">
                            <small class="form-text text-muted">
                                Mevcut VIP durumu:
                                @if($user->hasActivePremium())
                                    <strong class="text-success">Aktif (Bitiş: {{ $user->premium_ends_at->format('d.m.Y') }})</strong>
                                @else
                                    <strong class="text-danger">Aktif Değil</strong>
                                @endif
                                <br>
                                Buraya bir değer girerseniz, kullanıcının VIP süresi bugünden itibaren o kadar gün uzatılır. VIP'liği kaldırmak için 0 girin.
                            </small>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Güncelle</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
