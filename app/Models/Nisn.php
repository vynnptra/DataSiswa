<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nisn extends Model
{
    protected $guarded = [];

    public function siswa(){
        return $this->belongsTo(Siswa::class);
    }
}
