<?php

$factory->define(\App\Containers\Board\Models\Board::class, function(Faker\Generator $faker) {
    return [
        'name'  =>  $faker->sentence,
        'project_id'   =>  factory(\App\Containers\Project\Models\Project::class)->create()
    ];
});

