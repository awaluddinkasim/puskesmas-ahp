<?php

return [
    'admin' => [
        [
            'active-segment' => 'dashboard',
            'label' => 'Dashboard',
            'route-name' => 'admin.dashboard',
            'icon' => 'home',
        ],
        [
            'active-segment' => 'ahp',
            'label' => 'Konfigurasi AHP',
            'submenu' => [
                [
                    'active-segment' => 'kriteria',
                    'label' => 'Kriteria',
                    'route-name' => 'admin.ahp.kriteria',
                ],
                [
                    'active-segment' => 'perbandingan',
                    'label' => 'Perbandingan Kriteria',
                    'route-name' => 'admin.ahp.perbandingan',
                ],
            ],
            'icon' => 'cpu',
        ],
        [
            'active-segment' => 'perawat',
            'label' => 'Manajemen Perawat',
            'route-name' => 'admin.perawat',
            'icon' => 'user',
        ],
        [
            'active-segment' => 'pasien',
            'label' => 'Pengurusan Pasien',
            'submenu' => [
                [
                    'active-segment' => 'list',
                    'label' => 'List Pasien',
                    'route-name' => 'admin.pasien.list',
                ],
                [
                    'active-segment' => 'create',
                    'label' => 'Tambah Pasien',
                    'route-name' => 'admin.pasien.create',
                ],
                [
                    'active-segment' => 'penanganan',
                    'label' => 'Penanganan Pasien',
                    'route-name' => 'admin.pasien.penanganan',
                ],
            ],
            'icon' => 'users',
        ],
        [
            'active-segment' => 'absensi',
            'label' => 'Absensi',
            'route-name' => 'admin.absensi',
            'icon' => 'clipboard',
        ],
        [
            'active-segment' => 'evaluasi',
            'label' => 'Evaluasi Kinerja',
            'route-name' => 'admin.evaluasi',
            'icon' => 'check-square',
        ],
        [
            'active-segment' => 'perawat-terbaik',
            'label' => 'Perawat Terbaik',
            'route-name' => 'admin.result',
            'icon' => 'bar-chart-2',
        ],
    ],

    'user' => [
        [
            'active-segment' => 'dashboard',
            'label' => 'Dashboard',
            'route-name' => 'dashboard',
            'icon' => 'home',
        ],
    ],
];
