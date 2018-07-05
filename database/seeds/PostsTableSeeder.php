<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
                [
                    'user_id'     => 1,
                    'category_id' => 1,
                    'thumbnail'   => '',
                    'title'       => 'Cách tính chu kỳ rụng trứng theo chỉ dẫn từ bác sĩ sản khoa',
                    'description' => ' Lần đầu tiên siêu âm, bác sĩ chỉ nghĩ thai còn nhỏ nên chưa vào tử cung nhưng 10 ngày sau, sự thật gây sốc mới được tiết lộ.',
                    'content'     => '',
                ],
                [
                    'user_id'     => 1,
                    'category_id' => 1,
                    'thumbnail'   => '',
                    'title'       => '',
                    'description' => '',
                    'content'     => '',
                ],
            ]
        );


        factory(App\Models\Post::class, 50)->create();

        // Get all the tags attaching up to 3 random tags to each post
        $tags = App\Models\Tag::all();

        // Populate the pivot table
        App\Models\Post::all()->each(function ($post) use ($tags) {
            $post->tags()->attach(
                $tags->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
