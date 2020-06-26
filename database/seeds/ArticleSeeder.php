<?php

use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Article::class, 15)->create()->each(function ($article) {
            $random_ids = range(1, 10);
            shuffle($random_ids);
            $random_ids = array_slice($random_ids, 0, rand(2, 5));
            $article->tags()->sync($random_ids);
        });
    }
}
