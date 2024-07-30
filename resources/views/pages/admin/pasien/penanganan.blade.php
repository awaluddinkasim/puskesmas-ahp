<x-layout title="Penanganan Pasien">
    <x-component.card>
        <x-component.datatables id="penanganan">
            <thead>
                <th>#</th>
                <th>Nama Pasien</th>
                <th>Perawat</th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($daftarPasien as $pasien)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pasien->nama }}</td>
                        <td>{{ $pasien->perawat->nama }}</td>
                        <td class="text-center">
                            <x-component.button :small="true">
                                Detail
                            </x-component.button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </x-component.datatables>
    </x-component.card>
</x-layout>
