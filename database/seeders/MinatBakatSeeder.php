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
            ['kode' => 'MB01', 'deskripsi' => 'Logika', 'nilai_mb' => 1.0],
            ['kode' => 'MB02', 'deskripsi' => 'Kreativitas', 'nilai_mb' => 0.8],
            ['kode' => 'MB03', 'deskripsi' => 'Interaksi Sosial', 'nilai_mb' => 0.6],
            ['kode' => 'MB04', 'deskripsi' => 'Analisis Data', 'nilai_mb' => 1.0],
            ['kode' => 'MB05', 'deskripsi' => 'Seni Visual', 'nilai_mb' => 0.8],
        ]);
    }

}
