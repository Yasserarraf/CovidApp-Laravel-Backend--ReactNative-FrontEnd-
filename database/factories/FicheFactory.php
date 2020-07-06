<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Fiche;
use Faker\Generator as Faker;

$factory->define(Fiche::class, function (Faker $faker) {
    return [
        'userp_id'=>$faker->numberBetween($min=1,$max=6),
    ];
});
