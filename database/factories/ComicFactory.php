<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Comic::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'author' => $faker->name,
        'conver_img_url' =>  $faker->imageUrl(),
        'description' => $faker->text,
        'lunbo'=>rand(0,1),
        'tuijie'=>rand(0,1),
        'star_number'=>rand(0,5),
        'weekupdate'=>'一周一更',
        'updatetime'=>$faker->dateTime,
        'click_number'=>rand(0,100000),
        'buzz'=>rand(0,4),
        'series_id'=>rand(1,2),
    ];
});
