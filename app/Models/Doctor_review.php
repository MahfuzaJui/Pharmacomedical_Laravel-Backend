<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor_review extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'doctorReviewID';
}

