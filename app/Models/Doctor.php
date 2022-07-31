<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Doctor extends Model
{
    use HasFactory;
    protected $primaryKey = 'doctorID';
    // public function appointments()
    // {
    //     return $this->hasMany(Appointment::class,'doctorID');
    // }

    public function appointments() {

        return $this->hasMany(Appointment::class,'doctorID');
    }
}