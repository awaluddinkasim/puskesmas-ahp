<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Evaluasi;
use App\Models\Kriteria;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EvaluasiController extends BaseController
{

    public function index(): View
    {
        return view('pages.admin.evaluasi.index', [
            'users' => User::all(),
            'daftarKriteria' => Kriteria::orderBy('kode')->get(),
        ]);
    }

    public function evaluasi(User $user): View
    {
        return view('pages.admin.evaluasi.user', [
            'user' => $user,
            'daftarKriteria' => Kriteria::orderBy('kode')->get(),
        ]);
    }

    public function store(Request $request, User $user): RedirectResponse
    {
        foreach ($request->fields as $id => $value) {
            $cek = Evaluasi::where('user_id', $user->id)->where('kriteria_id', $id)->first();
            if ($cek) {
                $cek->bobot = $value;
                $cek->update();
            } else {
                $evaluasi = new Evaluasi();
                $evaluasi->user_id = $user->id;
                $evaluasi->kriteria_id = $id;
                $evaluasi->bobot = $value;
                $evaluasi->save();
            }
        }

        return $this->redirect(route('admin.evaluasi'), [
            'status' => 'success',
            'message' => 'Berhasil',
        ]);
    }
}
