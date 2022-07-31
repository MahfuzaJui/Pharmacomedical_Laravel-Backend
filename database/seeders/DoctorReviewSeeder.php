<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DoctorReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('doctor_reviews')->insert([
            'doctorReviewID' => 1,
            'doctorID' => 1,
            'userID' => 2,
            'point' => 4.5,
            'description' => 'Good doctor',
        ]);
    }
}

