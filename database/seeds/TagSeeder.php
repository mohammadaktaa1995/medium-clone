<?php

use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Tag::insert(
            [
                ['name' => 'Web'],
                ['name' => 'ASP'],
                ['name' => 'CSS'],
                ['name' => 'JS'],
                ['name' => 'VUE'],
                ['name' => 'ANGULAR'],
                ['name' => 'REACT'],
                ['name' => 'LARAVEL'],
                ['name' => 'PYTHON'],
                ['name' => 'C++'],
                ['name' => 'HTML'],
            ]
        );
    }
}
