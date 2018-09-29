<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Molla::class, 30)->create();
        factory(\App\Models\ServiceImages::class, 30)->create();
        factory(\App\Models\Service::class, 30)->create()->each(function ($k) {
            $k->mollas()->sync(rand(1,10));
        });
        factory(\App\Models\Belief::class, 30)->create();
        factory(\App\Models\GraveYard::class, 30)->create();
        factory(\App\Models\Category::class, 10)->create();
        factory(\App\Models\Article::class, 10)->create()->each(function ($u) {
            $u->categories()->sync(rand(1, 10));
        });
    }
}