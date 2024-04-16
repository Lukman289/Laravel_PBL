<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PendudukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'NIK' => 351008251219950011,
                'NKK' => 351008231654326548,
                'nama' => 'Fauzi Alamsyah',
                'tgl_lahir' => '1995-12-25',
                'pendapatan' => '2000000 - 3000000',
                'no_telp' => '+6289562485621',
                'jenis_kelamin' => 'L',
                'pendidikan' => 'S1',
                'alamat' => 'Desa Manukwari Dusun Manukdoro Kecamatan Manukan RT 08 RW 06 ',
            ], [
                'NIK' => 351008251219950564,
                'NKK' => 351008231654326548,
                'nama' => 'Fitri Nurohmah',
                'tgl_lahir' => '1995-12-19',
                'pendapatan' => '0 - 500000',
                'no_telp' => '+6289562485325',
                'jenis_kelamin' => 'P',
                'pendidikan' => 'S1',
                'alamat' => 'Desa Manukwari Dusun Manukdoro Kecamatan Manukan RT 08 RW 06 ',
            ], [
                'NIK' => 351001021019990756,
                'NKK' => 351001231654324856,
                'nama' => 'Eko Pratama',
                'tgl_lahir' => '1999-10-02',
                'pendapatan' => '3000000 - keatas',
                'no_telp' => '+6281562485548',
                'jenis_kelamin' => 'L',
                'pendidikan' => 'S1',
                'alamat' => 'Desa Manukwari Dusun Manukdoro Kecamatan Manukan RT 05 RW 06 ',
            ], [
                'NIK' => 351001200819980752,
                'NKK' => 351001231654324856,
                'nama' => 'Nabila Saputri',
                'tgl_lahir' => '1998-08-20',
                'pendapatan' => '500000 - 1000000',
                'no_telp' => '+6282562485681',
                'jenis_kelamin' => 'P',
                'pendidikan' => 'S1',
                'alamat' => 'Desa Manukwari Dusun Manukdoro Kecamatan Manukan RT 05 RW 06 ',
            ], [
                'NIK' => 351001231654324856,
                'NKK' => 351001231654324856,
                'nama' => 'Budi Santoso',
                'tgl_lahir' => '1999-05-23',
                'pendapatan' => '3000000 - keatas',
                'no_telp' => '+6289562485000',
                'jenis_kelamin' => 'L',
                'pendidikan' => 'S1',
                'alamat' => 'Desa Manukwari Dusun Manukdoro Kecamatan Manukan RT 05 RW 06 ',
            ], [
                'NIK' => 351001231654324857,
                'NKK' => 351001231654324856,
                'nama' => 'Ani Rahayu',
                'tgl_lahir' => '2000-11-12',
                'pendapatan' => '1000000 - 2000000',
                'no_telp' => '+6289562485001',
                'jenis_kelamin' => 'P',
                'pendidikan' => 'S1',
                'alamat' => 'Desa Manukwari Dusun Manukdoro Kecamatan Manukan RT 05 RW 06 ',
            ], [
                'NIK' => 351001100220220011,
                'NKK' => 351001231654324856,
                'nama' => 'Putri Pratiwi',
                'tgl_lahir' => '2022-02-10',
                'pendapatan' => '0 - 500000',
                'no_telp' => null,
                'jenis_kelamin' => 'P',
                'pendidikan' => null,
                'alamat' => 'Desa Manukwari Dusun Manukdoro Kecamatan Manukan RT 05 RW 06 ',
            ], [
                'NIK' => 351001150820240011,
                'NKK' => 351001231654324856,
                'nama' => 'Bayu Pratama',
                'tgl_lahir' => '2024-02-15',
                'pendapatan' => '0 - 500000',
                'no_telp' => null,
                'jenis_kelamin' => 'L',
                'pendidikan' => null,
                'alamat' => 'Desa Manukwari Dusun Manukdoro Kecamatan Manukan RT 05 RW 06 ',
            ], [
                'NIK' => 351001150819720011,
                'NKK' => 351001231654324856,
                'nama' => 'Sujiono',
                'tgl_lahir' => '1972-08-15',
                'pendapatan' => '1000000 - 2000000',
                'no_telp' => '+6284984256215',
                'jenis_kelamin' => 'L',
                'pendidikan' => null,
                'alamat' => 'Desa Manukwari Dusun Manukdoro Kecamatan Manukan RT 01 RW 06 ',
            ],
        ];

        DB::table('penduduks')->insert($data);
    }
}
