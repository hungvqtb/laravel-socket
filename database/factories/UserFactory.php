<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
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
        'phone' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
        'profile_image' => 'https://via.placeholder.com/150x150',
        'email_verified_at' => now(),
        'password' => '$2y$10$3zxvNxdbktR1ryR3G.7.hOfn3QlLOF22wPd5YVqdpb1Qz4wD4/Rmi', // password
        'remember_token' => Str::random(10),
        'api_token' => Str::random(60),
    ];
});

$factory->define(\App\Message::class, function (Faker $faker) {
    do{
        $from = rand(1, 15);
        $to = rand(1, 15);

    }while($from === $to);

    return [
        'from' => $from,
        'to' => $to,
        'text' => $faker->sentence
    ];
});
