<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ClassLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\ClassLevel::firstOrCreate([
            'class_level' => 'form One',
        ]);
    }
}
