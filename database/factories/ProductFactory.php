<?php

use Faker\Generator as Faker;

$factory->define(\App\Product::class, function (Faker $faker) {
    return [
        'category_id' => rand(1,2),
        'name' => $faker->name(),
        'description' => "Some description",
        'cost' => rand(10,200),
    ];
});
