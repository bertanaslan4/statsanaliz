<x-app-layout>
    <div class="container mx-auto px-4 py-5" style="margin-top: 80px; margin-bottom: 80px;">
        <div class="flex flex-wrap justify-center">
            <div class="w-full lg:w-5/6">
                <div class="bg-white shadow-md rounded-lg border-0">
                    <div class="p-5 sm:p-8">
                        <h2 class="text-2xl font-bold mb-4" style="color: #38bdf8;">Gizlilik Politikası</h2>
                        <p class="text-gray-500 mb-6">Son Güncelleme: {{ now()->format('d.m.Y') }}</p>

                        <p class="mb-4">StatsAnaliz olarak, kişisel verilerinizin güvenliğine büyük önem veriyoruz. Bu politika, hangi verileri topladığımızı, bu verileri neden topladığımızı ve verilerinizle ilgili haklarınızı açıklamaktadır. 6698 sayılı Kişisel Verilerin Korunması Kanunu ("KVKK") uyarınca, verileriniz işlenmekte ve güvenli bir şekilde muhafaza edilmektedir.</p>

                        <div class="space-y-6">
                            <div>
                                <h3 class="text-lg font-semibold mb-2">Topladığımız Veri Türleri</h3>
                                <div class="border rounded-lg p-4">
                                    <h4 class="font-bold">1. Sizin Bize Sağladığınız Veriler</h4>
                                    <ul class="list-disc list-inside mt-2 space-y-1 text-gray-700">
                                        <li><strong>Kimlik ve İletişim Bilgileri:</strong> Ad, soyad ve e-posta adresi. Bu bilgiler, hesabınızı oluşturmak, doğrulamak ve sizinle önemli konularda (örneğin, VIP üyelik durumu) iletişim kurmak için kullanılır.</li>
                                    </ul>
                                </div>
                                <div class="border rounded-lg p-4 mt-4">
                                    <h4 class="font-bold">2. Otomatik Olarak Toplanan Veriler</h4>
                                    <ul class="list-disc list-inside mt-2 space-y-1 text-gray-700">
                                        <li><strong>Cihaz Bilgileri:</strong> Anlık bildirimler (push notifications) gönderebilmek için anonimleştirilmiş cihaz tanımlayıcıları (Device ID).</li>
                                        <li><strong>Kullanım Verileri:</strong> Uygulama içindeki etkileşimleriniz (örneğin, favori maç ekleme), hizmetlerimizi iyileştirmek ve kullanıcı deneyimini optimize etmek amacıyla toplanır. Bu veriler kişisel kimliğinizle doğrudan ilişkilendirilmez.</li>
                                    </ul>
                                </div>
                            </div>

                            <div>
                                <h3 class="text-lg font-semibold mb-2">Verilerin Kullanım Amaçları</h3>
                                <ul class="list-disc list-inside space-y-1 text-gray-700">
                                    <li><strong>Hizmet Sağlama:</strong> Uygulamanın temel işlevlerini (kullanıcı girişi, kişiselleştirilmiş içerik, VIP erişimi) sunmak.</li>
                                    <li><strong>İletişim:</strong> Hesap yönetimi, parola sıfırlama ve hizmetle ilgili önemli güncellemeler hakkında sizi bilgilendirmek.</li>
                                    <li><strong>Anlık Bildirimler:</strong> Tercihlerinize bağlı olarak önemli maçlar veya analizler hakkında sizi bilgilendirmek.</li>
                                    <li><strong>Analiz ve İyileştirme:</strong> Uygulama performansını ve kullanıcı deneyimini geliştirmek için anonimleştirilmiş verileri analiz etmek.</li>
                                </ul>
                            </div>

                            <div>
                                <h3 class="text-lg font-semibold mb-2">Verilerin Paylaşımı</h3>
                                <p class="text-gray-700"><strong>Verilerinizi Asla Satmıyoruz.</strong> Kişisel verileriniz, yasal bir zorunluluk olmadıkça (örneğin, mahkeme kararı) veya hizmetin sağlanması için teknik olarak gerekmedikçe (örneğin, anlık bildirim hizmeti sağlayıcısı) üçüncü taraflarla <strong>paylaşılmaz ve satılmaz</strong>. Veri paylaştığımız tüm iş ortakları, katı gizlilik standartlarına uymak zorundadır.</p>
                            </div>

                            <div>
                                <h3 class="text-lg font-semibold mb-2">Veri Saklama ve Güvenlik</h3>
                                <p class="text-gray-700">Kişisel verileriniz, hesabınız aktif olduğu sürece veya yasal olarak gerekli olduğu müddetçe saklanır. Verilerinizi yetkisiz erişime, değişikliğe ve ifşaya karşı korumak için endüstri standardı güvenlik önlemleri (şifreleme, erişim kontrolleri vb.) alıyoruz.</p>
                            </div>

                            <div>
                                <h3 class="text-lg font-semibold mb-2">Hesap ve Veri Silme Hakkınız</h3>
                                <p class="text-gray-700">İstediğiniz zaman hesabınızı ve ilişkili tüm kişisel verilerinizi kalıcı olarak silme hakkına sahipsiniz. Bu işlemi, uygulama içindeki "Profil" bölümünden veya <strong>statsanalizofficial@gmail.com</strong> adresine e-posta göndererek gerçekleştirebilirsiniz. Bu işlem geri döndürülemez.</p>
                            </div>

                            <div>
                                <h3 class="text-lg font-semibold mb-2">İletişim</h3>
                                <p class="text-gray-700">Gizlilik politikamız veya kişisel verilerinizle ilgili her türlü sorunuz için <strong>statsanalizofficial@gmail.com</strong> adresi üzerinden bizimle iletişime geçebilirsiniz.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
