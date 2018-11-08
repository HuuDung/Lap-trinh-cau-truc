<?php

use Faker\Generator as Faker;

$factory->define(\App\Product::class, function (Faker $faker) {
    return [
        'category_id' => rand(1,10),
        'description' => "Some description",
        'cost' => rand(10,200),
        'quantity' => rand(1,100),
    ];
});
