<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Store;
use Faker\Generator as Faker;

$factory->define(Store::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'phone' => $faker->phoneNumber,
        'description' => $faker->sentence,
        'mobile_phone' => $faker->phoneNumber,
        'slug' => $faker->slug
    ];
});
