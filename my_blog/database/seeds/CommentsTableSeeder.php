<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    	// Reset DB
    	DB::table('comments')->truncate();

        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $comments = [];
        $faker = Faker::create();

        for ($i = 1; $i <= 30; $i ++) 
        {
        	$comments[] = [
        		'post_id' => rand(1, 10),
        		'name' => $faker->name,
        		'email' => $faker->email,
        		'comment' => $faker->text(rand(10, 150)),
        		'created_at' => new DateTime,
        		'updated_at' => new DateTime 
        	];
        }

        DB::table('comments')->insert($comments); 
    }
}
