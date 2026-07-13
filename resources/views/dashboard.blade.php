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
        <link rel="stylesheet" href="{{ asset('css/inner_style.css') }}">


        <style>
            .dashboard-main { padding: 60px 0; background-color: #f8f9fa; }
            .dashboard-title-wrapper { text-align: center; margin-bottom: 40px; }
            .dashboard-title-wrapper h2 { font-size: 2.5rem; font-weight: 800; text-transform: uppercase; color: #111; }
            .dashboard-title-wrapper p { font-size: 1.1rem; color: #666; font-style: italic; }

            .dashboard-grid { display: flex; flex-wrap: wrap; gap: 20px; justify-content: center; margin-top: 50px; }
            .card-custom {
                background: linear-gradient(135deg, #1e293b, #0f172a);
                padding: 40px 20px;
                border-radius: 15px;
                width: calc(33.333% - 20px);
                text-align: center;
                cursor: pointer;
                box-shadow: 0 10px 20px rgba(0,0,0,0.1);
                transition: all 0.3s ease;
                border: 1px solid rgba(255,255,255,0.05);
                text-decoration: none; /* A etiketi gibi davranması için */
                color: inherit;
                display: block; /* Kartın tamamının tıklanabilir olması için */
            }
            .card-custom:hover {
                transform: translateY(-10px);
                box-shadow: 0 15px 30px rgba(56, 189, 248, 0.4);
                border-color: rgba(56, 189, 248, 0.5);
                color: inherit; /* Hover durumunda renk değişimini engeller */
                text-decoration: none;
            }
            .card-custom h5 { color: #38bdf8; font-size: 1.3rem; margin-bottom: 15px; text-transform: uppercase; font-weight: 700; }
            .card-custom p { color: #cbd5e1; margin: 0; font-size: 0.95rem; }
            .card-custom i { font-size: 2.5rem; color: #fff; margin-bottom: 20px; display: block; opacity: 0.8; }

            @media (max-width: 991px) { .card-custom { width: calc(50% - 20px); } }
            @media (max-width: 767px) { .card-custom { width: 100%; } }
            @media (max-width: 767px) {
                .custom-mobile-logo {
                    height: 70px;
                    object-fit: contain; /* Görüntünün ezilmemesi için */
                }
            }
        </style>
    @endpush

    <div class="indx_title_main_wrapper float_left">
        <div class="title_img_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 full_width">
                    <div class="indx_title_left_wrapper">
                        <h2>Panelim</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 full_width">
                    <div class="indx_title_right_wrapper">
                        <ul>
                            <li><a href="{{ route('welcome') }}">Ana Sayfa</a> &nbsp;&nbsp;&nbsp;> </li>
                            <li>Panelim</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dashboard-main float_left w-100">
        <div class="container">

            <div class="dashboard-title-wrapper">
                <h2>StatsAnaliz VIP</h2>
                <p>"Veri yoksa başarı tesadüftür."</p>
            </div>

            <div id="futbolCarousel" class="carousel slide mb-5" data-ride="carousel" style="border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.2);">
                <div class="carousel-inner">
                    @foreach($banners as $index => $banner)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <img src="{{ asset($banner->image_path) }}" class="d-block w-100" alt="{{ $banner->alt_text ?? 'Futbol Resmi' }}" style="object-fit: cover; height: 400px;">
                        </div>
                    @endforeach
                </div>

                @if($banners->count() > 1)
                    <a class="carousel-control-prev" href="#futbolCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true" style="width: 40px; height: 40px; background-color: rgba(0,0,0,0.5); border-radius: 50%;"></span>
                        <span class="sr-only">Önceki</span>
                    </a>
                    <a class="carousel-control-next" href="#futbolCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true" style="width: 40px; height: 40px; background-color: rgba(0,0,0,0.5); border-radius: 50%;"></span>
                        <span class="sr-only">Sonraki</span>
                    </a>
                @endif
            </div>
            <div class="dashboard-grid">

                <a href="{{ route('predictions.football') }}" class="card-custom">
                    <i class="fa fa-list-alt"></i>
                    <h5 style="text-transform: none;">stats/AI</h5>
                    <p>Son tahminleri görmek için tıklayın.</p>
                </a>



                <a href="{{ route('favorites.index') }}" class="card-custom">
                    <i class="fa fa-star text-warning"></i>
                    <h5 style="text-transform: none;">Favori Karşılaşmalarım</h5>
                    <p>Takip ettiğiniz özel analizleri inceleyin.</p>
                </a>

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
            $('.carousel').carousel({
                interval: 3000 // 3 saniyede bir otomatik döner
            });
        </script>
    @endpush

</x-app-layout>
