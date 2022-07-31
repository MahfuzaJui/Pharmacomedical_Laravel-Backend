<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Appointment extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'appID';
    protected $fillable = ["doctorID","TITLE"];
    // public function doctor(){
    //     return $this->belongsTo(Doctor::class, 'doctorID');
    // }

    public function doctor() {

        return $this->belongsTo(Doctor::class,'doctorID','doctorID');
    }
}
