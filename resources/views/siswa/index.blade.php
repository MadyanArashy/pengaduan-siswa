    <x-app-layout :role="Auth::user()->role">
    <x-table>
    <tbody>
    @foreach ($siswas as $siswa)


    <tr class="border-b dark:border-gray-700">
    <td class="px-4 py-3">{{ $loop->iteration }}</td>
    <td class="px-4 py-3 text-nowrap">{{ $siswa->pelapor}}</td>
    <td class="px-4 py-3 text-nowrap">{{ $siswa->terlapor}}</td>
    <td class="px-4 py-3 text-nowrap">{{ $siswa->kelas}}</td>
    <td class="px-4 py-3">{{ $siswa->laporan}}</td>
    <td class="px-4 py-3">
        <img src="storage/{{ $siswa->foto }}" alt="Tidak ditemukan" width="150">
    </td>
    <td class="px-4 py-3">
        <span class="badge text-gray-50 px-4 py-2 rounded-full select-none text-nowrap
        @ts-ignore
            @if ($siswa->status == 'Belum Di Baca') bg-red-900
            @elseif ($siswa->status == 'Sedang Di Tinjau') bg-yellow-600
            @elseif ($siswa->status == 'Selesai Di Koreksi') bg-green-900
            @else bg-gray-400 @endif">
            {{ $siswa->status }}
        </span>
    </td>
    </tr>

    @endforeach
    </tbody>
    </x-table>
    </x-app-layout>
