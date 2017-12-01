<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

// User
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' 			 => $faker->name,
        'email' 		 => $faker->unique()->safeEmail,
        'password' 		 => $password ?: $password = bcrypt('12345'),
        'remember_token' => str_random(10),
    ];
});



// Post
$factory->define(App\Post::class, function (Faker\Generator $faker) {

    return [
        'title' 		 => $faker->words(7, true),
        'body' 			 => $faker->paragraph(28),
        'thumbnail_path' => 'http://via.placeholder.com/450x200',
        'header_path'    => 'http://via.placeholder.com/2560x460', 
        'user_id' 		 => App\User::all()->random()->id,
        'category_id' 	 => App\Category::all()->random()->id,
    ];
});
