<?php

use Illuminate\Database\Seeder;
use App\Promotion;

class PromotionSeeder extends Seeder
{
    public function run()
    {
        factory(Promotion::class, 10)->create();

    }
}
