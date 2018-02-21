<?php
$factory->define(\App\Containers\Message\Models\Message::class, function(Faker\Generator $faker){
    return [
        'user_id'   =>  1,
        'task_id'   =>  1,
        'message'   =>  $faker->text
    ];
});