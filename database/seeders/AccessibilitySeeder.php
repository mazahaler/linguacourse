<?php

namespace Database\Seeders;

use App\Models\Accessibility as AccessibilityModel;
use Constants\Accessibility;
use Illuminate\Database\Seeder;

class AccessibilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AccessibilityModel::create([
            'title' => Accessibility::PUBLIC
        ]);

        AccessibilityModel::create([
            'title' => Accessibility::BY_LINK
        ]);
    }
}
