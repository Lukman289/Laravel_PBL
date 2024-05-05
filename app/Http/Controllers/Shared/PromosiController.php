<?php

namespace App\Http\Controllers\Shared;

use App\Charts\KunjunganLandingPage;
use App\Http\Controllers\Controller;

class PromosiController extends Controller
{
    public function jadwal()
    {
        $breadcrumb = (object) [
            'title' => 'Jadwal Kegiatan'
        ];

        $activeMenu = 'jadwal';

        return view('promosi.jadwal', ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu]);
    }

    public function profil()
    {
        $breadcrumb = (object) [
            'title' => 'Profil Posyandu'
        ];

        $activeMenu = 'profil';

        return view('promosi.profil', ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu]);
    }

    public function landingpage(KunjunganLandingPage $chart)
    {
        $breadcrumb = (object) [
            'title' => 'Landing Page'
        ];

        $imageUrl = asset('img/background1.jpg');

        $activeMenu = 'berita';

        return view('promosi.landing', ['chart' => $chart->build(), 'breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu, 'imageUrl' => $imageUrl]);
    }
}
