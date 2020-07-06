<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Question;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
    return [
        'fiche_id'=>$faker->numberBetween($min=1,$max=6),
        'question_nb'=>$faker->numberBetween($min=1,$max=6),
        'question'=>$faker->sentence($nbWords=7,$variableNbWords=true),
        'reponse'=>$faker->sentence($nbWords=5,$variableNbWords=true),
    ];
});
