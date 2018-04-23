<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    	// reset bảng posts
        DB::table('posts')->truncate();

        date_default_timezone_set('Asia/Ho_Chi_Minh');

        // Khoi tao bien ao
        $faker = Faker::create();
        $date = Carbon::create(2017,9,2,9);

        // Thêm random 10 phần tử
        $posts = [];

        for ($i = 1; $i <= 10; $i ++) {
            $image = 'posts_image_'.rand(1,8).'.jpg';

            $date->addDays(1);
            $createdDate = clone($date);
            $publishedDate = clone($date);

            $posts[] = [
                'author_id' => rand(1,4),
                'title' => $faker->sentence(rand(8,12)),
                'slug' => $faker->slug(),
                'excerpt' => $faker->text(rand(150,200)),
                'body' => $faker->paragraphs(rand(5,8), true),
                'image' => rand(0,1) == 1 ? $image : NULL,
                'created_at' => $createdDate,
                'updated_at' => $createdDate, 
                'published_at' => $i < 5 ? $publishedDate : (rand(0,1) == 0 ? NULL : $publishedDate),
                'category_id' => rand(1,5)
            ];
        }

        DB::table('posts')->insert($posts);
    }
}
