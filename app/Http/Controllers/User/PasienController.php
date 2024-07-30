<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PasienController extends Controller
{

    public function index(): View
    {
        return view('pages.user.pasien.index', [
            'daftarPasien' => auth()->user()->pasienYangDitangani,
        ]);
    }
}
