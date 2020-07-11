<?php

use Faker\Generator as Faker;
use JianJye\LaravelBasicSearch\Models\Colour;

$factory->define(Colour::class, function (Faker $faker) {
    return [
       'name' => $faker->colorName
    ];
});

