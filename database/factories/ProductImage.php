<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ProductImage;
use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(ProductImage::class, function (Faker $faker) {
    return [
        'photo' => $faker->imageUrl(),
        'Product_id' => Product::all()->random()->id
    ];
});
