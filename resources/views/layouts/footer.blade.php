<div class="footer_wrapper float_left">
{{--    <div class="news_section">--}}
{{--        <div class="container">--}}
{{--            <div class="news_letter_wrapper float_left">--}}
{{--                <div class="lr_nl_heading_wrapper">--}}
{{--                    <h2>Duyurulardan Haberdar Olun</h2>--}}
{{--                    <p>Sistem güncellemeleri ve yeni VIP avantajları için e-posta listemize katılın.</p>--}}
{{--                </div>--}}
{{--                <div class="lr_nl_form_wrapper">--}}
{{--                    <input type="text" placeholder="E-Posta Adresiniz">--}}
{{--                    <button type="submit">Abone Ol</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="section_2">
        <div class="section2_footer_overlay"></div>
        <div class="section2_footer_wrapper">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 col-xs-12 col-sm-6">
                        <div class="footer_widget section2_about_wrapper">
                            <div class="wrapper_first_image">
                                <a href="{{ route('welcome') }}">
                                    <img src="{{ asset('images/inner/btm_logo.png') }}" class="img-responsive" alt="logo" />
                                </a>
                            </div>
                            <div class="abotus_content">
                                <p>StatsAnaliz, istatistiksel verilere dayanan karşılaşma analizlerini VIP üyelerine anında bildirim yoluyla ileten profesyonel bir platformdur.</p>
                                <p>Kesinlikle bahis oynatmaz veya teşvik etmez.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-xs-12 col-sm-6">
                        <div class="footer_widget section2_useful_wrapper">
                            <h4>Hızlı <span>Menü</span></h4>
                            <ul>
                                <li><a href="{{ route('welcome') }}"><i class="fa fa-angle-right"></i>Ana Sayfa</a></li>
                                @auth
                                    <li><a href="{{ route('dashboard') }}"><i class="fa fa-angle-right"></i>Panelim (Karşılaşmalar)</a></li>
                                    <li><a href="{{ route('profile.edit') }}"><i class="fa fa-angle-right"></i>Profilim</a></li>
                                @else
                                    <li><a href="{{ route('login') }}"><i class="fa fa-angle-right"></i>Giriş Yap</a></li>
                                    <li><a href="{{ route('register') }}"><i class="fa fa-angle-right"></i>Kayıt Ol</a></li>
                                @endauth
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-xs-12 col-sm-6">
                        <div class="footer_widget section2_useful_wrapper">
                            <h4>Kurumsal</h4>
                            <ul>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Hakkımızda</a></li>
                                <li><a href="{{ route('terms') }}"><i class="fa fa-angle-right"></i>Kullanım Koşulları</a></li>
                                <li><a href="{{ route('privacy') }}"><i class="fa fa-angle-right"></i>Gizlilik Politikası / KVKK</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>VIP Üyelik Sözleşmesi</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-xs-12 col-sm-6">
                        <div class="footer_widget section2_useful_second_wrapper">
                            <h4>İletişim <span>Bilgileri</span></h4>
                            <ul style="word-break: break-all;">
                                <li><a href="https://t.me/StatsAnaliz" target="_blank"><i class="fa fa-telegram"></i> t.me/StatsAnaliz</a></li>
                                <li><a href="https://t.me/statsanalizbilgi" target="_blank"><i class="fa fa-telegram"></i> t.me/statsanalizbilgi</a></li>
                                <li><a href="mailto:statsanalizofficial@gmail.com"><i class="fa fa-envelope-square"></i> statsanalizofficial@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="section2_bottom_wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <div class="btm_foter_box">
                            <p><i class="fa fa-copyright"></i> {{ date('Y') }} StatsAnaliz. Tüm hakları saklıdır.</p>
                            <ul class="aboutus_social_icons">
                                <li><a href="https://t.me/StatsAnaliz" target="_blank"><i class="fa fa-telegram"></i></a></li>
                                <li><a href="https://www.youtube.com/@statsanaliz" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                                <li><a href="https://x.com/StatsAnaliz" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="close_wrapper"></div>
</div>
