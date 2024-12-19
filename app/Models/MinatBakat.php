<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MinatBakat extends Model
{
        // Tentukan nama tabel jika berbeda dengan nama model
        protected $table = 'minat_bakats'; // Sesuaikan dengan nama tabel di database

        // Kolom-kolom yang dapat diisi
        protected $fillable = [
            'kode',
            'deskripsi',
            'nilai_mb'
        ];
}
