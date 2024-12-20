<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class MinatBakat extends Model
{
        protected $table = 'minat_bakats';

        protected $fillable = [
            'kode',
            'deskripsi',
            'detail',
        ];

        public function rules()
        {
            return $this->hasMany(Rule::class, 'kode_minat_bakat', 'kode');
        }

}
