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
            ['kode' => 'J01', 'nama' => 'Teknik Informatika', 'kriteria' => json_encode(['MB01' => 1.0, 'MB04' => 1.0])],
            ['kode' => 'J02', 'nama' => 'Desain Komunikasi Visual', 'kriteria' => json_encode(['MB02' => 1.0, 'MB05' => 1.0])],
            ['kode' => 'J03', 'nama' => 'Psikologi', 'kriteria' => json_encode(['MB03' => 1.0, 'MB01' => 0.8])],
        ]);
    }


}
