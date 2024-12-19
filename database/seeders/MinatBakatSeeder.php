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
            ['kode' => 'MB01', 'deskripsi' => 'Logika'],
            ['kode' => 'MB02', 'deskripsi' => 'Kreativitas'],
            ['kode' => 'MB03', 'deskripsi' => 'Interaksi Sosial'],
            ['kode' => 'MB04', 'deskripsi' => 'Analisis Data'],
            ['kode' => 'MB05', 'deskripsi' => 'Seni Visual'],
            ['kode' => 'MB06', 'deskripsi' => 'Pemrograman'],
            ['kode' => 'MB07', 'deskripsi' => 'Keuangan'],
            ['kode' => 'MB08', 'deskripsi' => 'Pemasaran'],
            ['kode' => 'MB09', 'deskripsi' => 'Manajemen'],
            ['kode' => 'MB10', 'deskripsi' => 'Komunikasi'],
        ]);
    }

}
