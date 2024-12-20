<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
        protected $table = 'jurusans';

        protected $fillable = [
            'kode',
            'nama',
            'deskripsi',
            'kriteria',
        ];
    
        protected $casts = [
            'kriteria' => 'array',
        ];
        public function rules()
        {
            return $this->hasMany(Rule::class, 'kode_jurusan', 'kode');
        }

}
