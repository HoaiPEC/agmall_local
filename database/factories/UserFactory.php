<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'phone' => $faker->unique()->phoneNumber,
        'email' => $faker->unique()->safeEmail,
        'avatar' => 'images/icon-avatar-default.png',
        'password' => bcrypt('123456789'),
        'role' => $faker->randomDigitNot(9),
        'blocked' => $faker->randomElement([0,1]),
        'deleted' => $faker->randomElement([0,1]),
        'registry' => $faker->randomElement([1,2]),
        'email_verified_at' => now(),
        'remember_token' => Str::random(10),
    ];
});
