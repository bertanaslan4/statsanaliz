<div id="sidebar" class="bounce-to-right">
    <div id="toggle_close">&times;</div>
    <div id='cssmenu'>
        <a href="{{ route('welcome') }}">
            <img src="{{ asset('images/football/logo.jpeg') }}" alt="logo">
        </a>
        <ul class="sidebb">
            <li><a href="{{ route('welcome') }}">Ana Sayfa</a></li>
            @auth
                <li><a href="{{ route('dashboard') }}">Panelim (Karşılaşmalar)</a></li>
                <li><a href="{{ route('profile.edit') }}">Profilim</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}" style="display: none;" id="logout-form-sidebar">
                        @csrf
                    </form>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-sidebar').submit();">Çıkış Yap</a>
                </li>
            @else
                <li><a href="{{ route('login') }}">Giriş Yap</a></li>
                <li><a href="{{ route('register') }}">Kayıt Ol</a></li>
            @endauth
        </ul>
    </div>
    <div class="btm_foter_box sidebar_btm_txt">
        <ul class="aboutus_social_icons">
            <li><a href="https://t.me/StatsAnaliz" target="_blank" title="Telegram Kanalımız"><i class="fa fa-telegram"></i></a></li>

            <li><a href="https://t.me/statsanalizbilgi" target="_blank" title="Telegram Bilgi"><i class="fa fa-telegram"></i></a></li>
            <li><a href="https://x.com/StatsAnaliz" target="_blank" title="Twitter Bilgi"><i class="fa fa-twitter"></i></a></li>
            <li><a href="https://www.youtube.com/@statsanaliz" target="_blank" title="YouTube Kanalımız"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>

            <li><a href="mailto:statsanalizofficial@gmail.com" title="Bize E-Posta Gönderin"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
        </ul>
        <p><i class="fa fa-copyright"></i> {{ date('Y') }} StatsAnaliz.</p>
    </div>
</div>

<div class="ft_navi_main_wrapper float_left">
    <div class="ft_menu_wrapper">
        <div class="rp_mobail_menu_main_wrapper">
            <div class="row">
                <div class="col-sm-12 col-12">
                    <div id="toggle">
                        <a href="#"><i class="fa fa-bars"></i><span>menü</span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="ft_login_wrapper">
            @guest
                <a href="{{ route('login') }}"><i class="fa fa-sign-in"></i><span>Giriş / Kayıt</span></a>
            @else
                <a href="{{ route('dashboard') }}"><i class="fa fa-user"></i><span>{{ Auth::user()->name }}</span></a>
            @endauth
        </div>
    </div>

    <div class="ft_logo_wrapper">
        <a href="{{ route('welcome') }}">
            <img style="max-width:50%" src="{{ asset('images/football/logo.jpeg') }}" alt="logo">
        </a>
    </div>

    <div class="ft_right_wrapper">
        <ul>
            <li>
                <div class="hs_btn_wrapper d-none d-sm-none d-md-block d-lg-block d-xl-block">
                    <ul>
                        <li><a href="#">İletişim</a></li>
                    </ul>
                </div>
            </li>
            @auth
                <li>
                    <div class="hs_navi_cart_wrapper">
                        <div class="dropdown-wrapper menu-button">
                            <a class="menu-button" href="#">
                                <i class="fa fa-user"></i>
                            </a>
                            <div class="drop-menu">
                                <div class="cc_cart_wrapper1 menu-button">
                                    <div class="cart_wrapper">
                                        <h2 style="text-transform: none; font-size: 16px;">{{ Auth::user()->name }}</h2>
                                        @if(Auth::user()->hasActivePremium())
                                            <p style="color: #4CAF50; margin-bottom: 10px;">VIP Aktif: {{ Auth::user()->premium_ends_at->format('d.m.Y') }}</p>
                                        @else
                                            <p style="color: #f44336; margin-bottom: 10px;">VIP Süresi Doldu</p>
                                        @endif
                                        <div class="hs_btn_wrapper cart_btn">
                                            <ul>
                                                <li>
                                                    <form method="POST" action="{{ route('logout') }}" id="logout-form-top">
                                                        @csrf
                                                    </form>
                                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-top').submit();">Çıkış Yap</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            @endauth
            <li>
                <div class="extra-nav">
                    <div class="extra-cell">
                        <button id="quik-search-btn" type="button" class="site-button radius-xl"><i class="flaticon-search"></i></button>
                    </div>
                </div>

                <div class="dez-quik-search bg-primary-dark">
                    <form action="#">
                        <input name="search" value="" type="text" class="form-control" placeholder="Karşılaşma ara...">
                        <span id="quik-search-remove"><i class="fa fa-remove"></i></span>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</div>
