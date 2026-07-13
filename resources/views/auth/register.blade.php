<x-app-layout>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
        <link rel="stylesheet" href="{{ asset('flaticon/football/flaticon.css') }}">
        <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
        <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
        <link rel="stylesheet" href="{{ asset('css/owl.theme.default.css') }}">
        <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/customScrollbar.css') }}">
        <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('css/inner_style.css') }}">
        <style>
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
                        <h2>Kayıt Ol</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 full_width">
                    <div class="indx_title_right_wrapper">
                        <ul>
                            <li><a href="{{ route('welcome') }}">Ana Sayfa</a> &nbsp;&nbsp;&nbsp;> </li>
                            <li>Kayıt Ol</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="login_section float_left">
        <div class="login_back_img register_back"></div>
        <div class="login_form_wrapper">
            <div class="container">

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <div class="ft_left_heading_wraper gallery_heading_center text-center login_head">
                            <h1>VIP Ailemize Katılın</h1>
                            <p>StatsAnaliz ile profesyonel istatistiklere ulaşmak ücretsiz ve çok kolay.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-8 offset-md-2 col-sm-12">
                    <div class="login_wrapper">

                        <div class="jp_regiter_top_heading">
                            <p>* İşaretli alanların doldurulması zorunludur.</p>
                        </div>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row clearfix">

                                <div class="form-group col-md-6 col-sm-6 col-12">
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required autofocus placeholder="İsim Soyisim *">
                                    @error('name')
                                    <span class="text-danger" style="color: #ff4d4d; font-size: 13px; margin-top: 5px; display: block;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6 col-sm-6 col-12">
                                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required placeholder="E-Posta Adresiniz *">
                                    @error('email')
                                    <span class="text-danger" style="color: #ff4d4d; font-size: 13px; margin-top: 5px; display: block;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-12 col-sm-12 col-12">
                                    <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" placeholder="Telefon Numaranız">
                                    @error('phone')
                                    <span class="text-danger" style="color: #ff4d4d; font-size: 13px; margin-top: 5px; display: block;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6 col-sm-6 col-12">
                                    <input type="password" name="password" class="form-control" required placeholder="Şifreniz *">
                                    @error('password')
                                    <span class="text-danger" style="color: #ff4d4d; font-size: 13px; margin-top: 5px; display: block;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6 col-sm-6 col-12">
                                    <input type="password" name="password_confirmation" class="form-control" required placeholder="Şifrenizi Tekrar Girin *">
                                    @error('password_confirmation')
                                    <span class="text-danger" style="color: #ff4d4d; font-size: 13px; margin-top: 5px; display: block;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="check-box text-center">
                                        <input type="checkbox" required name="terms" id="account-option_2"> &ensp;
                                        <label for="account-option_2" class="label_2">
                                            <a href="#" class="check_box_anchr">Kullanıcı Sözleşmesini ve Gizlilik Politikasını</a> okudum, kabul ediyorum.
                                        </label>
                                    </div>
                                </div>

                            </div>

                            <div class="login_btn_wrapper">
                                <button type="submit" class="btn btn-primary login_btn" style="width: 100%; border: none; cursor:pointer;"> Kayıt Ol </button>
                            </div>

                        </form>

                        <div class="login_message">
                            <p>Zaten üye misiniz? <a href="{{ route('login') }}"> Buradan Giriş Yapın </a> </p>
                        </div>

                    </div>
                    <p class="btm_txt_register_form">Güvenliğiniz için ortak bilgisayarlarda işleminiz bittikten sonra çıkış yapmayı unutmayın.</p>
                </div>
            </div>
        </div>
        <div class="login_back_img22 register_back22"></div>
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
    @endpush

</x-app-layout>
