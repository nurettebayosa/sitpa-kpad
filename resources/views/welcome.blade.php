<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SITPA - KPAD Kabupaten Subang</title>
    
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 10px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #1e3a8a; border-radius: 5px; }
        ::-webkit-scrollbar-thumb:hover { background: #1e40af; }
    </style>
</head>
<body class="font-[Inter] text-slate-800 antialiased bg-slate-50">

    <nav x-data="{ scrolled: false }" 
         @scroll.window="scrolled = (window.pageYOffset > 20)"
         :class="scrolled ? 'bg-white/90 backdrop-blur-md shadow-md py-2' : 'bg-transparent py-4'"
         class="fixed w-full z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('img/logo.png') }}" onerror="this.src='https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/Lambang_Kabupaten_Subang.png/432px-Lambang_Kabupaten_Subang.png'" class="h-10 w-auto drop-shadow-md" alt="Logo">
                    <div class="flex flex-col">
                        <span :class="scrolled ? 'text-slate-800' : 'text-white'" class="font-bold text-lg leading-none tracking-tight transition-colors">SITPA KPAD</span>
                        <span :class="scrolled ? 'text-slate-500' : 'text-slate-200'" class="text-xs font-medium tracking-wide transition-colors">Kabupaten Subang</span>
                    </div>
                </div>
                
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#beranda" :class="scrolled ? 'text-slate-600 hover:text-blue-900' : 'text-slate-100 hover:text-white'" class="font-medium transition text-sm uppercase tracking-wider">Beranda</a>
                    <a href="#profil" :class="scrolled ? 'text-slate-600 hover:text-blue-900' : 'text-slate-100 hover:text-white'" class="font-medium transition text-sm uppercase tracking-wider">Profil</a>
                    <a href="#edukasi" :class="scrolled ? 'text-slate-600 hover:text-blue-900' : 'text-slate-100 hover:text-white'" class="font-medium transition text-sm uppercase tracking-wider">Edukasi</a>
                    <a href="{{ route('login') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-full font-semibold text-sm transition shadow-lg shadow-blue-900/20">
                        Login Petugas
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <section id="beranda" class="relative min-h-screen flex items-center justify-center bg-slate-900 overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?q=80&w=1470&auto=format&fit=crop" class="w-full h-full object-cover opacity-40">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/80 to-transparent"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 text-center mt-10">
            <div class="inline-block px-4 py-1 mb-4 rounded-full bg-blue-800/50 border border-blue-700 text-blue-200 text-sm font-medium backdrop-blur-sm animate-fade-in-down">
                Selamat Datang di Portal Resmi
            </div>
            <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-6 leading-tight tracking-tight">
                Sistem Informasi Terpadu <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-300">Perlindungan Anak</span>
            </h1>
            <p class="text-lg md:text-xl text-slate-300 mb-10 max-w-3xl mx-auto font-light leading-relaxed">
                Platform digital resmi KPAD Kabupaten Subang untuk pelaporan, pemantauan, dan edukasi terkait perlindungan anak. 
                Kami hadir memberikan rasa aman dengan kerahasiaan terjamin.
            </p>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="#lapor" class="group relative px-8 py-4 bg-orange-600 hover:bg-orange-500 rounded-xl text-white font-bold text-lg shadow-xl shadow-orange-900/30 transition-all transform hover:-translate-y-1 overflow-hidden">
                    <div class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-700"></div>
                    <span class="flex items-center gap-3">
                        <i class="fa-solid fa-shield-halved"></i> BUAT PELAPORAN
                    </span>
                </a>
                
                <div class="relative w-full sm:w-auto">
                    <div class="flex bg-white/10 backdrop-blur-md border border-white/20 rounded-xl overflow-hidden p-1">
                        <form action="{{ route('lapor.lacak') }}" method="GET" class="relative w-full sm:w-auto">
                            <div class="flex bg-white/10 backdrop-blur-md border border-white/20 rounded-xl overflow-hidden p-1">
                                <input type="text" name="tiket" placeholder="Punya Kode Tiket?" class="bg-transparent border-none text-white placeholder-slate-400 focus:ring-0 w-full sm:w-64 px-4 py-3">
                                <button type="submit" class="bg-slate-700 hover:bg-slate-600 text-white px-6 py-2 rounded-lg font-medium transition">
                                    Cek
                                </button>
                            </div>
                        </form>
                            Cek
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="mt-12 grid grid-cols-2 md:grid-cols-4 gap-6 text-white/80 border-t border-white/10 pt-8">
                <div class="text-center">
                    <div class="text-2xl font-bold text-white">24/7</div>
                    <div class="text-xs uppercase tracking-widest text-slate-400">Layanan Aktif</div>
                </div>
                <div class="text-center">
                    <div class="text-2xl font-bold text-white">100%</div>
                    <div class="text-xs uppercase tracking-widest text-slate-400">Rahasia Terjamin</div>
                </div>
                <div class="text-center">
                    <div class="text-2xl font-bold text-white">GRATIS</div>
                    <div class="text-xs uppercase tracking-widest text-slate-400">Biaya Layanan</div>
                </div>
                <div class="text-center">
                    <div class="text-2xl font-bold text-white">Respon</div>
                    <div class="text-xs uppercase tracking-widest text-slate-400">Cepat Tanggap</div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-slate-900">Statistik Penanganan</h2>
                <div class="h-1 w-20 bg-blue-600 mx-auto mt-4 rounded-full"></div>
                <p class="text-slate-600 mt-4">Transparansi kinerja kami dalam menangani kasus anak di Kabupaten Subang.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="p-8 bg-blue-50 rounded-2xl border border-blue-100 hover:shadow-lg transition text-center group">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-100 text-blue-600 rounded-full mb-4 group-hover:scale-110 transition">
                        <i class="fa-solid fa-file-import text-2xl"></i>
                    </div>
                    <h3 class="text-4xl font-extrabold text-blue-900 mb-2">12</h3>
                    <p class="text-blue-700 font-medium">Laporan Masuk</p>
                </div>
                <div class="p-8 bg-orange-50 rounded-2xl border border-orange-100 hover:shadow-lg transition text-center group">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-orange-100 text-orange-600 rounded-full mb-4 group-hover:scale-110 transition">
                        <i class="fa-solid fa-person-digging text-2xl"></i>
                    </div>
                    <h3 class="text-4xl font-extrabold text-orange-900 mb-2">5</h3>
                    <p class="text-orange-700 font-medium">Sedang Ditangani</p>
                </div>
                <div class="p-8 bg-green-50 rounded-2xl border border-green-100 hover:shadow-lg transition text-center group">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-green-100 text-green-600 rounded-full mb-4 group-hover:scale-110 transition">
                        <i class="fa-solid fa-circle-check text-2xl"></i>
                    </div>
                    <h3 class="text-4xl font-extrabold text-green-900 mb-2">7</h3>
                    <p class="text-green-700 font-medium">Kasus Selesai</p>
                </div>
            </div>
        </div>
    </section>

    <section id="edukasi" class="py-20 bg-slate-50 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-10">
                <div>
                    <span class="text-blue-600 font-bold uppercase tracking-wider text-sm">Pusat Informasi</span>
                    <h2 class="text-3xl font-bold text-slate-900 mt-2">Edukasi & Berita</h2>
                </div>
                <a href="#" class="hidden md:flex items-center gap-2 text-blue-600 font-semibold hover:text-blue-800 transition">
                    Lihat Semua <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>

            <div x-data="{ 
                activeSlide: 0,
                slides: [
                    { title: 'Stop Bullying di Sekolah!', desc: 'Kenali tanda-tanda perundungan dan cara melaporkannya.', img: 'https://img.freepik.com/free-vector/stop-bullying-concept-illustration_114360-4065.jpg' },
                    { title: 'Hak Anak dalam Keluarga', desc: 'Setiap anak berhak mendapatkan kasih sayang dan perlindungan.', img: 'https://img.freepik.com/free-vector/happy-family-concept-illustration_114360-1288.jpg' },
                    { title: 'Bahaya Gadget Berlebih', desc: 'Lindungi anak dari dampak negatif kecanduan internet.', img: 'https://img.freepik.com/free-vector/kids-online-education-concept-illustration_114360-6395.jpg' }
                ],
                next() { this.activeSlide = (this.activeSlide === this.slides.length - 1) ? 0 : this.activeSlide + 1 },
                prev() { this.activeSlide = (this.activeSlide === 0) ? this.slides.length - 1 : this.activeSlide - 1 }
            }" class="relative">
                
                <div class="overflow-hidden rounded-2xl shadow-xl bg-white aspect-video md:aspect-[21/9] relative group">
                    <template x-for="(slide, index) in slides" :key="index">
                        <div x-show="activeSlide === index" 
                             x-transition:enter="transition ease-out duration-500"
                             x-transition:enter-start="opacity-0 transform scale-105"
                             x-transition:enter-end="opacity-100 transform scale-100"
                             x-transition:leave="transition ease-in duration-300"
                             x-transition:leave-start="opacity-100"
                             x-transition:leave-end="opacity-0"
                             class="absolute inset-0 w-full h-full">
                            
                            <img :src="slide.img" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-transparent to-transparent opacity-90"></div>
                            
                            <div class="absolute bottom-0 left-0 p-8 md:p-12 text-white max-w-2xl">
                                <span class="bg-blue-600 text-xs font-bold px-3 py-1 rounded-full uppercase mb-3 inline-block">Artikel Terbaru</span>
                                <h3 x-text="slide.title" class="text-2xl md:text-4xl font-bold mb-3"></h3>
                                <p x-text="slide.desc" class="text-slate-200 text-lg"></p>
                                <button class="mt-6 px-6 py-2 border border-white rounded-lg hover:bg-white hover:text-blue-900 transition font-medium">Baca Selengkapnya</button>
                            </div>
                        </div>
                    </template>

                    <button @click="prev()" class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/20 hover:bg-white/40 backdrop-blur-md text-white p-3 rounded-full transition opacity-0 group-hover:opacity-100">
                        <i class="fa-solid fa-chevron-left text-xl"></i>
                    </button>
                    <button @click="next()" class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/20 hover:bg-white/40 backdrop-blur-md text-white p-3 rounded-full transition opacity-0 group-hover:opacity-100">
                        <i class="fa-solid fa-chevron-right text-xl"></i>
                    </button>
                </div>

                <div class="flex justify-center gap-3 mt-6">
                    <template x-for="(slide, index) in slides" :key="index">
                        <button @click="activeSlide = index" 
                                :class="activeSlide === index ? 'w-8 bg-blue-600' : 'w-2 bg-slate-300'"
                                class="h-2 rounded-full transition-all duration-300"></button>
                    </template>
                </div>
            </div>
        </div>
    </section>

    <section id="profil" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-center gap-12">
                <div class="w-full md:w-1/2">
                    <div class="relative rounded-2xl overflow-hidden shadow-2xl rotate-2 hover:rotate-0 transition duration-500">
                        <img src="https://images.unsplash.com/photo-1577415124269-fc1140a69e91?q=80&w=1000&auto=format&fit=crop" class="w-full object-cover h-[400px]" alt="Office">
                        <div class="absolute inset-0 bg-blue-900/20"></div>
                    </div>
                </div>
                <div class="w-full md:w-1/2">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-12 h-1 bg-orange-500"></div>
                        <span class="text-orange-600 font-bold uppercase tracking-wide text-sm">Tentang KPAD Subang</span>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-6 leading-snug">
                        Komisi Perlindungan Anak Daerah <br>Kabupaten Subang
                    </h2>
                    <p class="text-slate-600 text-lg mb-6 leading-relaxed text-justify">
                        Lembaga independen yang bertugas melakukan pengawasan penyelenggaraan perlindungan anak di Kabupaten Subang. 
                        Kami berkomitmen untuk menjamin terpenuhinya hak-hak anak agar dapat hidup, tumbuh, berkembang, dan berpartisipasi secara optimal.
                    </p>
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-center gap-3 text-slate-700">
                            <i class="fa-solid fa-check-circle text-green-500"></i>
                            <span>Pengawasan perlindungan anak terpadu</span>
                        </li>
                        <li class="flex items-center gap-3 text-slate-700">
                            <i class="fa-solid fa-check-circle text-green-500"></i>
                            <span>Menerima pengaduan masyarakat</span>
                        </li>
                        <li class="flex items-center gap-3 text-slate-700">
                            <i class="fa-solid fa-check-circle text-green-500"></i>
                            <span>Mediasi sengketa hak anak</span>
                        </li>
                    </ul>
                    <a href="#" class="text-blue-700 font-semibold hover:underline">Baca Profil Selengkapnya &rarr;</a>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-slate-900 text-white pt-16 pb-8 border-t-4 border-orange-500">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
                <div class="md:col-span-1">
                    <div class="flex items-center gap-3 mb-6">
                        <img src="{{ asset('img/logo.png') }}" onerror="this.src='https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/Lambang_Kabupaten_Subang.png/432px-Lambang_Kabupaten_Subang.png'" class="h-12 w-auto bg-white rounded-full p-1" alt="Logo">
                        <div>
                            <div class="font-bold text-xl">SITPA</div>
                            <div class="text-xs text-slate-400">KPAD Kab. Subang</div>
                        </div>
                    </div>
                    <p class="text-slate-400 text-sm leading-relaxed mb-6">
                        Sistem Informasi Terpadu Perlindungan Anak. Melayani dengan hati, melindungi generasi penerus bangsa.
                    </p>
                    <div class="flex gap-4">
                        <a href="#" class="w-8 h-8 flex items-center justify-center rounded bg-slate-800 hover:bg-blue-600 transition"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#" class="w-8 h-8 flex items-center justify-center rounded bg-slate-800 hover:bg-pink-600 transition"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#" class="w-8 h-8 flex items-center justify-center rounded bg-slate-800 hover:bg-red-600 transition"><i class="fa-brands fa-youtube"></i></a>
                    </div>
                </div>

                <div class="md:col-span-1">
                    <h3 class="text-lg font-bold mb-6 text-white border-b border-slate-700 pb-2 inline-block">Hubungi Kami</h3>
                    <ul class="space-y-4 text-sm text-slate-300">
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-location-dot mt-1 text-orange-500"></i>
                            <span>Jl. Jenderal Ahmad Yani No. 12, Pasirkareumbi, Kec. Subang, Kabupaten Subang, Jawa Barat 41211</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fa-solid fa-phone text-orange-500"></i>
                            <span>(0260) 123-4567</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fa-solid fa-envelope text-orange-500"></i>
                            <span>pengaduan@kpad-subang.go.id</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fa-brands fa-whatsapp text-green-500 text-lg"></i>
                            <span class="text-green-400 font-bold">+62 812-3456-7890</span>
                        </li>
                    </ul>
                </div>

                <div class="md:col-span-1">
                    <h3 class="text-lg font-bold mb-6 text-white border-b border-slate-700 pb-2 inline-block">Akses Cepat</h3>
                    <ul class="space-y-3 text-sm text-slate-300">
                        <li><a href="#" class="hover:text-orange-400 transition">Prosedur Pelaporan</a></li>
                        <li><a href="#" class="hover:text-orange-400 transition">Cek Status Tiket</a></li>
                        <li><a href="#" class="hover:text-orange-400 transition">Artikel Edukasi</a></li>
                        <li><a href="#" class="hover:text-orange-400 transition">Unduh Dokumen</a></li>
                        <li><a href="{{ route('login') }}" class="hover:text-orange-400 transition">Login Internal</a></li>
                    </ul>
                </div>

                <div class="md:col-span-1">
                    <h3 class="text-lg font-bold mb-6 text-white border-b border-slate-700 pb-2 inline-block">Jam Pelayanan</h3>
                    <ul class="space-y-2 text-sm text-slate-300">
                        <li class="flex justify-between">
                            <span>Senin - Kamis</span>
                            <span class="font-bold">08.00 - 16.00</span>
                        </li>
                        <li class="flex justify-between">
                            <span>Jumat</span>
                            <span class="font-bold">08.00 - 16.30</span>
                        </li>
                        <li class="flex justify-between text-orange-400 mt-2">
                            <span>Sabtu - Minggu</span>
                            <span class="font-bold">Tutup</span>
                        </li>
                    </ul>
                    <div class="mt-6 p-4 bg-orange-600/20 border border-orange-500/50 rounded-lg">
                        <p class="text-xs text-orange-200 text-center italic">"Untuk kasus darurat, silakan hubungi Hotline WA 24 Jam kami."</p>
                    </div>
                </div>
            </div>

            <div class="border-t border-slate-800 pt-8 text-center text-slate-500 text-sm">
                <p>&copy; 2024 SITPA KPAD Kabupaten Subang. Developed for PKM by <span class="text-slate-400">Tim Syncore</span>.</p>
            </div>
        </div>
    </footer>

</body>
</html>