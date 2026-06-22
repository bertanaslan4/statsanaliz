

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
                        <h2>Kullanım Koşulları</h2>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="login_section float_left">
        <div class="login_back_img register_back"></div>
        <div class="login_form_wrapper">

            <div class="container mx-auto px-4 py-5" style="margin-top: 80px; margin-bottom: 80px;">
                <div class="flex flex-wrap justify-center">
                    <div class="w-full lg:w-5/6">
                        <div class="bg-white shadow-md rounded-lg border-0">
                            <div class="p-5">
                                <h2 class="text-2xl font-bold mb-4" style="color: #38bdf8;">Kullanım Koşulları ve Sorumluluk Reddi</h2>
                                <p class="text-gray-500 mb-4">Son Güncelleme: {{ date('d.m.Y') }}</p>

                                <h5 class="font-bold mt-4">1. Hizmetin Doğası ve Sorumluluk Reddi</h5>
                                <p><strong>StatsAnaliz kesinlikle bir bahis, iddaa veya kumar uygulaması DEĞİLDİR.</strong> Platformumuz, geçmiş spor müsabakası verilerini yapay zeka ve istatistiksel algoritmalarla analiz ederek matematiksel olasılıklar (tahminler) sunan bir araçtır. </p>
                                <p>StatsAnaliz, sunulan analizlerin %100 başarılı olacağını garanti etmez. Kullanıcılar, platformdaki verileri değerlendirirken kendi özgür iradeleriyle hareket ederler. Uygulama içerisindeki verilerin kullanımından doğabilecek hiçbir maddi veya manevi kayıptan StatsAnaliz sorumlu tutulamaz.</p>

                                <h5 class="font-bold mt-4">2. Yasadışı Kullanım Yasağı</h5>
                                <p>StatsAnaliz platformu hiçbir şekilde yasadışı bahis oynatmak, yönlendirmek veya teşvik etmek amacıyla kullanılamaz. Uygulama içerisinde herhangi bir yasadışı platformun reklamı yapılamaz veya linki paylaşılamaz.</p>

                                <h5 class="font-bold mt-4">3. VIP Üyelik ve Hizmet Alımı</h5>
                                <p>StatsAnaliz, kullanıcılara daha detaylı istatistikler ve anlık bildirimler sunmak için ücretli VIP abonelik modeli sunabilir. Bu abonelikler, uygulama mağazalarının (Apple App Store ve Google Play) kendi ödeme altyapıları veya web sitemizdeki güvenli ödeme sistemleri üzerinden yönetilir.</p>

                                <h5 class="font-bold mt-4">4. Fikri Mülkiyet</h5>
                                <p>StatsAnaliz markası, logoları, içerikleri ve yapay zeka algoritması ("stats/AI") tamamen StatsAnaliz'e aittir. İzinsiz kopyalanamaz, dağıtılamaz veya ticari amaçla kullanılamaz.</p>

                                <h5 class="font-bold mt-4">5. Kabul Beyanı</h5>
                                <p>StatsAnaliz uygulamasını indiren ve kullanan her birey, bu kullanım koşullarını eksiksiz olarak okumuş, anlamış ve kabul etmiş sayılır.</p>
                            </div>
                        </div>
                    </div>
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


