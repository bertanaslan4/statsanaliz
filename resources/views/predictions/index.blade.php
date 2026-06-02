<x-app-layout>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
        <link rel="stylesheet" href="{{ asset('css/inner_style.css') }}">

        <style>
            /* VIP Sayfa ve Tablo Tasarımı */
            .predictions-main { padding: 60px 0; background: linear-gradient(135deg, #0f172a, #1e293b); min-height: 100vh; color: #f8fafc; }
            .page-title { color: #38bdf8; font-weight: 800; margin-bottom: 30px; border-bottom: 2px solid rgba(56, 189, 248, 0.2); padding-bottom: 15px; }

            /* VIP Tablo Özellikleri */
            .vip-table-wrapper { background: rgba(255, 255, 255, 0.03); border-radius: 15px; padding: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.5); border: 1px solid rgba(255,255,255,0.05); overflow-x: auto; }
            .vip-table { width: 100%; text-align: center; border-collapse: separate; border-spacing: 0 10px; }
            .vip-table th { color: #94a3b8; font-size: 0.9rem; font-weight: 600; padding: 15px 10px; border: none; white-space: nowrap; }
            .vip-table tbody tr.main-row { background: rgba(0, 0, 0, 0.2); transition: all 0.3s ease; }
            .vip-table tbody tr.main-row:hover { background: rgba(56, 189, 248, 0.1); transform: scale(1.01); }
            .vip-table td { padding: 15px 10px; vertical-align: middle; border-top: 1px solid rgba(255,255,255,0.02); border-bottom: 1px solid rgba(255,255,255,0.02); font-size: 0.95rem; }
            .vip-table td:first-child { border-left: 1px solid rgba(255,255,255,0.02); border-top-left-radius: 10px; border-bottom-left-radius: 10px; }
            .vip-table td:last-child { border-right: 1px solid rgba(255,255,255,0.02); border-top-right-radius: 10px; border-bottom-right-radius: 10px; }

            /* Özel Checkbox Tasarımı */
            .custom-checkbox { width: 20px; height: 20px; cursor: pointer; accent-color: #38bdf8; }
            .check-all-wrapper { display: flex; align-items: center; gap: 10px; margin-bottom: 15px; color: #94a3b8; font-weight: 600; cursor: pointer; }

            /* Vurgulu Yüzdeler */
            .highlight-badge { background: rgba(56, 189, 248, 0.2); color: #38bdf8; padding: 5px 12px; border-radius: 20px; font-weight: bold; font-size: 1rem; }
            /* Dinamik Yüzde Renkleri */
            .badge-green { background: rgba(34, 197, 94, 0.15) !important; color: #4ade80 !important; }
            .badge-yellow { background: rgba(234, 179, 8, 0.15) !important; color: #facc15 !important; }
            .badge-red { background: rgba(239, 68, 68, 0.15) !important; color: #f87171 !important; }
            .badge-default { background: rgba(56, 189, 248, 0.15) !important; color: #38bdf8 !important; } /* 70 altı veya boş olanlar için orijinal mavi */
            .match-name { font-weight: bold; color: #fff; letter-spacing: 0.5px; }

            /* İncele Butonu */
            .btn-incele { background: linear-gradient(135deg, #0ea5e9, #2563eb); border: none; border-radius: 20px; padding: 6px 20px; color: #fff; font-weight: 600; cursor: pointer; transition: all 0.3s ease; }
            .btn-incele:hover { box-shadow: 0 0 15px rgba(56, 189, 248, 0.6); color: #fff; }

            /* Detay Paneli (Diğer Olasılıklar) */
            .details-row { display: none; background: rgba(15, 23, 42, 0.9); }
            .details-row.show { display: table-row; animation: fadeIn 0.3s ease-in-out; }
            .details-content { padding: 25px; border-radius: 10px; border: 1px solid rgba(56, 189, 248, 0.2); text-align: left; background: #0f172a; margin: 10px 0; }
            .detail-item { display: flex; align-items: flex-start; gap: 15px; margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px dashed rgba(255,255,255,0.05); height: 100%; }
            .detail-icon { font-size: 1.5rem; color: #38bdf8; width: 30px; text-align: center; }
            .detail-text h6 { margin: 0 0 5px 0; font-size: 1rem; color: #e2e8f0; font-weight: 600; }
            .detail-text p { margin: 0; font-size: 0.85rem; color: #94a3b8; line-height: 1.5; }
            .result-checkbox { cursor: default !important; }
            .result-checkbox:checked { accent-color: #22c55e !important; /* Canlı Yeşil */ }
            @keyframes fadeIn { from { opacity: 0; transform: translateY(-10px); } to { opacity: 1; transform: translateY(0); } }
        </style>
    @endpush

    <div class="indx_title_main_wrapper float_left">
        <div class="title_img_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 full_width">
                    <div class="indx_title_left_wrapper">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="predictions-main float_left w-100">
        <div class="container">
            <h3 class="page-title">Futbol Liste Analizler</h3>

            <div class="vip-table-wrapper">
                <table class="vip-table">
                    <thead>
                    <tr>
                        <th>Favori</th>
                        <th>İY 0.5 Üst %</th>
                        <th>Kombo<br>Olasılık %</th>
                        <th>Tarih</th>

                        <th>Karşılaşma</th>
                        <th>İY 0.5 Üst<br>(Sonuç)</th>
                        <th>MS 1.5 Üst<br>(Sonuç)</th>
                        <th>Diğer Olasılıklar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($games as $game)
                        @php
                            // İY 0.5 Üst Yüzdesi İçin Renk Kontrolü
                            $iyPercent = $game->iy_05_ust_percent;
                            $iyClass = 'badge-default';
                            if (is_numeric($iyPercent)) {
                                if ($iyPercent >= 81) $iyClass = 'badge-green';
                                elseif ($iyPercent >= 76) $iyClass = 'badge-yellow';
                                elseif ($iyPercent >= 70) $iyClass = 'badge-red';
                            }

                            // Kombo Olasılık Yüzdesi İçin Renk Kontrolü
                            $comboPercent = $game->combo_probability_percent;
                            $comboClass = 'badge-default';
                            if (is_numeric($comboPercent)) {
                                if ($comboPercent >= 81) $comboClass = 'badge-green';
                                elseif ($comboPercent >= 76) $comboClass = 'badge-yellow';
                                elseif ($comboPercent >= 70) $comboClass = 'badge-red';
                            }
                        @endphp
                        <tr class="main-row">
                            <td>
                                <input type="checkbox" class="custom-checkbox row-check" data-game-id="{{ $game->id }}"
                                       {{ in_array($game->id, $favorites ?? []) ? 'checked' : '' }}
                                       {{ !Auth::check() ? 'disabled' : '' }} title="{{ !Auth::check() ? 'Favoriye eklemek için giriş yapın' : '' }}">
                            </td>
                            <td><span class="highlight-badge {{ $iyClass }}">{{ $iyPercent ?? '-' }}%</span></td>
                            <td><span class="highlight-badge {{ $comboClass }}">{{ $comboPercent ?? '-' }}%</span></td>
                            <td>{{ \Carbon\Carbon::parse($game->match_time)->format('d.m.Y') }}<br>{{ \Carbon\Carbon::parse($game->match_time)->format('H:i') }}</td>

                            <td class="match-name">{{ $game->teams }}</td>
                            <td class="text-center">
                                @if($game->iy_05_ust_result === true || $game->iy_05_ust_result === 1)
                                    <i class="fa fa-check-circle text-success" style="font-size: 1.3rem;" title="Başarılı (+)"></i>
                                @elseif($game->iy_05_ust_result === false || $game->iy_05_ust_result === 0)
                                    <i class="fa fa-times-circle text-danger" style="font-size: 1.3rem;" title="Başarısız (-)"></i>
                                @else
                                    <i class="fa fa-clock-o text-warning" style="font-size: 1.3rem;" title="Sonuç Bekleniyor"></i>
                                @endif
                            </td>

                            <td class="text-center">
                                @if($game->ms_15_ust_result === true || $game->ms_15_ust_result === 1)
                                    <i class="fa fa-check-circle text-success" style="font-size: 1.3rem;" title="Başarılı (+)"></i>
                                @elseif($game->ms_15_ust_result === false || $game->ms_15_ust_result === 0)
                                    <i class="fa fa-times-circle text-danger" style="font-size: 1.3rem;" title="Başarısız (-)"></i>
                                @else
                                    <i class="fa fa-clock-o text-warning" style="font-size: 1.3rem;" title="Sonuç Bekleniyor"></i>
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-incele toggle-details" data-target="details-{{ $game->id }}">
                                    <i class="fa fa-bar-chart"></i>
                                </button>
                            </td>
                        </tr>

                        <tr class="details-row" id="details-{{ $game->id }}">
                            <td colspan="9">
                                <div class="details-content">
                                    <div class="row">
                                        @forelse($game->features as $feature)
                                            <div class="col-md-4 col-sm-6 mb-3">
                                                <div class="detail-item">
                                                    <div class="detail-icon">
                                                        @if(isset($feature->pivot->is_successful) && $feature->pivot->is_successful !== null)
                                                            @if($feature->pivot->is_successful == 1)
                                                                <i class="fa fa-check-circle text-success" title="Başarılı"></i>
                                                            @else
                                                                <i class="fa fa-times-circle text-danger" title="Başarısız"></i>
                                                            @endif
                                                        @else
                                                            <i class="fa fa-tag text-info"></i>
                                                        @endif
                                                    </div>
                                                    <div class="detail-text">
                                                        <h6>{{ $feature->name }}</h6>
                                                        <p>{{ $feature->pivot->comment ?? 'Henüz analiz eklenmemiş.' }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="col-12 text-center text-muted">
                                                <em>Bu maç için henüz detaylı bir analiz özelliği tanımlanmamış.</em>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center text-muted py-4">
                                <em>Şu an bu kategoride eklenmiş bir analiz bulunmamaktadır.</em>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

        @push('scripts')
            <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
            <script src="{{ asset('js/bootstrap.min.js') }}"></script>
            <script src="{{ asset('js/modernizr.js') }}"></script>
            <script src="{{ asset('js/jquery-ui.js') }}"></script>
            <script src="{{ asset('js/owl.carousel.js') }}"></script>
            <script src="{{ asset('js/jquery.bxslider.min.js') }}"></script>
            <script src="{{ asset('js/customScrollbar.min.js') }}"></script>
            <script src="{{ asset('js/jquery.countTo.js') }}"></script>
            <script src="{{ asset('js/jquery.inview.min.js') }}"></script>
            <script src="{{ asset('js/jquery.magnific-popup.js') }}"></script>
            <script src="{{ asset('js/imagesloaded.pkgd.min.js') }}"></script>
            <script src="{{ asset('js/isotope.pkgd.min.js') }}"></script>
            <script src="{{ asset('js/cursor.js') }}"></script>
            <script src="{{ asset('js/main.js') }}"></script>

            <script>
                $(document).ready(function() {

                    // İncele Butonu İşlevi
                    $('.toggle-details').click(function() {
                        var targetId = $(this).data('target');
                        $('#' + targetId).toggleClass('show');
                    });

                    // Favoriye Ekleme İşlevi (AJAX)
                    $('.row-check').change(function() {
                        var gameId = $(this).data('game-id');
                        var checkbox = $(this);

                        $.ajax({
                            url: "{{ route('favorites.toggle') }}",
                            type: "POST",
                            data: {
                                _token: "{{ csrf_token() }}",
                                game_id: gameId
                            },
                            success: function(response) {
                                if(response.status === 'success') {
                                    // Arka planda başarıyla favoriye eklendi veya çıkarıldı
                                }
                            },
                            error: function(xhr) {
                                if(xhr.status === 401) {
                                    alert("Favorilere eklemek için lütfen giriş yapın.");
                                    checkbox.prop('checked', !checkbox.prop('checked')); // İşlemi geri al
                                } else {
                                    alert("Bir hata oluştu, lütfen sayfayı yenileyin.");
                                    checkbox.prop('checked', !checkbox.prop('checked'));
                                }
                            }
                        });
                    });

                });
            </script>
        @endpush

</x-app-layout>
