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
        $this->call(ArticleTableSeeder::class);
        $this->call(BeliefTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(MollaTableSeeder::class);
        $this->call(ServiceImageTableSeeder::class);
        $this->call(ServiceTableSeeder::class);
        $this->call(YardTableSeeder::class);
    }
}
