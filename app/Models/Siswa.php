<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $guarded = [];

    public function nisn(){
        return $this->hasOne(Nisn::class, 'siswa_id', 'id');
    }
}
