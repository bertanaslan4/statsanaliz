<x-app-layout>
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
        <link rel="stylesheet" href="{{ asset('flaticon/football/flaticon.css') }}">
        <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
        <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
        <link rel="stylesheet" href="{{ asset('css/owl.theme.default.css') }}">
        <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('css/football_style.css') }}">
        <style>
            /* Geri Sayım Sayacı İçin Ufak Bir Düzeltme */
            #clockdiv { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: #fff; display: inline-block; font-weight: 100; text-align: center; font-size: 30px; }
            #clockdiv > div { padding: 10px; border-radius: 3px; background: rgba(56, 189, 248, 0.2); display: inline-block; margin: 2px; }
            #clockdiv div > span { padding: 10px; border-radius: 3px; background: rgba(15, 23, 42, 0.8); display: inline-block; font-weight: bold; color: #38bdf8; }
            .smalltext { padding-top: 5px; font-size: 12px; font-weight: bold; text-transform: uppercase; }
            @media (max-width: 767px) {
                .custom-mobile-logo {
                    height: 70px;
                    object-fit: contain; /* Görüntünün ezilmemesi için */
                }
            }
        </style>
    @endpush

        <div class="slider-area">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">

                    @foreach($banners as $index => $banner)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">

                            <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(15, 23, 42, 0.7); z-index: 1;"></div>
                            <img src="{{ asset($banner->image_path) }}" class="d-block w-100" alt="{{ $banner->alt_text ?? 'StatsAnaliz VIP' }}" style="object-fit: cover; height: 100vh; min-height: 600px;">

                            <div class="carousel-captions caption-1" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 2; display: flex; align-items: center;">
                                <div class="container">
                                    <div class="row w-100 m-0">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="content lr_banner_content_inner_wrapper text-center w-100">
                                                <h3 data-animation="animated fadeInUp">VIP Tahminler & İstatistikler</h3>
                                                <h2 data-animation="animated fadeInUp">
                                                    @guest
                                                        <a href="{{ route('login') }}" style="color: inherit; text-decoration: none;">
                                                            Giriş Yap
                                                        </a>
                                                    @else
                                                        <a href="{{ route('dashboard') }}" style="color: inherit; text-decoration: none;">
                                                            Panele Git
                                                        </a>
                                                    @endguest
                                                </h2>
                                                <h4 data-animation="animated fadeInUp">Sıradan Bahis Değil<br>Veriye Dayalı Kazanç</h4>

                                                <div class="slider_ring">
                                                    <img src="{{ asset('images/football/ring.png') }}" alt="img">
                                                </div>
                                                <div class="slider_ring1">
                                                    <img src="{{ asset('images/football/ring1.png') }}" alt="img">
                                                </div>
                                                <div class="slider_ball_img">
                                                    <img src="{{ asset('images/football/slider_img.png') }}" alt="img">
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                @if($banners->count() > 1)
                    <a class="carousel-control-prev" href="#carousel-example-generic" role="button" data-slide="prev" style="z-index: 5;">
                        <span class="carousel-control-prev-icon" aria-hidden="true" style="width: 50px; height: 50px; background-color: rgba(56, 189, 248, 0.5); border-radius: 50%;"></span>
                        <span class="sr-only">Önceki</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel-example-generic" role="button" data-slide="next" style="z-index: 5;">
                        <span class="carousel-control-next-icon" aria-hidden="true" style="width: 50px; height: 50px; background-color: rgba(56, 189, 248, 0.5); border-radius: 50%;"></span>
                        <span class="sr-only">Sonraki</span>
                    </a>
                @endif
            </div>
        </div>
        <div class="about_wrappper float_left">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-12 col-md-12 col-sm-12">
                        <div class="about_text_wrapper float_left">
                            <h2>STATSANALİZ NEDİR?</h2>
                            <p><strong>StatsAnaliz / Liste Analizler</strong>, bültende bulunan tüm karşılaşmaları analiz eden profesyonel yapay zeka sisteminin adıdır. Kesinlikle bahis önermez veya teşvik etmez, tamamen matematiksel olasılıklar sunar.</p>

                            <ul class="abt_link">
                                <li><i class="fa fa-check text-info" aria-hidden="true"></i><a href="javascript:void(0);"> <strong>stats/AI</strong> adı verdiğimiz sistemimiz, tüm karşılaşmaları tüm verileri kullanarak en az 100 kez simüle eder.</a></li>
                                <li><i class="fa fa-check text-info" aria-hidden="true"></i><a href="javascript:void(0);"> Öne çıkan en güçlü sonuçları, matematiksel yüzdeleri ile size sunar.</a></li>
                                <li><i class="fa fa-check text-info" aria-hidden="true"></i><a href="javascript:void(0);"> Bu zamana kadar toplam <strong>2500+ üstü karşılaşmada %90'a yakın başarısını</strong> mutlaka değerlendirmelisiniz.</a></li>
                            </ul>

                            <p class="mt-3 mb-2" style="font-size: 1.1rem; font-weight: 600; color: #facc15;">
                                Futbol Liste Analizler skor tahminlerini inceleyerek 1-0 öne geçin 😎
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="counter_section float_left">
            <div class="counter-section" style="background: rgba(15, 23, 42, 0.95); padding: 60px 0;">
                <div class="container text-center">
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-12 mb-4 mb-xl-0">
                            <div class="counter_cntnt_box">
                                <div class="tb_icon"><div class="icon" style="color: #38bdf8;"><i class="fa fa-line-chart"></i></div></div>
                                <div class="count-description text-white">
                                    <span class="timer">{{ $setting->analyzed_matches ?? '1250' }}</span>+
                                    <h5 class="con1 text-secondary mt-2">Analiz Edilen Maç</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-12 mb-4 mb-xl-0">
                            <div class="counter_cntnt_box">
                                <div class="tb_icon"><div class="icon" style="color: #38bdf8;"><i class="fa fa-check-circle-o"></i></div></div>
                                <div class="count-description text-white">
                                    <span class="timer">{{ $setting->success_rate ?? '85' }}</span>%
                                    <h5 class="con2 text-secondary mt-2">Başarı Oranı</h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <div class="counter_cntnt_box">
                                <div class="tb_icon"><div class="icon" style="color: #38bdf8;"><i class="fa fa-bell-o"></i></div></div>
                                <div class="count-description text-white">
                                    <span class="timer">{{ $setting->live_notification ?? '24' }}</span>/7
                                    <h5 class="con4 text-secondary mt-2">Canlı Bildirim</h5>
                                </div>
                            </div>
                        </div>
                    </div>
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
        <script src="{{ asset('js/jquery.countTo.js') }}"></script>
        <script src="{{ asset('js/jquery.inview.min.js') }}"></script>
        <script src="{{ asset('js/jquery.magnific-popup.js') }}"></script>
        <script src="{{ asset('js/imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{ asset('js/isotope.pkgd.min.js') }}"></script>

        <script src="{{ asset('js/football.js') }}"></script>

        <script>
            $(document).ready(function() {
                // Popup Ayarları
                if ($('.zoom_popup').length) {
                    $('.zoom_popup').magnificPopup({
                        delegate: 'a',
                        type: 'image',
                        tLoading: 'Loading image #%curr%...',
                        mainClass: 'mfp-img-mobile',
                        gallery: { enabled: true, navigateByImgClick: true, preload: [0, 1] },
                        image: {
                            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
                            titleSrc: function (item) { return item.el.attr('title') + '<small></small>'; }
                        }
                    });
                }

                // Dinamik Geri Sayım Sayacı İşlevi
                function getTimeRemaining(endtime) {
                    const total = Date.parse(endtime) - Date.parse(new Date());
                    const seconds = Math.floor((total / 1000) % 60);
                    const minutes = Math.floor((total / 1000 / 60) % 60);
                    const hours = Math.floor((total / (1000 * 60 * 60)) % 24);
                    const days = Math.floor(total / (1000 * 60 * 60 * 24));
                    return { total, days, hours, minutes, seconds };
                }

                function initializeClock(id, endtime) {
                    const clock = document.getElementById(id);
                    if(!clock) return;

                    const daysSpan = clock.querySelector('.days');
                    const hoursSpan = clock.querySelector('.hours');
                    const minutesSpan = clock.querySelector('.minutes');
                    const secondsSpan = clock.querySelector('.seconds');

                    function updateClock() {
                        const t = getTimeRemaining(endtime);
                        daysSpan.innerHTML = t.days;
                        hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
                        minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
                        secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

                        if (t.total <= 0) {
                            clearInterval(timeinterval);
                        }
                    }

                    updateClock();
                    const timeinterval = setInterval(updateClock, 1000);
                }

                // Bulunduğumuz günden itibaren 3 gün sonrasına sayan demo bir tarih belirledik
                const deadline = new Date(Date.parse(new Date()) + 3 * 24 * 60 * 60 * 1000);
                initializeClock('clockdiv', deadline);
            });
        </script>
    @endpush
</x-app-layout>
