<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolesTableSeeder::class,
            UsersTableSeeder::class,
            CategoriesTableSeeder::class,
            //TagsTableSeeder::class,
            //PostsTableSeeder::class,
            //FeedbacksTableSeeder::class
        ]);
    }
}
