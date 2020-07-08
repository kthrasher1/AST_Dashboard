<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use App\Message;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'student' => $faker->student,
        'staff' => $faker->staff,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(Message::class, function (Faker $faker) {
    do{
        $from = 2;
        $to = 3;

    } while($from === $to);

    return[
        'to' => $to,
        'from' => $from,
        'read' => rand(true, false),
        'content' => $faker->sentence,
    ];

});
