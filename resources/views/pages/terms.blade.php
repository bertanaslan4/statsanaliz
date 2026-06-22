@extends('layouts.app') <!-- Sitenizin ana layout dosyasının adını buraya yazın -->

@section('content')
    <div class="container py-5" style="margin-top: 80px; margin-bottom: 80px;">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-5">
                        <h2 class="mb-4 font-weight-bold" style="color: #38bdf8;">Kullanım Koşulları ve Sorumluluk Reddi</h2>
                        <p class="text-muted mb-4">Son Güncelleme: {{ date('d.m.Y') }}</p>

                        <h5 class="font-weight-bold mt-4">1. Hizmetin Doğası ve Sorumluluk Reddi</h5>
                        <p><strong>StatsAnaliz kesinlikle bir bahis, iddaa veya kumar uygulaması DEĞİLDİR.</strong> Platformumuz, geçmiş spor müsabakası verilerini yapay zeka ve istatistiksel algoritmalarla analiz ederek matematiksel olasılıklar (tahminler) sunan bir araçtır. </p>
                        <p>StatsAnaliz, sunulan analizlerin %100 başarılı olacağını garanti etmez. Kullanıcılar, platformdaki verileri değerlendirirken kendi özgür iradeleriyle hareket ederler. Uygulama içerisindeki verilerin kullanımından doğabilecek hiçbir maddi veya manevi kayıptan StatsAnaliz sorumlu tutulamaz.</p>

                        <h5 class="font-weight-bold mt-4">2. Yasadışı Kullanım Yasağı</h5>
                        <p>StatsAnaliz platformu hiçbir şekilde yasadışı bahis oynatmak, yönlendirmek veya teşvik etmek amacıyla kullanılamaz. Uygulama içerisinde herhangi bir yasadışı platformun reklamı yapılamaz veya linki paylaşılamaz.</p>

                        <h5 class="font-weight-bold mt-4">3. VIP Üyelik ve Hizmet Alımı</h5>
                        <p>StatsAnaliz, kullanıcılara daha detaylı istatistikler ve anlık bildirimler sunmak için ücretli VIP abonelik modeli sunabilir. Bu abonelikler, uygulama mağazalarının (Apple App Store ve Google Play) kendi ödeme altyapıları veya web sitemizdeki güvenli ödeme sistemleri üzerinden yönetilir.</p>

                        <h5 class="font-weight-bold mt-4">4. Fikri Mülkiyet</h5>
                        <p>StatsAnaliz markası, logoları, içerikleri ve yapay zeka algoritması ("stats/AI") tamamen StatsAnaliz'e aittir. İzinsiz kopyalanamaz, dağıtılamaz veya ticari amaçla kullanılamaz.</p>

                        <h5 class="font-weight-bold mt-4">5. Kabul Beyanı</h5>
                        <p>StatsAnaliz uygulamasını indiren ve kullanan her birey, bu kullanım koşullarını eksiksiz olarak okumuş, anlamış ve kabul etmiş sayılır.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
