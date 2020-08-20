<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call(CandidatesSeeder::class);
        $this->call(PromotionSeeder::class);
    }
}