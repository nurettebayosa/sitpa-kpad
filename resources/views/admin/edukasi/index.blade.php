<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex justify-between mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Artikel Edukasi</h2>
                    <a href="{{ route('admin.edukasi.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg font-bold hover:bg-blue-700">+ Tulis Artikel</a>
                </div>

                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="bg-gray-50 text-gray-700 uppercase">
                        <tr>
                            <th class="px-6 py-3">Gambar</th>
                            <th class="px-6 py-3">Judul</th>
                            <th class="px-6 py-3">Penulis</th>
                            <th class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($edukasi as $item)
                        <tr class="border-b">
                            <td class="px-6 py-4">
                                <img src="{{ asset($item->gambar) }}" class="w-16 h-10 object-cover rounded">
                            </td>
                            <td class="px-6 py-4 font-bold">{{ $item->judul }}</td>
                            <td class="px-6 py-4">{{ $item->penulis }}</td>
                            <td class="px-6 py-4">
                                <form action="{{ route('admin.edukasi.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus artikel ini?')">
                                    @csrf @method('DELETE')
                                    <button class="text-red-600 hover:underline">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>