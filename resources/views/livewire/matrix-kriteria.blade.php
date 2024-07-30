<x-component.table>
    <thead>
        <th></th>
        @foreach ($daftarKriteria as $kriteria)
            <th>{{ $kriteria->kode }}</th>
        @endforeach
    </thead>
    <tbody class="table-group-divider">
        @foreach ($daftarKriteria as $kriteria)
            <tr>
                <th>{{ $kriteria->kode }}</th>
                @for ($i = 0; $i < count($daftarKriteria); $i++)
                    <td>
                        @php
                            $name = "kriteria[{$kriteria->kode}][{$daftarKriteria[$i]->kode}]";
                            $perbandinganIndex = $i + $loop->index - 1;
                            $perbandingan = $daftarPerbandingan[$perbandinganIndex] ?? null;
                        @endphp

                        @if ($kriteria->kode < $daftarKriteria[$i]->kode)
                            <select name="{{ $name }}" class="form-select"
                                wire:change="perbandingan($event.target.value, {{ $perbandinganIndex }})">
                                @for ($j = 1; $j <= 9; $j++)
                                    <option value="{{ $j }}"
                                        {{ isset($perbandingan) && $j == $perbandingan->bobot_kolom ? 'selected' : '' }}>
                                        {{ $j }}
                                    </option>
                                @endfor
                            </select>
                        @elseif ($kriteria->kode > $daftarKriteria[$i]->kode)
                            <input type="text" class="form-control" name="{{ $name }}"
                                value="{{ isset($perbandingan) ? round($perbandingan->bobot_baris, 3) : 1 }}" readonly>
                        @else
                            <input type="text" class="form-control" name="{{ $name }}" value="1"
                                readonly>
                        @endif
                    </td>
                @endfor
            </tr>
        @endforeach
    </tbody>
</x-component.table>
