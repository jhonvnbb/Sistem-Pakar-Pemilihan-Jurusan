<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('jurusans')->insert([
            ['kode' => 'J01', 'nama' => 'Teknik Informatika', 'deskripsi' => 'Jurusan Teknik Informatika mempelajari cara kerja komputer, pengembangan perangkat lunak, desain algoritma, kecerdasan buatan, dan jaringan komputer. Mahasiswa akan belajar cara membangun solusi digital untuk berbagai kebutuhan, mulai dari aplikasi mobile hingga teknologi cloud. Selain itu, jurusan ini memberikan pemahaman mendalam tentang pengolahan data, keamanan siber, hingga pengembangan sistem berbasis AI (Artificial Intelligence).', 'kriteria' => json_encode(['MB01' => 1.0, 'MB04' => 1.0, 'MB06' => 1.0])],
            ['kode' => 'J02', 'nama' => 'Desain Komunikasi Visual', 'deskripsi' =>'Jurusan ini dirancang untuk menghasilkan desainer kreatif yang mampu menghasilkan komunikasi visual yang efektif. Mahasiswa akan mempelajari desain grafis, ilustrasi, animasi, fotografi, hingga produksi video. Selain itu, mereka akan belajar cara merancang branding, membuat desain iklan, dan menggunakan media visual untuk menyampaikan pesan yang kuat dan estetis. Desain Komunikasi Visual sangat penting di berbagai bidang seperti periklanan, media digital, dan hiburan.','kriteria' => json_encode(['MB02' => 1.0, 'MB05' => 1.0])],
            ['kode' => 'J03', 'nama' => 'Psikologi', 'deskripsi' =>'Jurusan Psikologi mempelajari perilaku manusia dan proses mental, termasuk cara orang berpikir, merasa, dan bertindak. Mahasiswa akan memahami psikologi perkembangan, klinis, sosial, dan organisasi. Jurusan ini juga fokus pada keterampilan analisis dan riset untuk menangani isu-isu kesehatan mental dan hubungan interpersonal. Lulusan sering bekerja di bidang konseling, terapi, SDM, atau penelitian ilmiah.', 'kriteria' => json_encode(['MB03' => 1.0, 'MB01' => 0.8])],
            ['kode' => 'J04', 'nama' => 'Sistem Informasi', 'deskripsi' => 'Sistem Informasi menggabungkan manajemen bisnis dengan teknologi informasi. Mahasiswa akan belajar cara merancang, mengelola, dan mengimplementasikan sistem teknologi yang mendukung kebutuhan operasional dan strategi bisnis. Jurusan ini berfokus pada aplikasi teknologi untuk menyelesaikan masalah organisasi, termasuk pengolahan data, integrasi sistem, dan pengembangan solusi berbasis IT yang efisien.', 'kriteria' => json_encode(['MB01' => 1.0, 'MB09' => 0.8])],
            ['kode' => 'J05', 'nama' => 'Manajemen Bisnis', 'deskripsi' => 'Manajemen adalah bidang yang mengelola sumber daya, mengatur proses, dan mengelola risiko untuk mencapai tujuan bisnis. Jurusan ini mempelajari cara mengelola organisasi, membangun tim, dan mengelola risiko. Mahasiswa akan belajar cara mengelola sumber daya manusia, keuangan, dan teknologi, serta memahami cara mengelola risiko dan pengelolaan proyek.', 'kriteria' => json_encode(['MB09' => 1.0, 'MB07' => 1.0, 'MB08' => 1.0])],
            ['kode' => 'J06', 'nama' => 'Ilmu Komunikasi', 'deskripsi' => 'Jurusan Ilmu Komunikasi berfokus pada cara menyampaikan informasi secara efektif melalui berbagai media. Mahasiswa akan belajar tentang komunikasi interpersonal, media massa, jurnalistik, dan hubungan masyarakat. Selain itu, mereka akan memahami strategi komunikasi digital, analisis media, dan pengelolaan reputasi perusahaan. Jurusan ini cocok untuk individu yang tertarik dengan dunia media, periklanan, public relations, dan komunikasi organisasi', 'kriteria' => json_encode(['MB09' => 1.0, 'MB03' => 1.0, 'MB02' => 0.8])],
        ]);
    }


}
