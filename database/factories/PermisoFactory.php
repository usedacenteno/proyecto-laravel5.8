<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;
use App\models\Permiso;

$factory->define(Permiso::class, function (Faker $faker) {
    return [
        'nombre' => $faker->word,
        'slug' => $faker->word,
    ];
});
