<x-layout title="Evaluasi Kinerja">
    <x-component.card>
        <x-component.datatables id="perawat">
            <thead>
                <th>#</th>
                <th>NIP</th>
                <th>Nama</th>
                @foreach ($daftarKriteria as $kriteria)
                    <th>{{ $kriteria->nama }}</th>
                @endforeach
                <th></th>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->nip }}</td>
                        <td>{{ $user->nama }}</td>
                        @foreach ($daftarKriteria as $kriteria)
                            <td>
                                @if ($user->evaluasi($kriteria->id))
                                    {{ $user->evaluasi($kriteria->id)->bobot }}
                                @else
                                    -
                                @endif
                            </td>
                        @endforeach
                        <td class="text-center">
                            <x-component.button :small="true" navigate="{{ route('admin.evaluasi.user', $user) }}">
                                Evaluasi
                            </x-component.button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </x-component.datatables>
    </x-component.card>
</x-layout>
