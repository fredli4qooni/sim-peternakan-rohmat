<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen Pengguna') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-bold text-gray-700">Daftar Pengguna Sistem</h3>
                        <a href="{{ route('users.create') }}" class="bg-primary-500 hover:bg-primary-600 text-white font-bold py-2 px-4 rounded shadow">
                            Tambah Pengguna
                        </a>
                    </div>

                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('error') }}</span>
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-100 text-gray-700">
                                    <th class="py-3 px-4 border-b">Nama Lengkap</th>
                                    <th class="py-3 px-4 border-b">Email</th>
                                    <th class="py-3 px-4 border-b">Peran (Role)</th>
                                    <th class="py-3 px-4 border-b">Tgl Didaftarkan</th>
                                    <th class="py-3 px-4 border-b text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr class="hover:bg-gray-50 border-b">
                                    <td class="py-3 px-4">{{ $user->name }}</td>
                                    <td class="py-3 px-4 text-blue-600">{{ $user->email }}</td>
                                    <td class="py-3 px-4">
                                        <span class="px-2 py-1 text-xs font-bold rounded-full 
                                            {{ $user->role === 'pemilik' ? 'bg-purple-100 text-purple-700' : ($user->role === 'admin' ? 'bg-blue-100 text-blue-700' : 'bg-gray-100 text-gray-700') }}">
                                            {{ strtoupper($user->role) }}
                                        </span>
                                    </td>
                                    <td class="py-3 px-4">{{ $user->created_at->format('d M Y') }}</td>
                                    <td class="py-3 px-4 flex space-x-2 justify-center">
                                        <a href="{{ route('users.edit', $user->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin menghapus pengguna ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700 px-2" {{ auth()->id() === $user->id ? 'disabled class=opacity-50' : '' }}>Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
