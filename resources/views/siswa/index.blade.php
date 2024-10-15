    <x-app-layout :role="Auth::user()->role">
    <x-table>
    <tbody>
    @foreach ($siswas as $siswa)


    <tr class="border-b dark:border-gray-700">
    <td class="px-4 py-3">{{ $loop->iteration }}</td>
    <td class="px-4 py-3">{{ $siswa->pelapor}}</td>
    <td class="px-4 py-3">{{ $siswa->terlapor}}</td>
    <td class="px-4 py-3">{{ $siswa->kelas}}</td>
    <td class="px-4 py-3">{{ $siswa->laporan}}</td>
    <td class="px-4 py-3">
        <img src="storage/{{ $siswa->foto }}" alt="Tidak ditemukan" width="150">
    </td>
    <td class="px-4 py-3">
        <span class="badge text-gray-50 px-4 py-2 rounded-full @if ($siswa->status == 'sedang dalam tinjuan')bg-red-900 @elseif($siswas->status == 'done')badge-success @else badge-gray @endif text-nowrap">
            {{$siswa->status}}
        </span>
    </td>
    </tr>

    @endforeach
    </tbody>
    </x-table>
    </x-app-layout>