<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PemeriksaanBayiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'pemeriksaan_id' => 1,
                'lingkar_kepala' => 13.3,
                'lingkar_lengan' => 5.1,
                'asi' => 'iya',
                'kategori_golongan' => 'batita',
            ], [
                'pemeriksaan_id' => 2,
                'lingkar_kepala' => 14.3,
                'lingkar_lengan' => 6.5,
                'asi' => 'iya',
                'kategori_golongan' => 'batita',
            ], [
                'pemeriksaan_id' => 3,
                'lingkar_kepala' => 10.3,
                'lingkar_lengan' => 7.3,
                'asi' => 'tidak',
                'kategori_golongan' => 'baduta',
            ], [
                'pemeriksaan_id' => 4,
                'lingkar_kepala' => 11.3,
                'lingkar_lengan' => 8.3,
                'asi' => 'tidak',
                'kategori_golongan' => 'baduta',
            ], [
                'pemeriksaan_id' => 5,
                'lingkar_kepala' => 12.7,
                'lingkar_lengan' => 8.1,
                'asi' => 'tidak',
                'kategori_golongan' => 'batita',
            ], [
                'pemeriksaan_id' => 6,
                'lingkar_kepala' => 13.3,
                'lingkar_lengan' => 9.1,
                'asi' => 'iya',
                'kategori_golongan' => 'batita',
            ], [
                'pemeriksaan_id' => 7,
                'lingkar_kepala' => 14.3,
                'lingkar_lengan' => 9.5,
                'asi' => 'iya',
                'kategori_golongan' => 'balita',
            ], [
                'pemeriksaan_id' => 8,
                'lingkar_kepala' => 15.1,
                'lingkar_lengan' => 9.8,
                'asi' => 'tidak',
                'kategori_golongan' => 'balita',
            ], [
                'pemeriksaan_id' => 9,
                'lingkar_kepala' => 20.3,
                'lingkar_lengan' => 9.3,
                'asi' => 'tidak',
                'kategori_golongan' => 'balita',
            ], [
                'pemeriksaan_id' => 10,
                'lingkar_kepala' => 21.7,
                'lingkar_lengan' => 10.1,
                'asi' => 'tidak',
                'kategori_golongan' => 'balita',
            ], [
                'pemeriksaan_id' => 11,
                'lingkar_kepala' => 17.3,
                'lingkar_lengan' => 8.3,
                'asi' => 'tidak',
                'kategori_golongan' => 'batita',
            ], [
                'pemeriksaan_id' => 12,
                'lingkar_kepala' => 17.7,
                'lingkar_lengan' => 9.3,
                'asi' => 'tidak',
                'kategori_golongan' => 'batita',
            ], [
                'pemeriksaan_id' => 13,
                'lingkar_kepala' => 18.7,
                'lingkar_lengan' => 10.1,
                'asi' => 'tidak',
                'kategori_golongan' => 'batita',
            ],
        ];

        DB::table('pemeriksaan_bayis')->insert($data);
    }
}
