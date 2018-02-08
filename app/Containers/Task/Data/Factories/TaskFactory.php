<?php

$factory->define(\App\Containers\Task\Models\Task::class, function(Faker\Generator $faker) {
    return [
        'project_id'    =>  function(){
            return factory(\App\Containers\Project\Models\Project::class)->create()->id;
        },
        'board_id'  =>  function(){
            return factory(\App\Containers\Board\Models\Board::class)->create()->id;
        },
        'creator_id'    =>  function() {
            return factory(\App\Containers\User\Models\User::class)->create()->id;
        },
        'assigned_id'   =>  function() {
            return factory(\App\Containers\User\Models\User::class)->create()->id;
        },
        'title' =>  $faker->word,
        'description'   =>  $faker->paragraph,
        'due_date'  =>  $faker->dateTimeThisMonth
    ];
});

