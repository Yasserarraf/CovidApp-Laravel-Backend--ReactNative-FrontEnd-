<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Userp;
use Faker\Generator as Faker;

$factory->define(Userp::class, function (Faker $faker) {
  return [
      'nom' => $faker->firstName,
      'prenom'=>$faker->lastName,
      'adresse'=>$faker->address,
      'age'=>$faker->numberBetween($min=20,$max=80),
      'ville'=>$faker->city,
      'email' => $faker->unique()->email,
      'password' => $faker->password, // password

  ];
});
