<?php

/** @var Factory $factory */

use App\Models\Article;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Article::class, function (Faker $faker) {
    $title = $faker->sentence();
    return [
        'title' => $title,
        'summary' => $faker->realText(rand(150, 200)),
        'body' => $faker->realText(rand(10000, 30000)),
        'cover_image' => '/img/article.jpg',
        'category_id' => rand(1, 4),
        'author_id' => rand(1, 15),
        'slug' => Str::slug($title),
        'views' => rand(100, 1500)
    ];
});
