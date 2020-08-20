<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {   
        $this->call(PromotionSeeder::class);
        $this->call(CandidatesSeeder::class);
    }
}
