<?php

use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
    return [
        'project_name' => $faker->sentence(),
        'description' => $faker->sentence(),
        'date_of_creation' => \Carbon\Carbon::now(),
        'author' => $faker->name(),
        'updated_at' => \Carbon\Carbon::now(),
        'created_at' => \Carbon\Carbon::now(),
    ];
});
