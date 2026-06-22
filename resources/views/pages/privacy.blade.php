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

            <div class="container mx-auto px-4 py-5" style="margin-top: 80px; margin-bottom: 80px;">
                <div class="flex flex-wrap justify-center">
                    <div class="w-full lg:w-5/6">
                        <div class="bg-white shadow-md rounded-lg border-0">
                            <div class="p-5">
                                <h2 class="text-2xl font-bold mb-4" style="color: #38bdf8;">Gizlilik Politikası ve KVKK Aydınlatma Metni</h2>
                                <p class="text-gray-500 mb-4">Son Güncelleme: {{ date('d.m.Y') }}</p>

                                <h5 class="font-bold mt-4">1. Veri Sorumlusu</h5>
                                <p>StatsAnaliz olarak, kişisel verilerinizin güvenliğine büyük önem veriyoruz. 6698 sayılı Kişisel Verilerin Korunması Kanunu ("KVKK") uyarınca, kullanıcılarımıza sunduğumuz hizmetler kapsamında kişisel verileriniz işlenmekte ve muhafaza edilmektedir.</p>

                                <h5 class="font-bold mt-4">2. Toplanan Kişisel Veriler ve İşlenme Amacı</h5>
                                <p>Uygulamamızı kullanırken aşağıdaki verileriniz toplanabilir:</p>
                                <ul class="list-disc list-inside">
                                    <li><strong>Kimlik ve İletişim Bilgileri:</strong> Kayıt aşamasında alınan Ad, Soyad ve E-posta adresi (VIP üyelik doğrulama ve iletişim amacıyla).</li>
                                    <li><strong>Cihaz Bilgileri:</strong> Anlık bildirimler (push notifications) gönderebilmek için cihaz tanımlayıcıları (Cihaz ID, İşletim Sistemi Sürümü).</li>
                                </ul>

                                <h5 class="font-bold mt-4">3. Verilerin Üçüncü Kişilerle Paylaşımı</h5>
                                <p>StatsAnaliz, kullanıcı verilerini kesinlikle hiçbir reklamveren, bahis şirketi veya üçüncü şahıs kurumla <strong>satmaz veya paylaşmaz</strong>. Verileriniz yalnızca yasal zorunluluklar kapsamında resmi makamlarca talep edilmesi halinde ilgili mercilerle paylaşılabilir.</p>

                                <h5 class="font-bold mt-4">4. Hesap ve Veri Silme Hakkı (Kritik)</h5>
                                <p>Kullanıcılarımız, istedikleri zaman hesaplarını ve ilişkili tüm kişisel verilerini sistemimizden kalıcı olarak silme hakkına sahiptir. Hesap silme işlemini uygulama içerisindeki "Profil" menüsünden veya <strong>statsanalizofficial@gmail.com</strong> adresine talep göndererek gerçekleştirebilirsiniz. Silinen veriler geri döndürülemez.</p>

                                <h5 class="font-bold mt-4">5. İletişim</h5>
                                <p>Gizlilik politikamız ve kişisel verilerinizle ilgili her türlü sorunuz için <strong>statsanalizofficial@gmail.com</strong> adresi üzerinden bizimle iletişime geçebilirsiniz.</p>
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


