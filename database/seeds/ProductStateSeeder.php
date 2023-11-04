<?php

use App\ProductState;
use Illuminate\Database\Seeder;

class ProductStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductState::create([
            'prod_stat_state' => 'EXPIRED',
        ]);
        ProductState::create([
            'prod_stat_state' => 'IMPERFECT',
        ]);
        ProductState::create([
            'prod_stat_state' => 'OBSOLETE',
        ]);
    }
}
