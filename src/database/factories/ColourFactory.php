<?php

use Faker\Generator as Faker;
use Jianjye\LaravelBasicSearch\Models\Colour;

$factory->define(Colour::class, function (Faker $faker) {
    return [
       'name' => $faker->colorName
    ];
});

