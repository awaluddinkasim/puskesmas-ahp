<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\KriteriaPerbandingan;

class MatrixKriteria extends Component
{
    public $daftarKriteria;

    public $daftarPerbandingan;

    public $curr;

    public function mount()
    {
        $this->daftarPerbandingan = KriteriaPerbandingan::all();
    }

    public function perbandingan($value, $index)
    {
        $perbandingan = $this->daftarPerbandingan[$index];
        $perbandingan->bobot_kolom = $value;
        $perbandingan->bobot_baris = 1 / $value;
        $perbandingan->save();

        $this->daftarPerbandingan = KriteriaPerbandingan::all();
    }
    public function render()
    {
        return view('livewire.matrix-kriteria');
    }
}
