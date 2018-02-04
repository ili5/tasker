<?php

$factory->define(\App\Containers\Project\Models\Project::class, function(Faker\Generator $faker) {
    return [
        'name'  =>  $faker->sentence,
        'description'   =>  $faker->text,
        'user_id'   =>  factory(\App\Containers\User\Models\User::class)->create()
    ];
});

