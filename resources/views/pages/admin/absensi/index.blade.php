<x-layout title="Absensi">
    <x-component.card>
        <x-component.table>
            <thead>
                <tr>
                    <th rowspan="2" style="vertical-align: center;">#</th>
                    <th rowspan="2">NIP</th>
                    <th rowspan="2">Nama</th>
                    <th colspan="{{ count($dates) }}" class="text-center">Tanggal</th>
                </tr>
                <tr>
                    @foreach ($dates as $date)
                        <th class="text-center">{{ $date }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->nip }}</td>
                        <td>{{ $user->nama }}</td>
                        @foreach ($dates as $date)
                            <td class="text-center">
                                @if ($user->cekAbsensi($date))
                                    @if ($user->cekAbsensi($date)->status == 'Terlambat')
                                        <span class="text-warning">T</span>
                                    @else
                                        <span class="text-success">H</span>
                                    @endif
                                @else
                                    <span class="text-danger">A</span>
                                @endif
                            </td>
                        @endforeach
                    </tr>
                @empty
                    <tr>
                        <td colspan="{{ count($dates) + 3 }}" class="text-center text-muted">Tidak ada data</td>
                    </tr>
                @endforelse
        </x-component.table>
    </x-component.card>
</x-layout>
