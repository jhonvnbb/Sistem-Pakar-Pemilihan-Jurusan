<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
        // Tentukan nama tabel jika berbeda dengan nama model
        protected $table = 'jurusans'; // Nama tabel di database

        // Kolom-kolom yang dapat diisi
        protected $fillable = [
            'kode',
            'nama',
            'kriteria',
        ];
    
        // Menggunakan accessor untuk kriteria yang disimpan dalam format JSON
        protected $casts = [
            'kriteria' => 'array',  // Agar kriteria dapat diakses sebagai array
        ];
}
