<?php

namespace Database\Seeders;

use App\Models\Complexity;
use Constants\Complexities;
use Illuminate\Database\Seeder;

class ComplexitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Complexity::create([
            'name' => 'Beginner',
            'level' => Complexities::A1
        ]);

        Complexity::create([
            'name' => 'Pre-intermediate',
            'level' => Complexities::A2
        ]);

        Complexity::create([
            'name' => 'Intermediate',
            'level' => Complexities::B1
        ]);

        Complexity::create([
            'name' => 'Upper-intermediate',
            'level' => Complexities::B2
        ]);

        Complexity::create([
            'name' => 'Advanced',
            'level' => Complexities::C1
        ]);

        Complexity::create([
            'name' => 'Proficiency',
            'level' => Complexities::C2
        ]);
    }
}
