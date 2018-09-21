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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});


$factory->define(\App\Models\Article::class, function (Faker $faker) {
    return [
        'subject' => $faker->sentence(5),
        'description' => $faker->text(),

        'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'body' => $faker->text,
        'published_at' => $faker->dateTime($max = 'now', $timezone = null)

//    categories()->attach(rand(1, 40));
    ];
});


$factory->define(\App\Models\Belief::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'info' => $faker->sentence($nbWords = 6, $variableNbWords = true)
    ];
});


$factory->define(\App\Models\GraveYard::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'about' => $faker->text,
        'location' => $faker->address,
        'belediyye' => $faker->state
    ];
});

$factory->define(\App\Models\Molla::class, function (Faker $faker) {

    $gender = array('male', 'female', 'other');

    return [
        'fullname' => $faker->name,
        'email' => $faker->email,
        'password' => $faker->sha1,
        'phone' => $faker->e164PhoneNumber,
        'phone1' => $faker->e164PhoneNumber,
        'avatar' => 'https://picsum.photos/270/210/?random',
        'about' => $faker->text,
        'gender' => $gender[rand(0,2)],
        'birth_date' => $faker->dateTime($max = 'now', $timezone = null),
        'belief_id' => rand(1, 5),
        'verified' => 1,
        'experience' => rand(1, 5)
    ];
});


$factory->define(\App\Models\Service::class, function (Faker $faker) {
    return [
        'name' => $faker->jobTitle,
        'avatar' => 'https://picsum.photos/270/210/?random',
        'about' => $faker->text,
        'category_id' => rand(1, 40),
        'price' => rand(50, 300)
    ];
});


$factory->define(\App\Models\ServiceImages::class, function (Faker $faker) {
    return [
        'image' => 'https://picsum.photos/270/210/?random',
        'service_id' => rand(1, 15)
    ];
});