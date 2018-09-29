<?php

use Faker\Generator as Faker;

/* Users */
$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => 'secret', // secret
        'remember_token' => str_random(10),
    ];
});

/* Articles */
$factory->define(App\Models\Article::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(5),
        'body' => $faker->text(250),
    ];
});

/* Categories */
$factory->define(\App\Models\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
    ];
});

/* Beliefs */
$factory->define(\App\Models\Belief::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'info' => $faker->sentence($nbWords = 6, $variableNbWords = true)
    ];
});

/* GraveYards */

$factory->define(\App\Models\GraveYard::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'about' => $faker->text,
        'location' => $faker->address,
        'belediyye' => $faker->state
    ];
});

/* Mollas */

$factory->define(\App\Models\Molla::class, function (Faker $faker) {

    $gender = array('male', 'female', 'other');

    return [
        'full_name' => $faker->name,
        'email' => $faker->email,
        'password' => $faker->sha1,
        'phone' => $faker->e164PhoneNumber,
        'extra_phone' => $faker->e164PhoneNumber,
        'avatar' => 'https://picsum.photos/270/210/?random',
        'about' => $faker->text,
        'gender' => $gender[rand(0,2)],
        'birth_date' => $faker->dateTime($max = 'now', $timezone = null),
        'belief_id' => rand(1, 5),
        'verified' => 1,
        'experience' => rand(1, 5)
    ];
});

/* Services */

$factory->define(\App\Models\Service::class, function (Faker $faker) {
    return [
        'name' => $faker->jobTitle,
        'avatar' => 'https://picsum.photos/270/210/?random',
        'about' => $faker->text,
        'category_id' => rand(1, 40),
        'price' => rand(50, 300)
    ];
});

/* ServiceImages */

$factory->define(\App\Models\ServiceImages::class, function (Faker $faker) {
    return [
        'image' => 'https://picsum.photos/270/210/?random',
        'service_id' => rand(1, 15)
    ];
});