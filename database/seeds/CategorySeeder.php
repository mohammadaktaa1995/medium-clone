<?php

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
            ['name' => 'Programming', 'slug' => Str::slug('Programming')],
            ['name' => 'World', 'slug' => Str::slug('World')],
            ['name' => 'Health', 'slug' => Str::slug('Health')],
            ['name' => 'Nature', 'slug' => Str::slug('Nature')],
        ]);
    }
}
