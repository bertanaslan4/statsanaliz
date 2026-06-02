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
            .login_wrapper input.form-control {
                text-transform: none !important;
            }
        </style>
    @endpush

    <div class="indx_title_main_wrapper float_left">
        <div class="title_img_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 full_width">
                    <div class="indx_title_left_wrapper">
                        <h2>Giriş Yap</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 full_width">
                    <div class="indx_title_right_wrapper">
                        <ul>
                            <li><a href="{{ route('welcome') }}">Ana Sayfa</a> &nbsp;&nbsp;&nbsp;> </li>
                            <li>Giriş Yap</li>
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
                            <h1>Hesabınıza Giriş Yapın</h1>
                            <p>StatsAnaliz VIP paneline erişmek için lütfen giriş yapın.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 offset-md-2">

                        <x-auth-session-status class="mb-4 text-success text-center" :status="session('status')" />

                        <div class="login_wrapper">

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="formsix-pos">
                                    <div class="form-group i-email">
                                        <input type="email" name="email" class="form-control" required autofocus value="{{ old('email') }}" placeholder="E-Posta Adresiniz *" autocapitalize="off" autocorrect="off">
                                        @error('email')
                                        <span class="text-danger" style="color: #ff4d4d; font-size: 13px; margin-top: 5px; display: block;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="formsix-e">
                                    <div class="form-group i-password">
                                        <input type="password" name="password" class="form-control" required placeholder="Şifreniz *">
                                        @error('password')
                                        <span class="text-danger" style="color: #ff4d4d; font-size: 13px; margin-top: 5px; display: block;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="login_remember_box">
                                    <label class="control control--checkbox">Beni Hatırla
                                        <input type="checkbox" name="remember">
                                        <span class="control__indicator"></span>
                                    </label>
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="forget_password">
                                            Şifremi Unuttum
                                        </a>
                                    @endif
                                </div>

                                <div class="login_btn_wrapper">
                                    <button type="submit" class="btn btn-primary login_btn" style="width: 100%; border: none; cursor:pointer;"> Giriş Yap </button>
                                </div>
                            </form>

                            <div class="login_message">
                                <p>Henüz hesabınız yok mu? <a href="{{ route('register') }}"> Hemen Kayıt Olun </a> </p>
                            </div>
                        </div>

                        <p style="text-align: center; margin-top: 20px;">Eğer ortak bir bilgisayar kullanıyorsanız, güvenliğiniz için işleminiz bittikten sonra sistemden çıkış yapmayı unutmayın.</p>
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
