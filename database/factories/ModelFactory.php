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

use App\User;
use App\Device;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Device::class, function (Faker\Generator $faker) {
    return [
        'manufacturer' => $faker->company,
        'model' => $faker->name,
        'type' => $faker->linuxPlatformToken
    ];
});

$factory->define(App\Log::class, function (Faker\Generator $faker) {
    $statuses = ['pending', 'open', 'closed'];

    return [
        'user_id' => User::all()->random()->id,
        'device_id' => Device::all()->random()->id,
        'status' => $statuses[$faker->numberBetween(0, 2)],
        'description' => $faker->paragraph
    ];
});
