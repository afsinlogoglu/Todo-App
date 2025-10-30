@extends('layouts.default')

@section('content')
    </div>
    <div class="mobile-app-detail bg-white" style="margin-top:-72px">
        <div class=" ">
            <style>
                .accordion-content {
                    max-height: 0;
                    overflow: hidden;

                    transition: max-height 0.3s ease-out;
                    padding-top: 0;
                    padding-bottom: 0;
                }

                .accordion-content.active {
                    max-height: 2000px;
                    transition: max-height 0.5s ease-in;
                    padding-top: 0;
                    padding-bottom: 1rem;
                }

                .accordion-content.active p {
                    margin-top: 10px;
                }
                
                .hero-banner {
                    background-image: url('https://via.placeholder.com/1920x600/4A90E2/ffffff?text=Banner+Test');
                    background-size: cover;
                    background-position: center;
                    background-repeat: no-repeat;
                }
            </style>
            <!-- Hero Section -->
            <section class="hero-banner relative text-white overflow-hidden">
                <!-- Dark overlay for better text readability -->
                <div class="absolute inset-0 bg-black bg-opacity-30"></div>

                <!-- Content -->
                <div class="relative z-10 container mx-auto px-4 py-16 md:py-24">
                    <div class="max-w-4xl mx-auto text-center">
                        <h1 class="text-3xl md:text-5xl font-bold mb-6">
                            Komisyonsuz İşlem Zamanı 
                        </h1>
                        <a href="https://hesapac.destekyatirim.com/" target="_blank"
                            class="inline-block bg-white text-desteky-700 px-8 py-4 rounded-lg font-bold text-lg hover:bg-gray-100 transition shadow-lg">
                            Hemen Başvur
                        </a>
                    </div>
                </div>
            </section>

            <!-- Özellikler Section -->
            <section class="py-16 bg-white">
                <div class="container mx-auto px-4">
                    <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                        <!-- Özellik 1 -->
                        <div class="text-center p-6">
                            <a href="https://hesapac.destekyatirim.com/" target="_blank">
                                <div class=" w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">

                                    <img src="/img/kmk/hemenbasvur.svg" />


                                </div>
                                <h3 class="text-xl font-bold mb-3">Sıfır Komisyon

                                </h3>
                                <p class="text-gray-600 text-justify">Hisse senedi işlemlerinizde sıfır komisyon ile
                                    işlemlerinizi gerçekleştirin, piyasalardaki fırsatları kaçırmayın.</p>
                            </a>
                        </div>

                        <!-- Özellik 2 -->
                        <div class="text-center p-6">
                            <div class="  w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">

                                <img src="/img/hesap-acilis/masrafsizlik.svg" />

                            </div>
                            <h3 class="text-xl font-bold mb-3">Masrafsız Yatırım</h3>
                            <p class="text-gray-600 text-justify">Hesap işletim, EFT/havale takas ve saklama ücreti gibi ek
                                masraflar ödemeyin.</p>
                        </div>

                        <!-- Özellik 3 -->
                        <div class="text-center p-6">
                            <div class="  w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">

                                <img src="/img/hesap-acilis/anlik-borsa-verisi.svg" />

                            </div>
                            <h3 class="text-xl font-bold mb-3">Ücretsiz Canlı Borsa</h3>
                            <p class="text-gray-600 text-justify">Mobil veya İnternet Şube üzerinden ücretsiz canlı veri ile
                                piyasaları gecikmeden takip edin, anlık verilere göre yatırım stratejinizi yönetin.

                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Kampanya Detayları Section -->
            <section class="py-16 bg-gradient-to-br from-blue-50 to-indigo-50">
                <div class="container mx-auto px-4">
                    <div class="max-w-6xl mx-auto">
                        <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12">
                            <h2 class="text-3xl md:text-4xl font-bold text-center mb-8 text-gray-800">Kampanya Detayları</h2>
                            
                            <!-- Ana Kampanya Açıklaması -->
                            <div class="bg-gradient-to-r from-desteky-700 to-desteky-600 text-white rounded-xl p-6 md:p-8 mb-8">
                                <p class="text-lg md:text-xl leading-relaxed text-center font-medium">
                                    Kasım ayı içerisinde Destek Yatırım Mobil ve İnternet Şube üzerinden hesap açan müşterilerimiz 
                                    hisse senedi işlemlerini <span class="font-bold text-2xl">SIFIR KOMİSYONLA</span> gerçekleştiriyor!
                                </p>
                            </div>

                            <!-- Önemli Bilgiler -->
                            <div class="grid md:grid-cols-1 gap-6 mb-8">
                                <div class="bg-blue-50 rounded-lg p-6 border-l-4 border-blue-500">
                                    <ul class="space-y-4 text-gray-700">
                                        <li class="flex items-start">
                                            <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                                            <span>03 - 30 Kasım 2025 tarihleri arasında mobil ve internet şube üzerinden hesap açan müşteriler 31 Aralık 2025 tarihine kadar Destek Yatırım Mobil, internet şube, ForInvest, Matriks ve İdeal Data'dan üzerinden gerçekleştirdiği hisse senedi işlemlerinde <strong>SIFIR KOMİSYON "0"</strong> imkanından yaralanacaklardır.</span>
                                        </li>
                                        <li class="flex items-start">
                                            <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                                            <span>Üstelik yıllık bakım ücreti, EFT havale ücreti yok! Destek Yatırım Mobil ve İnternet Şube üzerinden 15 dk gecikmeden canlı veri imkanından ücretsiz faydalanma fırsatını kaçırmayın!</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Kampanya Özeti -->
                            <div class="grid md:grid-cols-2 gap-6 mb-8">
                                <div class="bg-gray-50 rounded-lg p-6">
                                    <h3 class="font-bold text-lg mb-4 text-desteky-700">
                                        <i class="fas fa-calendar-alt mr-2"></i>Kampanya Bilgileri
                                    </h3>
                                    <ul class="space-y-3 text-gray-700">
                                        <li><strong>Kampanya dönemi:</strong> 03 - 30 Kasım 2025 tarihlerinde hesap açanlar</li>
                                        <li><strong>Yararlanma Tarihi:</strong> 03 Kasım - 31 Aralık 2025</li>
                                        <li><strong>Faydalanacak Müşteriler:</strong> Hisse senedi hesabı açan müşteriler</li>
                                        <li><strong>Komisyon Oranı:</strong> Dijital kanallar üzerinden gerçekleşen hisse senedi işlemlerinde sıfır "0" komisyon</li>
                                    </ul>
                                </div>

                                <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-lg p-6 border-2 border-green-200">
                                    <h3 class="font-bold text-lg mb-4 text-green-700">
                                        <i class="fas fa-gift mr-2"></i>Avantajlar
                                    </h3>
                                    <ul class="space-y-3 text-gray-700">
                                        <li class="flex items-center">
                                            <i class="fas fa-star text-yellow-500 mr-2"></i>
                                            <span>Sıfır komisyon</span>
                                        </li>
                                        <li class="flex items-center">
                                            <i class="fas fa-star text-yellow-500 mr-2"></i>
                                            <span>Yıllık bakım ücreti yok</span>
                                        </li>
                                        <li class="flex items-center">
                                            <i class="fas fa-star text-yellow-500 mr-2"></i>
                                            <span>EFT/Havale ücreti yok</span>
                                        </li>
                                        <li class="flex items-center">
                                            <i class="fas fa-star text-yellow-500 mr-2"></i>
                                            <span>Ücretsiz canlı veri</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Detaylar -->
                            <div class="bg-gray-50 rounded-lg p-6 md:p-8 mb-8">
                                <h3 class="font-bold text-xl mb-6 text-gray-800">
                                    <i class="fas fa-info-circle mr-2"></i>Detaylar
                                </h3>
                                <ul class="space-y-4 text-gray-700">
                                    <li class="flex items-start">
                                        <span class="inline-block w-2 h-2 bg-desteky-700 rounded-full mt-2 mr-3 flex-shrink-0"></span>
                                        <span>Kasım ayı sonuna kadar Destek Yatırım Mobil ve İnternet Şube üzerinden hesap açan yeni müşteriler, 31 Aralık 2025 tarihine kadar Destek Yatırım mobil, internet şube, ForInvest, Matriks ve İdeal Data üzerinden gerçekleştirecekleri hisse senedi işlemleri için SIFIR KOMİSYON oranından yararlanacaktır.</span>
                                    </li>
                                    <li class="flex items-start">
                                        <span class="inline-block w-2 h-2 bg-desteky-700 rounded-full mt-2 mr-3 flex-shrink-0"></span>
                                        <span>Müşterilere hesap açtıkları tarihten bir gün sonra hisse senedi işlemleri için SIFIR KOMİSYON oranı tanımlanacaktır.</span>
                                    </li>
                                    <li class="flex items-start">
                                        <span class="inline-block w-2 h-2 bg-desteky-700 rounded-full mt-2 mr-3 flex-shrink-0"></span>
                                        <span>Kampanyadan yararlanılması için yapılacak işlemlerin Destek Yatırım mobil, internet şube, ForInvest, Matriks ya da İdeal Data'dan gerçekleşmesi gerekmektedir.</span>
                                    </li>
                                    <li class="flex items-start">
                                        <span class="inline-block w-2 h-2 bg-desteky-700 rounded-full mt-2 mr-3 flex-shrink-0"></span>
                                        <span>Müşteriler, kampanya bitimini takip eden ilk iş gününde (2 Ocak 2026) işlemlerini Destek Yatırım'ın mevcut komisyon oranlarıyla gerçekleştireceklerdir.</span>
                                    </li>
                                    <li class="flex items-start">
                                        <span class="inline-block w-2 h-2 bg-desteky-700 rounded-full mt-2 mr-3 flex-shrink-0"></span>
                                        <span>Kasım ve Aralık ayında yapılan işlem hacimlerine göre kişiye özel komisyon tanımlaması yapılacak olup, bu tutar max dijital kanallardan onbinde 8, yatırım danışmanı/temsilci aracılığıyla gerçekleşen işlemlerde ise binde 1 komisyon uygulanacaktır.</span>
                                    </li>
                                </ul>
                            </div>

                            <!-- Hisse Senedi İşlemleri -->
                            <div class="border-t-2 border-gray-200 pt-8">
                                <h3 class="font-bold text-xl mb-6 text-gray-800">
                                    <i class="fas fa-chart-line mr-2"></i>Hisse Senedi İşlemleri
                                </h3>
                                <div class="space-y-4 text-gray-700">
                                    <p class="flex items-start">
                                        <i class="fas fa-mobile-alt text-desteky-700 mt-1 mr-3"></i>
                                        <span>Hisse senedi alım–satım işlemlerinizi, Destek Yatırım Mobil ve İnternet Şube üzerinden kolaylıkla gerçekleştirebilirsiniz.</span>
                                    </p>
                                    <p class="flex items-start">
                                        <i class="fas fa-user-plus text-desteky-700 mt-1 mr-3"></i>
                                        <span>Henüz hisse senedi hesabınız yoksa, Destek Yatırım Mobil uygulamasını indirerek Online Müşteri Olun adımıyla 3 Adımda Hızla yatırım hesabınızı açabilir ve sözleşmelerinizi onaylayarak işlemlere hemen başlayabilirsiniz.</span>
                                    </p>
                                    <p class="flex items-start">
                                        <i class="fas fa-list text-desteky-700 mt-1 mr-3"></i>
                                        <span>Destek Yatırım Mobil ve İnternet Şube üzerinden seçtiğiniz hisse senetleri ve VİOP sözleşmeleri için takip listenizi oluşturabilir, canlı fiyat hareketlerini kolaylıkla izleyebilirsiniz. Günlük emirlerinizi ve portföyünüzü takip edebilir, fiyat takibi yaparak kendi favori listelerinizi oluşturabilirsiniz.</span>
                                    </p>
                                </div>
                            </div>

                            <!-- Önemli Linkler -->
                            <div class="bg-yellow-50 border-l-4 border-yellow-400 p-6 mt-8 rounded-lg">
                                <p class="text-gray-700 mb-4">
                                    <i class="fas fa-info-circle text-yellow-600 mr-2"></i>
                                    <strong>Destek Yatırım Menkul Değerler A.Ş.,</strong> hisse senedi ve VİOP işlemleriniz için aracılık hizmeti sunmaktadır.
                                </p>
                                <div class="space-y-3">
                                    <p class="text-gray-700">
                                        <i class="fas fa-external-link-alt text-blue-600 mr-2"></i>
                                        Borsa İstanbul Pay (Hisse Senedi) Piyasası piyasa işleyişi kurallarına erişmek için 
                                        <a href="https://borsaistanbul.com" target="_blank" class="text-blue-600 hover:underline font-semibold">
                                            Borsa İstanbul'un internet sitesini
                                        </a> ziyaret edebilirsiniz.
                                    </p>
                                    <p class="text-gray-700">
                                        <i class="fas fa-file-pdf text-red-600 mr-2"></i>
                                        Destek Yatırım'ın tüm ürünler bazındaki masraf ve komisyonları için 
                                        <a href="https://www.destekyatirim.com/storage/01JDH57GJ7TMPMKXF16XQACYNH.pdf" target="_blank" class="text-blue-600 hover:underline font-semibold">
                                            tıklayınız
                                        </a>
                                    </p>
                                </div>
                            </div>

                            <!-- CTA Button -->
                            <div class="text-center mt-8">
                                <a href="https://hesapac.destekyatirim.com/" target="_blank"
                                    class="inline-block bg-desteky-700 text-white px-10 py-4 rounded-lg font-bold text-lg hover:bg-desteky-600 transition shadow-lg transform hover:scale-105">
                                    <i class="fas fa-rocket mr-2"></i>Hemen Başvur
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- SSS Section -->
            <section class="py-16 bg-gray-50">
                <div class="container mx-auto px-4">
                    <div class="max-w-4xl mx-auto">
                        <h2 class="text-3xl font-bold text-center mb-12">Sıkça Sorulan Sorular</h2>

                        <!-- Accordion Items -->
                        <div class="space-y-4">
                            <!-- Item 1 - Default açık -->
                            <div class="bg-white rounded-lg shadow-sm">
                                <button onclick="toggleAccordion(0)"
                                    class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 transition">
                                    <h3 class="font-semibold text-lg pr-4">Kredili Pay Senedi İşlemleriyle Alım Gücünüzü
                                        Artırın!</h3>
                                    <svg class="w-5 h-5 text-gray-500 transform transition-transform duration-300"
                                        id="icon-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div class="accordion-content active px-6" id="content-0">
                                    <p class="text-gray-600 leading-relaxed">
                                        Kredili pay senedi işlemleri ile hesabınızda bulunan menkul kıymetleri teminat
                                        olarak vererek
                                        daha büyük pozisyonlar açarak alım gücünüzü artırma imkanına sahip olabilirsiniz.
                                        Destek Yatırım Mobil uygulamasını App Store veya Google Play'den indirerek yatırım
                                        hesabınızı
                                        açabilir ve kolayca kredi başvurusunda bulunarak portföyünüzde yer alan varlıkların
                                        değerlenmiş
                                        tutarı ve kredi limitiniz çerçevesinde pay senetlerinde ek alım
                                        gerçekleştirebilirsiniz.
                                    </p>
                                </div>
                            </div>

                            <!-- Item 2 -->
                            <div class="bg-white rounded-lg shadow-sm">
                                <button onclick="toggleAccordion(1)"
                                    class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 transition">
                                    <h3 class="font-semibold text-lg pr-4">Kredili Pay Senedi Alım İşlemi Nedir? Avantajları
                                        Nelerdir?</h3>
                                    <svg class="w-5 h-5 text-gray-500 transform transition-transform duration-300"
                                        id="icon-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div class="accordion-content px-6" id="content-1">
                                    <p class="text-gray-600 leading-relaxed">
                                        Kredili Pay Senedi Alım İşlemi; Sermaye Piyasası Kurulu (SPK) ve Borsa İstanbul A.Ş.
                                        (BIST)
                                        düzenlemeleri çerçevesinde, yatırımcıların pay senedi alımından kaynaklanan borçları
                                        için kredi
                                        kullanmasıdır. Bu sayede sahip olduğunuz ve teminat olarak verdiğiniz varlıkların
                                        değerlenmiş
                                        tutarı ve kredi limitiniz çerçevesinde daha fazla pay senedi satın alabilir, piyasa
                                        koşullarına
                                        göre daha hızlı pozisyon alma ve portföyünüzü çeşitlendirme imkanına sahip
                                        olabilirsiniz.
                                    </p>
                                </div>
                            </div>

                            <!-- Item 3 -->
                            <div class="bg-white rounded-lg shadow-sm">
                                <button onclick="toggleAccordion(2)"
                                    class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 transition">
                                    <h3 class="font-semibold text-lg pr-4">Destek Yatırım'da Alt – Üst Limit Tutarı Ne
                                        Kadar?</h3>
                                    <svg class="w-5 h-5 text-gray-500 transform transition-transform duration-300"
                                        id="icon-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div class="accordion-content px-6" id="content-2">
                                    <p class="text-gray-600 leading-relaxed">
                                        Dijital müşterilerimiz için alt limit 10.000 TL olup; üst limit portföy
                                        büyüklüğünüzle
                                        sınırlandırılmaktadır. Destek Yatırım'da mobil üzerinden yapılacak kredili pay
                                        senedi
                                        işlemlerinde başvuru limiti minimum 10.000 TL – maksimum 5.000.000 TL'dir.
                                        Hesabınıza
                                        tanımlanacak kredi limiti, portföyünüzde bulunan varlıkların değerlenmiş tutarı
                                        dikkate
                                        alınarak belirlenir. Daha yüksek tutarlı krediler için yine cazip faiz oranları ile
                                        yatırım danışmanlığı hizmetimizden yararlanabilirsiniz.
                                    </p>
                                </div>
                            </div>

                            <!-- Item 4 -->
                            <div class="bg-white rounded-lg shadow-sm">
                                <button onclick="toggleAccordion(3)"
                                    class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 transition">
                                    <h3 class="font-semibold text-lg pr-4">Faiz Uygulaması Nasıldır?</h3>
                                    <svg class="w-5 h-5 text-gray-500 transform transition-transform duration-300"
                                        id="icon-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div class="accordion-content px-6" id="content-3">
                                    <p class="text-gray-600 leading-relaxed">
                                        Kredi faizi sadece kredi kullandığınızda uygulanır. Pay senedi alımlarında krediyi
                                        kullandığınız güne kadar
                                        (T+2) faiz işlemez. Kredi faizi, kredinin kullanıldığı süre boyunca gün sonu bakiye
                                        üzerinden
                                        günlük olarak tahakkuk ve tahsil ettirilir. Kullanılan kredi aynı gün içerisinde
                                        ödendiğinde
                                        faiz tahakkuk edilmez. Güncel faiz oranlarımız hakkında bilgi almak için Yatırım
                                        Danışmanınız
                                        veya 0212 371 50 50 Müşteri Destek Merkezi ile iletişime geçebilirsiniz.
                                    </p>
                                </div>
                            </div>

                            <!-- Item 5 -->
                            <div class="bg-white rounded-lg shadow-sm">
                                <button onclick="toggleAccordion(4)"
                                    class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 transition">
                                    <h3 class="font-semibold text-lg pr-4">Nasıl Başvurulur?</h3>
                                    <svg class="w-5 h-5 text-gray-500 transform transition-transform duration-300"
                                        id="icon-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div class="accordion-content px-6" id="content-4">
                                    <p class="text-gray-600 leading-relaxed mb-4">
                                        Kredili pay senedi işlem başvurusu için Destek Yatırım hesabınız bulunmalıdır.
                                        Şubeye gitmeden
                                        "Destek Yatırım Mobil" uygulamasını indirerek yatırım hesabınızı açabilirsiniz.
                                        Destek Yatırım
                                        dijital kanallarından (Mobil ve İnternet Şube) "Kredili Alım, Açığa Satış, Ödünç
                                        Alma ve Verme
                                        İşlemleri Çerçeve Sözleşmesi"ni onaylayabilir ve e-posta adresinize gelecek Limit
                                        Talep Formu'nu
                                        doldurarak 10.000 TL - 5.000.000 TL'ye kadar kredi limit başvurunuzu
                                        gerçekleştirebilirsiniz.
                                    </p>
                                    <p class="text-gray-600 leading-relaxed">
                                        5.000.000 TL üzeri talepleriniz için Şubelerimiz veya 0212 371 50 50 Müşteri Destek
                                        Merkezi
                                        ile iletişime geçebilirsiniz.
                                    </p>
                                </div>
                            </div>

                            <!-- Item 6 -->
                            <div class="bg-white rounded-lg shadow-sm">
                                <button onclick="toggleAccordion(5)"
                                    class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 transition">
                                    <h3 class="font-semibold text-lg pr-4">Kredili İşleme Konu Olabilen Menkul Kıymetler
                                        Hangileridir?</h3>
                                    <svg class="w-5 h-5 text-gray-500 transform transition-transform duration-300"
                                        id="icon-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div class="accordion-content px-6" id="content-5">
                                    <p class="text-gray-600 leading-relaxed mb-4">
                                        Krediye konu olan menkul kıymetler SPK ve BIST tarafından belirlenen ve Destek
                                        Yatırım'ın
                                        uygun bulduğu sermaye piyasası araçlarıdır.
                                    </p>
                                    <p class="text-gray-600 leading-relaxed mb-4">
                                        Destek Yatırım, krediye konu olan menkul kıymetlerin teminat oranını piyasa
                                        koşullarına
                                        göre değiştirme hakkına sahiptir.
                                    </p>
                                    <p class="text-gray-600">
                                        Kredili Pay Senedi işlemleri hakkında BIST'ten detaylı bilgi edinmek için <a
                                            target="_blank"
                                            href="https://borsaistanbul.com/tr/sayfa/493/pay-piyasasi-piyasa-isleyisi"
                                            class="text-blue-600 hover:underline">tıklayınız.</a><br>
                                        Pay piyasası işleyişi ve pazarlar hakkında BIST'ten bilgi almak için <a
                                            target="_blank" href="https://borsaistanbul.com/tr/sayfa/506/pazarlar"
                                            class="text-blue-600 hover:underline">tıklayınız.</a>
                                    </p>
                                </div>
                            </div>

                            <!-- Item 7 -->
                            <div class="bg-white rounded-lg shadow-sm">
                                <button onclick="toggleAccordion(6)"
                                    class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 transition">
                                    <h3 class="font-semibold text-lg pr-4">Kredi Nasıl Kullanılır?</h3>
                                    <svg class="w-5 h-5 text-gray-500 transform transition-transform duration-300"
                                        id="icon-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div class="accordion-content px-6" id="content-6">
                                    <p class="text-gray-600 leading-relaxed mb-4">
                                        Pay senedi kredi işlemi, Kredili Alım, Açığa Satış ve Ödünç Alma ve Verme sözleşmesi
                                        onaylanarak Destek Yatırım tarafından tahsis edilen kredi limitinin tanımlanması
                                        sonrasında,
                                        pay senedi alımından kaynaklanan borca istinaden kredinin kullandırımıyla başlar.
                                    </p>
                                    <p class="text-gray-600 leading-relaxed mb-4">
                                        Pay senedi kredisi, sadece pay senedi alım işlemleri için kullanılan bir kredi
                                        türüdür.
                                        Kullandırılacak maksimum kredi tutarı, portföyünüzdeki teminata konu varlıkların
                                        değerlendirilmiş
                                        tutarına göre hesaplanır.
                                    </p>
                                    <p class="text-gray-600 leading-relaxed mb-4">
                                        Krediye konu olmayan ve teminat kabul edilmeyen senetlerin alımı kredilendirilmez.
                                        SPK mevzuatına
                                        göre kredili alım işlemlerinde, başlangıçta 50%, kredi pozisyonun taşınmaya devam
                                        edildiği
                                        dönemde ise asgari 35% oranında öz kaynak bulundurulması zorunludur.
                                    </p>
                                    <p class="text-gray-600 leading-relaxed">
                                        Öz kaynak oranı, SPK'nın Seri V No:65 sayılı tebliğinde belirtilen formülüyle
                                        hesaplanmaktadır.
                                        Detaylı bilgi için 0212 371 50 50 Müşteri Destek Merkezi ile iletişime
                                        geçebilirsiniz.
                                    </p>
                                </div>
                            </div>

                            <!-- Item 8 -->
                            <div class="bg-white rounded-lg shadow-sm">
                                <button onclick="toggleAccordion(7)"
                                    class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 transition">
                                    <h3 class="font-semibold text-lg pr-4">Örnek Hesaplama</h3>
                                    <svg class="w-5 h-5 text-gray-500 transform transition-transform duration-300"
                                        id="icon-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div class="accordion-content px-6" id="content-7">
                                    <div class="bg-blue-50 p-6 mt-4 rounded-lg mb-4">
                                        <h4 class="font-semibold mt-3 mb-3">Örnek 1: 100.000 TL Nakit ile</h4>
                                        <p class="text-gray-700 leading-relaxed">
                                            Hesabınızda 100.000 TL nakdiniz varsa kurumumuzca size tanımlanabilecek maksimum
                                            kredi
                                            limiti 100.000 TL'dir. 100.000 TL kredi limiti olması ve 90% teminat oranlı pay
                                            senedi
                                            alınmak istenmesi durumunda; 100.000 TL nakit karşılığında 190.000 TL tutarında
                                            90%
                                            teminat oranlı pay senedi alım emri verebilirsiniz. Takas günü 190.000 TL pay
                                            senedi
                                            alım kaynaklı borcunuzu, 100.000 TL tutarındaki kısmını kendi nakdinizle, kalan
                                            90.000 TL
                                            tutarındaki kısmını ise kredi kullanarak kapatabilirsiniz.
                                        </p>
                                    </div>
                                    <div class="bg-green-50 p-6 rounded-lg">
                                        <h4 class="font-semibold mb-3">Örnek 2: 50.000 TL Nakit ile</h4>
                                        <p class="text-gray-700 leading-relaxed">
                                            50.000 TL nakit varlığınız bulunuyorsa, 95.000 TL tutarında 90% teminat oranlı
                                            pay senedi
                                            alım emri verebilirsiniz. Takas günü 50.000 TL pay senedi alım kaynaklı
                                            borcunuzu, 50.000 TL
                                            tutarındaki kısmını kendi nakdinizle, kalan 45.000 TL tutarındaki kısmını ise
                                            kredi kullanarak
                                            kapatabilirsiniz.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Item 9 -->
                            <div class="bg-white rounded-lg shadow-sm">
                                <button onclick="toggleAccordion(8)"
                                    class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 transition">
                                    <h3 class="font-semibold text-lg pr-4">Limit Artırım Talebi Nasıl Yapılır?</h3>
                                    <svg class="w-5 h-5 text-gray-500 transform transition-transform duration-300"
                                        id="icon-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div class="accordion-content px-6" id="content-8">
                                    <p class="text-gray-600 leading-relaxed">
                                        Limit artırım talebiniz için Yatırım Danışmanınız veya 0212 371 50 50 Müşteri Destek
                                        Merkezi ile iletişime geçebilirsiniz.
                                    </p>
                                </div>
                            </div>

                            <!-- Item 10 -->
                            <div class="bg-white rounded-lg shadow-sm">
                                <button onclick="toggleAccordion(9)"
                                    class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 transition">
                                    <h3 class="font-semibold text-lg pr-4">Riskler Nelerdir?</h3>
                                    <svg class="w-5 h-5 text-gray-500 transform transition-transform duration-300"
                                        id="icon-9" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div class="accordion-content px-6" id="content-9">
                                    <div class="bg-red-50 border-l-4 mt-4 border-red-500 p-6 rounded">
                                        <p class="text-gray-700 leading-relaxed">
                                            Kredili Menkul Kıymet İşlemleri; kaldıraç etkisi, piyasa koşullarındaki
                                            değişimler
                                            nedeniyle portföy değerinin düşmesi durumunda ek teminat aktarımı veya kredi
                                            bakiyesinin
                                            geri ödenme zorunluluğunun oluşması, kredili işlem yapılan menkul kıymetin
                                            yeterli
                                            likiditeye sahip olmaması durumunda pozisyonun kapatılamaması ve kredi faiz
                                            oranlarının
                                            maliyeti artırması sebepleriyle yüksek risk içermektedir. Piyasalardaki olumsuz
                                            fiyat
                                            hareketleri sonucunda maddi kayıp yaşayabilirsiniz. Kredili işlem yapmaya karar
                                            vermeden
                                            önce piyasa risklerini ve kişisel risk toleransınızı dikkatlice değerlendirmeniz
                                            önemlidir.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- CTA Section -->
            <section class="py-16 bg-desteky-700 text-white">
                <div class="container mx-auto px-4 text-center">
                    <h2 class="text-3xl font-bold mb-4">Daha Fazla Bilgi İçin</h2>
                    <p class="text-lg mb-8">
                        Detaylı bilgi ve sorularınız için 0212 371 50 50 Müşteri Destek Merkezimizle iletişime geçebilir
                        veya sizi aramamız için tıklayabilirsiniz.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="tel:02123715050"
                            class="bg-white text-desteky-700 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                            <i class="fas fa-phone mr-2"></i>0212 371 50 50
                        </a>
                        <a href="/iletisim"
                            class="bg-transparent border-2 border-white text-white px-6 py-3 rounded-lg font-semibold hover:bg-white hover:text-desteky-700 transition">
                            Sizi Arayalım
                        </a>
                    </div>
                </div>
            </section>

            <script>
                // İlk accordion'u açık başlat
                document.addEventListener('DOMContentLoaded', function() {
                    document.getElementById('icon-0').classList.add('rotate-180');
                });

                function toggleAccordion(index) {
                    const content = document.getElementById(`content-${index}`);
                    const icon = document.getElementById(`icon-${index}`);

                    if (content.classList.contains('active')) {
                        content.classList.remove('active');
                        icon.classList.remove('rotate-180');
                    } else {
                        // Tüm accordion'ları kapat
                        document.querySelectorAll('.accordion-content').forEach((el, i) => {
                            el.classList.remove('active');
                            document.getElementById(`icon-${i}`).classList.remove('rotate-180');
                        });

                        // Seçili olanı aç
                        content.classList.add('active');
                        icon.classList.add('rotate-180');
                    }
                }
            </script>
        </div>
    @endsection
