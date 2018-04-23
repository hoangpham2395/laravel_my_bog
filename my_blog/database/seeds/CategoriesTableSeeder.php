<?php

use Illuminate\Database\Seeder;
use App\Post;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// Reset table
        DB::table('categories')->truncate();

        $categories = [
        	[
        		'title' => 'Web Design',
        		'slug' => 'web-design', 
                'created_at' => new Datetime,
                'updated_at' => new Datetime
        	],
        	[
        		'title' => 'Web Programming',
        		'slug' => 'web-programming', 
                'created_at' => new Datetime,
                'updated_at' => new Datetime
        	],
        	[
        		'title' => 'Social Marketing',
        		'slug' => 'social-marketing', 
                'created_at' => new Datetime,
                'updated_at' => new Datetime
        	],
        	[
        		'title' => 'Photography',
        		'slug' => 'photography', 
                'created_at' => new Datetime,
                'updated_at' => new Datetime
        	],
        	[
        		'title' => 'Internet',
        		'slug' => 'internet', 
                'created_at' => new Datetime,
                'updated_at' => new Datetime
        	]
        ];

        // Thêm dữ liệu
        DB::table('categories')->insert($categories);

        
    }
}
