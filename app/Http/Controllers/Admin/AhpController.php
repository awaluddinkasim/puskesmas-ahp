<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kriteria;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\KriteriaPerbandingan;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\BaseController;

class AhpController extends BaseController
{
    public function kriteria(): View
    {
        return view('pages.admin.ahp.kriteria', [
            'daftarKriteria' => Kriteria::all(),
        ]);
    }

    public function storeKriteria(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'kode' => 'required',
            'nama' => 'required',
        ]);

        Kriteria::create($data);

        return $this->redirectBack([
            'status' => 'success',
            'message' => 'Kriteria baru ditambahkan',
        ]);
    }

    public function deleteKriteria(Kriteria $kriteria): RedirectResponse
    {
        $kriteria->delete();

        return $this->redirectBack([
            'status' => 'success',
            'message' => 'Kriteria dihapus',
        ]);
    }

    public function perbandingan(): View
    {
        return view('pages.admin.ahp.perbandingan', [
            'daftarKriteria' => Kriteria::orderBy('kode')->get(),

        ]);
    }

    public function storePerbandingan(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'kriteria' => 'required',
        ]);

        KriteriaPerbandingan::truncate();

        foreach ($data['kriteria'] as $kodeKolom => $kolom) {
            foreach ($kolom as $kodeBaris => $nilai) {
                if ($kodeKolom < $kodeBaris) {
                    $idBaris = Kriteria::where('kode', $kodeBaris)->first()->id;
                    $idKolom = Kriteria::where('kode', $kodeKolom)->first()->id;

                    KriteriaPerbandingan::create([
                        'kriteria_baris' => $idBaris,
                        'kriteria_kolom' => $idKolom,
                        'bobot_baris' => 1 / $nilai,
                        'bobot_kolom' => $nilai,
                    ]);
                }
            }
        }

        return $this->redirectBack([
            'status' => 'success',
            'message' => 'Perbandingan baru ditambahkan',
        ]);
    }
}
