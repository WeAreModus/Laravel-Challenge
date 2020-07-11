<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name'        => $faker->name,
        'description' => $faker->text,
        'price'       => rand(100, 1000),
        'address'     => $faker->address,
        'state'       => $faker->state,
        'city'        => $faker->city,
        'zip'         => $faker->postcode,
        'country'     => $faker->country,
        'photo'       => $faker->imageUrl(),
    ];
});
