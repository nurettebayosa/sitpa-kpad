<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 rounded-xl shadow-lg">
                <h2 class="text-2xl font-bold mb-6">Tulis Artikel Baru</h2>
                <form action="{{ route('admin.edukasi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label class="block font-bold mb-2">Judul Artikel</label>
                        <input type="text" name="judul" required class="w-full rounded-lg border-gray-300">
                    </div>
                    <div class="mb-4">
                        <label class="block font-bold mb-2">Gambar Sampul</label>
                        <input type="file" name="gambar" required class="w-full border border-gray-300 p-2 rounded-lg">
                    </div>
                    <div class="mb-4">
                        <label class="block font-bold mb-2">Isi Konten</label>
                        <textarea name="konten" rows="10" required class="w-full rounded-lg border-gray-300"></textarea>
                    </div>
                    <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg font-bold hover:bg-blue-700">Terbitkan</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>