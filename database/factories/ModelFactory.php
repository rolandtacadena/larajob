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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'company_name' => $faker->name,
        'company_tagline' => $faker->sentence(5),
        'company_web_url' => 'roland.com',
        'company_logo' => $faker->name,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10)
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => str_random(10)
    ];
});

$factory->define(App\Job::class, function (Faker\Generator $faker) {
    return [
        'user_id' => $faker->numberBetween(1, 30),
        'type_id' => $faker->numberBetween(1, 3),
        'title' => $faker->name,
        'description' => $faker->paragraph(40),
        'location' => $faker->sentence,
        'how_to_apply' => 'Email github, projects or resume to tacadena.roland@gmail.com'
    ];
});