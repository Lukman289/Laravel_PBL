<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kader_id'=> 2,
                'judul' => 'Peningkatan Angka Pengunjung Posyandu Delima Merah',
                'isi' => 'Posyandu Delima Merah, sebuah inisiatif kesehatan masyarakat yang berfokus pada pelayanan ibu dan anak,
                telah mencatat peningkatan signifikan dalam angka pengunjungnya. Dengan semangat untuk meningkatkan kualitas
                hidup dan kesehatan keluarga, posyandu ini telah menjadi pusat perhatian di komunitas sekitarnya.
                Peningkatan ini menunjukkan kesadaran masyarakat akan pentingnya perawatan kesehatan pra- dan pasca-kelahiran
                serta pertumbuhan anak. Melalui program-program pendidikan dan layanan kesehatan yang disediakan,
                Posyandu Delima Merah berhasil mencapai dan mempengaruhi lebih banyak keluarga.
                Faktor-faktor yang berkontribusi terhadap peningkatan ini termasuk kampanye penyuluhan yang efektif,
                dukungan dari pemerintah setempat, serta kerjasama antara tenaga kesehatan dan masyarakat. Dengan demikian,
                peningkatan angka pengunjung ini menjadi cerminan dari komitmen bersama untuk meningkatkan kualitas hidup dan
                kesehatan keluarga di wilayah tersebut.',
                'tag' => 'informasi,kegiatan',
                'foto_artikel' => 'DAsCsDBnMKIDUDoGUOAA5uKHppcHCmqlpEsQJ6Ls.jpg',
            ], [
                'kader_id'=> 2,
                'judul' => 'Manfaat Imunisasi Rutin bagi Anak-Anak: Pilar Penting dalam Peningkatan Kesehatan Masyarakat',
                'isi' => 'Imunisasi rutin bagi anak-anak memiliki peran krusial dalam menjaga kesehatan masyarakat.
                Dengan memberikan vaksin secara teratur, kita tidak hanya melindungi anak-anak dari penyakit yang serius,
                tetapi juga membantu memutus rantai penularan penyakit menular. Dukungan dari kader-kader kesehatan seperti
                Posyandu Delima Merah sangatlah penting dalam mensosialisasikan manfaat imunisasi kepada masyarakat.',
                'tag' => 'ibu_hamil,ibu_menyusui,balita',
                'foto_artikel' => '16NtVyPHhGoEKybdPEjKHv76kuaL8W1MhWs9vaMu.jpg',
            ], [
                'kader_id'=> 2,
                'judul' => 'Peran Posyandu dalam Pemberdayaan Masyarakat: Membangun Kesadaran akan Kesehatan Keluarga',
                'isi' => 'Posyandu bukan hanya tempat pelayanan kesehatan, tetapi juga menjadi pusat pemberdayaan masyarakat.
                Melalui program-program edukasi dan sosialisasi yang dilakukan oleh kader-kader kesehatan, Posyandu tidak
                hanya memberikan layanan kesehatan tetapi juga membangun kesadaran akan pentingnya kesehatan keluarga.
                Inisiatif seperti Posyandu Delima Merah membantu meningkatkan kualitas hidup masyarakat di sekitarnya.',
                'tag' => 'informasi,edukasi',
                'foto_artikel' => 'ZOqhuG56ATKk12u2HRl8Jx9liTaPR31T4BVIu0c2.jpg',
            ], [
                'kader_id'=> 2,
                'judul' => 'Penyuluhan Gizi Seimbang: Kunci Utama Menuju Keluarga Sehat dan Bahagia',
                'isi' => 'Gizi seimbang adalah pondasi utama bagi kesehatan keluarga. Melalui penyuluhan gizi yang efektif,
                masyarakat dapat memahami pentingnya konsumsi makanan bergizi untuk menjaga kesehatan tubuh. Posyandu Delima Merah dan
                kader-kader kesehatannya memainkan peran vital dalam menyebarkan informasi tentang pola makan sehat dan
                membantu masyarakat dalam mencapai gaya hidup yang lebih sehat.',
                'tag' => 'informasi,ibu_hamil,ibu_menyusui,edukasi',
                'foto_artikel' => 'OV0Cd2b2K1BoTBPMMdTNkFijFot0glkB6jCouRXp.jpg',
            ],

        ];

        DB::table('artikels')->insert($data);
    }
}
