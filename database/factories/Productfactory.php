<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\Product::class, function (Faker $faker) {
    $title = $faker->name;
    $slug = Str::slug($title);
    return [
        'fullname' => $title,
        'slug' => $slug,
        'description' => $faker->sentence,
        'date' => $faker->dateTimeBetween('2018-06-13','2018-07-30'),
        'address' => $faker->address,
        'district' => $faker->city,
        'region' => $faker->country,
        'departament' => $faker->countryCode,
        'reference' => $faker->address,
        'tickets' => $faker->numberBetween(1,800),
        'space' => $faker->name,
        'flat' => 'plano'.rand(1,5).'.jpg',
        'latitude' => $faker->latitude,
        'longitude' => $faker->longitude,
        'web' => $faker->domainName,
        'facebook' => $faker->countryCode,
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'more_details' => $faker->sentence,
    ];
});
