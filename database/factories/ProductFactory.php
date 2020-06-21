<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->word,
        'description' => $faker->realText,
        'price' => $faker->unique()->numberBetween($min = 10, $max = 500),
        'category_id' => Category::all()->random()->id,
    ];
});
