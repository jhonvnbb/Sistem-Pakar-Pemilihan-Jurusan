<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    use HasFactory;

    protected $table = 'rules';

    protected $fillable = [
        'kode_minat_bakat',
        'kode_jurusan',
        'bobot',
    ];

    /**
     * Relasi ke model MinatBakat
     */
    public function minatBakat()
    {
        return $this->belongsTo(MinatBakat::class, 'kode_minat_bakat', 'kode');
    }

    /**
     * Relasi ke model Jurusan
     */
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'kode_jurusan', 'kode');
    }
}
