<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Kelola Informasi'
        ];

        $activeMenu = 'info';

        return view('kader.informasi.index', ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu]);
    }

    public function tambahArtikel()
    {
        $breadcrumb = (object) [
            'title' => 'Kelola Informasi'
        ];

        $activeMenu = 'info';

        return view('kader.informasi.artikel.tambahArtikel', ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu]);
    }

    public function tambahKegiatan()
    {
        $breadcrumb = (object) [
            'title' => 'Kelola Informasi'
        ];

        $activeMenu = 'info';

        return view('kader.informasi.kegiatan.tambahKegiatan', ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu]);
    }

    public function listKegiatan()
    {
        $breadcrumb = (object) [
            'title' => 'Kelola Informasi'
        ];

        $activeMenu = 'info';

        return view('kader.informasi.kegiatan.list', ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu]);
    }

    public function listArtikel()
    {
        $breadcrumb = (object) [
            'title' => 'Kelola Informasi'
        ];

        $activeMenu = 'info';

        return view('kader.informasi.artikel.list', ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu]);
    }
    
    public function lihatArtikel()
    {
        $breadcrumb = (object) [
            'title' => 'Kelola Informasi'
        ];

        $activeMenu = 'info';

        return view('kader.informasi.artikel.detail', ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu]);
    }
}