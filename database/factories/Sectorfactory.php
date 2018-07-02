<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    $title = $faker->name;
    $activeTicket = rand(0,1);$activeSector = rand(0,1);

    return [
        'fullname' => $title,
        'tickets' => $faker->numberBetween(1,150),
        'seating' => $activeTicket,
        'sector_detail' => $activeSector,
    ];
});
