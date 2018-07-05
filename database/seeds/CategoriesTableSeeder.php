<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
                [
                    'name' => 'Tin tức mẹ bầu',
                ],
                [
                    'name' => 'Chuẩn bị mang thai',
                ],
                [
                    'name' => 'Mang thai',
                ],
                [
                    'name' => 'Dấu hiệu sắp sinh',
                ],
                [
                    'name' => 'Sinh con',
                ],
                [
                    'name' => 'Sau sinh',
                ],
            ]
        );

        //factory(App\Models\Category::class, 5)->create();
    }
}
