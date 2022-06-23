<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::create([
            'name' => 'English',
            'code' => 'en',
            'icon' => 'flag-gb.svg'
        ]);

        Language::create([
            'name' => 'Русский',
            'code' => 'ru',
            'icon' => 'flag-ru.svg'
        ]);
    }
}
