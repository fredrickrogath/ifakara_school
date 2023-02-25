<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class ChartOfAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\ChartsOfAccount::firstOrCreate([
            'account_type' => 'Income',
            'level1' => 410000,
            'level2' => null,
            'level3' => null,
            'name' => 'Tuition, Assistance & Discounts',
            'description' => 'Tuition, assistance & discounts are deferred',
            'notes' => null,
        ]);
    }
}
