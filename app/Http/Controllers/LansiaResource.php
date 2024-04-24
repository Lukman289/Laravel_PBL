<?php

namespace App\Http\Controllers;

use App\Models\Pemeriksaan;
use App\Models\PemeriksaanLansia;
use App\Models\Penduduk;
use Illuminate\Http\Request;

class LansiaResource extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Pemeriksaan Lansia'
        ];

        $activeMenu = 'lansia';

        /**
         * Retrieve data for filter feature
         */
        $penduduks = Pemeriksaan::with('penduduk')->where('golongan', 'lansia')->get();

        return view('kader.lansia.index', ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu, 'penduduks' => $penduduks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Pemeriksaan Lansia'
        ];

        $activeMenu = 'lansia';

        return view('kader.lansia.tambah', ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $lansiaData = Pemeriksaan::with('pemeriksaan_lansia', 'penduduk')->find($id);

        $breadcrumb = (object)[
            'title' => 'Pemeriksaan Lansia'
        ];

        $activeMenu = 'lansia';

        return view('kader.lansia.detail', ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu, 'lansiaData' => $lansiaData]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $lansiaData = Pemeriksaan::with('pemeriksaan_lansia', 'penduduk')->find($id);

        $breadcrumb = (object)[
            'title' => 'Pemeriksaan Lansia'
        ];

        $activeMenu = 'lansia';

        return view('kader.lansia.edit', ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu, 'lansiaData' => $lansiaData]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $check = Pemeriksaan::find($id);
        if(!$check) {
            return redirect()->intended('kader/lansia')->with('error', 'Data pemeriksaan lansia tidak ditemukan');
        }

        try {
            /**
             * delete pemeriksaans column that also cascade to pemeriksaan_lansias column, because we use cascadeOnDelete() in migration
             */
            Pemeriksaan::destroy($id);

            return redirect()->intended('kader/lansia')->with('success', 'Data pemeriksaan lansia berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->intended('kader/lansia')->with('error', 'Data pemeriksaan lansia gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}
