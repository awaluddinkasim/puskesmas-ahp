<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\Evaluasi;
use App\Models\Kriteria;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AbsensiController extends BaseController
{
    public function index(): View
    {
        return view('pages.user.absensi.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'img' => 'required|image',
        ]);

        $now = Carbon::now();

        $img = $request->file('img');
        $name = time() . '.' . $img->extension();
        $img->move(public_path('absensi'), $name);

        $absensi = new Absensi();
        $absensi->user_id = auth()->user()->id;
        $absensi->date = Carbon::today();
        $absensi->time_in = $now;
        $absensi->img = $name;
        if ($now->gt(Carbon::parse('08:00:00'))) {
            $absensi->status = 'Terlambat';
        } else {
            $absensi->status = 'Hadir';
        }
        $absensi->save();



        $kriteria = Kriteria::where('nama', 'Kehadiran')->first();
        $evaluasi = Evaluasi::where('user_id', auth()->user()->id)->where('kriteria_id', $kriteria->id)->first();

        $dayCount = Carbon::now()->daysInMonth;
        $persentaseKehadiran = auth()->user()->absensi->count() / $dayCount;

        if ($evaluasi) {
            $evaluasi->bobot = 1 * $persentaseKehadiran;
            $evaluasi->update();
        } else {
            $evaluasi = new Evaluasi();
            $evaluasi->user_id = auth()->user()->id;
            $evaluasi->kriteria_id = $kriteria->id;
            $evaluasi->bobot = 1 * $persentaseKehadiran;
            $evaluasi->save();
        }

        return $this->redirectBack([
            'status' => 'success',
            'message' => 'Berhasil',
        ]);
    }
}
