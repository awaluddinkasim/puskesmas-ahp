<x-layout title="Evaluasi Kinerja">
    <x-component.card :title="$user->nama">
        <form action="" method="post">
            @foreach ($daftarKriteria as $kriteria)
                @if ($kriteria->nama != 'Kehadiran')
                    <x-form.radio label="{{ $kriteria->nama }}" name="evaluasi[{{ $kriteria->id }}]" :required="true"
                        :options="[
                            [
                                'label' => 'Sangat Baik',
                                'id' => 'option-1',
                                'value' => '5',
                            ],
                            [
                                'label' => 'Baik',
                                'id' => 'option-2',
                                'value' => '4',
                            ],
                            [
                                'label' => 'Cukup',
                                'id' => 'option-3',
                                'value' => '3',
                            ],
                            [
                                'label' => 'Kurang',
                                'id' => 'option-4',
                                'value' => '2',
                            ],
                            [
                                'label' => 'Sangat Kurang',
                                'id' => 'option-5',
                                'value' => '1',
                            ],
                        ]" />
                @endif
            @endforeach
        </form>
    </x-component.card>
</x-layout>
