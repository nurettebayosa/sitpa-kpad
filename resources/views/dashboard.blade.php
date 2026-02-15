<x-app-layout>
    <div class="flex h-screen bg-gray-100" x-data="{ sidebarOpen: false }">
        
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed inset-y-0 left-0 z-50 w-64 bg-slate-900 text-white transition-transform duration-300 ease-in-out md:relative md:translate-x-0 shadow-xl">
            <div class="flex items-center justify-center h-16 bg-slate-800 border-b border-slate-700">
                <span class="text-xl font-bold tracking-wider">INTERNAL <span class="text-blue-400">SITPA</span></span>
            </div>

            <nav class="mt-5 px-4 space-y-2">
                <p class="text-xs text-slate-500 uppercase tracking-wider font-bold mb-2">Menu Utama</p>
                
                <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-3 bg-blue-600 text-white rounded-lg transition shadow-lg shadow-blue-900/50">
                    <i class="fa-solid fa-gauge-high w-6"></i>
                    <span class="font-medium">Dashboard</span>
                </a>

                <a href="{{ route('admin.laporan.index') }}" class="flex items-center px-4 py-3 text-slate-300 hover:bg-slate-800 hover:text-white rounded-lg transition">
                    <i class="fa-solid fa-inbox w-6"></i>
                    <span class="font-medium">Laporan Masuk</span>
                    @if(isset($pending) && $pending > 0)
                        <span class="ml-auto bg-red-500 text-white text-xs font-bold px-2 py-0.5 rounded-full">{{ $pending }}</span>
                    @endif
                </a>

                <a href="{{ route('admin.kasus.index') }}" class="flex items-center px-4 py-3 text-slate-300 hover:bg-slate-800 hover:text-white rounded-lg transition">
                    <i class="fa-solid fa-list-check w-6"></i>
                    <span class="font-medium">Kelola Kasus</span>
                </a>

                <a href="{{ route('admin.edukasi.index') }}" class="flex items-center px-4 py-3 text-slate-300 hover:bg-slate-800 hover:text-white rounded-lg transition">
                    <i class="fa-solid fa-graduation-cap w-6"></i>
                    <span class="font-medium">Artikel Edukasi</span>
                </a>

                @if(Auth::user()->role == 'admin')
                <p class="text-xs text-slate-500 uppercase tracking-wider font-bold mt-6 mb-2">Administrator</p>
                <a href="{{ route('admin.users.index') }}" class="flex items-center px-4 py-3 text-slate-300 hover:bg-slate-800 hover:text-white rounded-lg transition">
                    <i class="fa-solid fa-users w-6"></i>
                    <span class="font-medium">Manajemen User</span>
                </a>
                <a href="#" class="flex items-center px-4 py-3 text-slate-300 hover:bg-slate-800 hover:text-white rounded-lg transition">
                    <i class="fa-solid fa-building w-6"></i>
                    <span class="font-medium">Profil Instansi</span>
                </a>
                @endif
            </nav>
        </aside>

        <div class="flex-1 flex flex-col overflow-hidden">
            
            <header class="flex items-center justify-between px-6 py-4 bg-white border-b border-gray-200 md:hidden">
                <button @click="sidebarOpen = !sidebarOpen" class="text-gray-500 focus:outline-none">
                    <i class="fa-solid fa-bars text-2xl"></i>
                </button>
                <span class="font-bold text-gray-700">SITPA Internal</span>
            </header>

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
                
                <h1 class="text-2xl font-bold text-gray-800 mb-6">Overview Statistik</h1>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                    <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-blue-500 flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500 uppercase font-bold">Total Laporan</p>
                            <p class="text-3xl font-bold text-gray-800">{{ $total ?? 0 }}</p>
                        </div>
                        <div class="p-3 bg-blue-100 rounded-full text-blue-600">
                            <i class="fa-solid fa-folder-open text-xl"></i>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-yellow-500 flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500 uppercase font-bold">Perlu Verifikasi</p>
                            <p class="text-3xl font-bold text-yellow-600">{{ $pending ?? 0 }}</p>
                        </div>
                        <div class="p-3 bg-yellow-100 rounded-full text-yellow-600">
                            <i class="fa-solid fa-bell text-xl animate-pulse"></i>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-orange-500 flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500 uppercase font-bold">Sedang Ditangani</p>
                            <p class="text-3xl font-bold text-orange-600">{{ $proses ?? 0 }}</p>
                        </div>
                        <div class="p-3 bg-orange-100 rounded-full text-orange-600">
                            <i class="fa-solid fa-person-running text-xl"></i>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-green-500 flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500 uppercase font-bold">Kasus Selesai</p>
                            <p class="text-3xl font-bold text-green-600">{{ $selesai ?? 0 }}</p>
                        </div>
                        <div class="p-3 bg-green-100 rounded-full text-green-600">
                            <i class="fa-solid fa-check-double text-xl"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center">
                        <h3 class="font-bold text-gray-800">Laporan Terbaru Masuk</h3>
                        <a href="#" class="text-sm text-blue-600 hover:underline">Lihat Semua</a>
                    </div>
                    <div class="p-6 text-center text-gray-500">
                        <p class="italic">Silakan pilih menu "Laporan Masuk" untuk memproses data.</p>
                    </div>
                </div>

            </main>
        </div>
    </div>
</x-app-layout>