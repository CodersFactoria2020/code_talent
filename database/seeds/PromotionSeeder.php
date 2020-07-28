<?php

use Illuminate\Database\Seeder;

class PromotionSeeder extends Seeder
{
    public function run()
    {
        factory(\App\Promotion::class, 10)->create();
    }
}
