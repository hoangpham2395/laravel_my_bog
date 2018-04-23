<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    	// Reset the users table
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();

        $date = date('Y-m-d H:i:s', strtotime('2017-09-01'));

        $users = [
            [   
            	'name' => 'John Doe',
            	'email' => 'johndoe@email.com',
            	'password' => bcrypt('secret'), 
                'created_at' => $date, 
                'updated_at' => $date
            ],
            [
            	'name' => 'Hoang Pham',
            	'email' => 'hoangpham@email.com',
            	'password' => bcrypt(123456),
                'created_at' => $date, 
                'updated_at' => $date
            ],
            [   
            	'name' => 'Edo Masaru',
            	'email' => 'edo@email.com',
            	'password' => bcrypt('secret'),
                'created_at' => $date, 
                'updated_at' => $date
            ],
            [   
            	'name' => 'Jane Doe',
            	'email' => 'janedoe@email.com',
            	'password' => bcrypt('secret'),
                'created_at' => $date, 
                'updated_at' => $date
            ],
            [   
                'name' => 'demo',
                'email' => 'demo@email.com',
                'password' => bcrypt('123123'),
                'created_at' => $date, 
                'updated_at' => $date
            ]
        ];

        DB::table('users')->insert($users);
    }
}
