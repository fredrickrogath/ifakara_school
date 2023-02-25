<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\Student::firstOrCreate([
            'class_level_id' => 1,
            'user_id' => 1,

        ]);
    }
}
