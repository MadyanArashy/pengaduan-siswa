<x-app-layout :role="Auth::user()->role">
    <x-table>
        <tbody>
            @foreach ($siswas as $siswa)
            <tr class="border-b dark:border-gray-700">
                <td class="px-4 py-3">{{ $loop->iteration }}</td>
                <td class="px-4 py-3">{{ $siswa->pelapor }}</td>
                <td class="px-4 py-3">{{ $siswa->terlapor }}</td>
                <td class="px-4 py-3">{{ $siswa->kelas }}</td>
                <td class="px-4 py-3">{{ $siswa->laporan }}</td>
                <td class="px-4 py-3">
                    <img src="{{ asset('storage/' . $siswa->foto) }}" alt="Tidak ditemukan" width="150">
                </td>
                <td class="px-4 py-3 flex">
                    <x-dropdown>
                        <x-slot name="trigger">
                            <button class="badge text-gray-50 px-4 py-2 rounded-full flex hover:bg-opacity-80 text-nowrap align-center align-items-center
                                @if ($siswa->status == 'Belum Di Baca') bg-red-900
                                @elseif ($siswa->status == 'Sedang Di Tinjau') bg-yellow-600
                                @elseif ($siswa->status == 'Selesai Di Koreksi') bg-green-900
                                @else bg-gray-400 @endif">
                                {{ $siswa->status }}
                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <form method="POST" action="{{ route('guru.update', $siswa->id) }}">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="
                                    @if ($siswa->status == 'Belum Di Baca') Sedang Di Tinjau
                                    @elseif($siswa->status == 'Sedang Di Tinjau') Selesai Di Koreksi
                                    @else Belum Di Baca @endif
                                ">
                                <button type="submit" class="button px-4 py-2 w-full text-left">
                                    @if ($siswa->status == 'Belum Di Baca') Mulai Meninjau
                                    @elseif($siswa->status == 'Sedang Di Tinjau') Selesai Koreksi
                                    @else Tinjau Ulang @endif
                                </button>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </td>
            </tr>
            @endforeach
        </tbody>
    </x-table>
</x-app-layout>
