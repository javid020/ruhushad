<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Belief;
use App\Models\Category;
use App\Models\GraveYard;
use App\Models\Molla;
use App\Models\Service;
use App\Models\ServiceImages;
use Illuminate\Http\Request;
use Faker\Generator;
use Illuminate\Support\Facades\DB;

class FakerData extends Controller
{

    public function servimages() {
        $faker = \Faker\Factory::create();

        for($i = 0; $i < 15; $i++) {

            $art = new ServiceImages;

            $art->image = 'https://picsum.photos/270/210/?random';
            $art->service_id = rand(1, 15);

            $art->save();
        }
    }

    public function services() {
        $faker = \Faker\Factory::create();

        for($i = 0; $i < 15; $i++) {

            $art = new Service;

            $art->name = $faker->jobTitle;
            $art->avatar = 'https://picsum.photos/270/210/?random';
            $art->about = $faker->text;
            $art->category_id = rand(1, 40);
            $art->price = rand(50, 300);

            $art->save();
        }
    }

    public function mollas() {
        $faker = \Faker\Factory::create();

        $gender = array('male', 'female', 'other');

        for($i = 0; $i < 30; $i++) {

            $art = new Molla;

            $art->fullname = $faker->name;
            $art->email = $faker->email;
            $art->password = $faker->sha1;
            $art->phone = $faker->e164PhoneNumber;
            $art->phone1 = $faker->e164PhoneNumber;
            $art->avatar = 'https://picsum.photos/270/210/?random';
            $art->about = $faker->text;
            $art->gender = $gender[rand(0,2)];
            $art->birth_date = $faker->dateTime($max = 'now', $timezone = null);
            $art->belief_id = rand(1, 5);
            $art->verified = 1;
            $art->experience = rand(1, 5);



            $art->save();
            $art->services()->attach(rand(1, 30));
        }
    }

    public function yards() {
        $faker = \Faker\Factory::create();

        for($i = 0; $i < 30; $i++) {

            $art = new GraveYard;

            $art->name = $faker->sentence($nbWords = 6, $variableNbWords = true);
            $art->about = $faker->text;
            $art->location = $faker->address;
            $art->belediyye = $faker->state;

            $art->save();
        }
    }


    public function beliefs() {
        $faker = \Faker\Factory::create();

        for($i = 0; $i < 30; $i++) {

            $art = new Belief;

            $art->name = $faker->sentence($nbWords = 6, $variableNbWords = true);
            $art->info = $faker->text;

            $art->save();
        }
    }


    public function articles() {
        $faker = \Faker\Factory::create();

        for($i = 0; $i < 30; $i++) {

            $art = new Article;

            $art->title = $faker->sentence($nbWords = 6, $variableNbWords = true);
            $art->body = $faker->text;
            $art->published_at = $faker->dateTime($max = 'now', $timezone = null);

            $art->save();
            $art->categories()->attach(rand(1, 40));
        }
    }

    public function categories() {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 30; $i++) {

            $ins = new Category;

            $ins->name = $faker->name;
            $ins->parent_id = rand(1,10);

            $ins->save();
        }


    }
}
