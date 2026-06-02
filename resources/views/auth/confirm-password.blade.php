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
    @endpush

    <div class="indx_title_main_wrapper float_left">
        <div class="title_img_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 full_width">
                    <div class="indx_title_left_wrapper">
                        <h2>Güvenlik Doğrulaması</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 full_width">
                    <div class="indx_title_right_wrapper">
                        <ul>
                            <li><a href="{{ route('dashboard') }}">Panelim</a> &nbsp;&nbsp;&nbsp;> </li>
                            <li>Şifre Onayı</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="login_section float_left">
        <div class="login_back_img"></div>
        <div class="login_form_wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <div class="ft_left_heading_wraper gallery_heading_center text-center login_head">
                            <h1>Erişim Onayı Gerekiyor</h1>
                            <p>Hassas bir işlem yapmak üzeresiniz. Güvenliğiniz için <br> lütfen devam etmeden önce mevcut şifrenizi girerek kimliğinizi doğrulayın.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 offset-md-2">

                        <div class="login_wrapper">

                            <form method="POST" action="{{ route('password.confirm') }}">
                                @csrf

                                <div class="formsix-e">
                                    <div class="form-group i-password">
                                        <input type="password" name="password" class="form-control" required autocomplete="current-password" autofocus placeholder="Mevcut Şifreniz *">
                                        @error('password')
                                        <span class="text-danger" style="color: #ff4d4d; font-size: 13px; margin-top: 5px; display: block;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="login_btn_wrapper" style="margin-top: 30px;">
                                    <button type="submit" class="btn btn-primary login_btn" style="width: 100%; border: none; cursor:pointer;"> Doğrula ve Devam Et </button>
                                </div>
                            </form>

                            <div class="login_message" style="margin-top: 20px;">
                                <p><a href="{{ route('dashboard') }}"> İşlemi İptal Et ve Geri Dön </a> </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="login_back_img22"></div>
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
