<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PharmaceuticalItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pharmaceutical_items')->insert([
            'pharmaceuticalItemID' => 1,
            'userID'=> 3,
            'itemName' => 'Paracetamol',
            'price' => 100,
        ]);
    }
}