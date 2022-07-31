<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrescriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prescriptions')->insert([
            'prescriptionID' => 1,
            'doctorID' => 1,
            'userID' => 4,
            'pharmaceuticalItemID' => 1,
            'advice' => 'Consume it twice a day after breakfast and dinner',
        ]);
    }
}