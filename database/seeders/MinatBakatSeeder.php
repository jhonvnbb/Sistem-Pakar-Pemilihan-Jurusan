<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MinatBakatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('minat_bakats')->insert([
            [
                'kode' => 'MB01', 
                'deskripsi' => 'Logika', 
                'detail' => 'Kemampuan berpikir kritis dan logis.',
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'kode' => 'MB02', 
                'deskripsi' => 'Kreativitas', 
                'detail' => 'Kemampuan menciptakan ide atau karya inovatif.',
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'kode' => 'MB03', 
                'deskripsi' => 'Interaksi Sosial', 
                'detail' => 'Kemampuan berkomunikasi dan bekerja dalam tim.',
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'kode' => 'MB04', 
                'deskripsi' => 'Analisis Data', 
                'detail' => 'Minat dalam pengolahan dan interpretasi data.',
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'kode' => 'MB05', 
                'deskripsi' => 'Seni Visual', 
                'detail' => 'Kemampuan menggambar, mendesain, atau memvisualisasi.',
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'kode' => 'MB06', 
                'deskripsi' => 'Pemrograman', 
                'detail' => 'Kemampuan Menulis kode dan memahami logika pemrograman.',
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'kode' => 'MB07', 
                'deskripsi' => 'Keuangan', 
                'detail' => 'Kemampuan mengelola anggaran dan analisis finansial.',
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'kode' => 'MB08', 
                'deskripsi' => 'Pemasaran', 
                'detail' => 'Minat dalam promosi dan strategi penjualan produk/jasa.',
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'kode' => 'MB09', 
                'deskripsi' => 'Manajemen', 
                'detail' => 'Kemampuan mengelola sumber daya dan membuat keputusan strategis.',
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'kode' => 'MB10', 
                'deskripsi' => 'Komunikasi', 
                'detail' => 'Kemampuan menyampaikan informasi dengan jelas dan persuasif.',
                'created_at' => now(), 
                'updated_at' => now()
            ]
        ]);
    }
}