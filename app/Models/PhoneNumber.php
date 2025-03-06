<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhoneNumber extends Model
{
    protected $fillable = ['phone_number', 'siswa_id'];

    public function siswa(){
        return $this->belongsTo(Siswa::class, 'siswa_id', 'id');
    }
}
