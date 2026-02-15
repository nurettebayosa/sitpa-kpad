<x-app-layout>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 rounded-xl shadow-lg">
                <h2 class="text-2xl font-bold mb-6">Tambah User Baru</h2>
                <form action="{{ route('admin.users.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block font-bold mb-2">Nama Lengkap</label>
                        <input type="text" name="name" required class="w-full rounded-lg border-gray-300">
                    </div>
                    <div class="mb-4">
                        <label class="block font-bold mb-2">Email</label>
                        <input type="email" name="email" required class="w-full rounded-lg border-gray-300">
                    </div>
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block font-bold mb-2">Password</label>
                            <input type="password" name="password" required class="w-full rounded-lg border-gray-300">
                        </div>
                        <div>
                            <label class="block font-bold mb-2">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" required class="w-full rounded-lg border-gray-300">
                        </div>
                    </div>
                    <div class="mb-6">
                        <label class="block font-bold mb-2">Role / Jabatan</label>
                        <select name="role" class="w-full rounded-lg border-gray-300">
                            <option value="staf">Staf (Petugas Lapangan)</option>
                            <option value="admin">Admin (Super User)</option>
                        </select>
                    </div>
                    <button type="submit" class="bg-green-600 text-white px-6 py-3 rounded-lg font-bold hover:bg-green-700 w-full">Simpan User</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>