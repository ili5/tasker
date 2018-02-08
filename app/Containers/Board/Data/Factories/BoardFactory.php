<?php

$factory->define(\App\Containers\Board\Models\Board::class, function(Faker\Generator $faker) {
    $colors = ['primary','secondary','success','danger', 'warning', 'info'];
    return [
        'name'  =>  $faker->sentence,
        'color' =>  $colors[rand(0,5)],
        'project_id'   =>  function(){
            return factory(\App\Containers\Project\Models\Project::class)->create()->id;
        }
    ];
});

