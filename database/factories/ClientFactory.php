<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Client;
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

$factory->define(Client::class, function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'name' => $faker->firstName,
        'surname' => $faker->lastName,
        'date_of_birth' => $faker->date('Y-m-d', '-18 years'),
        'phone_number' => $faker->tollFreePhoneNumber,
        'address' => $faker->address,
        'country' => $faker->country,
        'trading_account_number' => $faker->name,
    ];
});
