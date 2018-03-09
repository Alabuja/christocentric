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
        DB::table('users')->insert(
	        array(
		        [
		            'fullname' => 'Daniel Alabuja',
		            'username' => 'DanielT',
		            'email' => 'alabujadaniel@yahoo.com',
		            'password' => bcrypt('password'),
		        ],
		        [
		        	'fullname' => 'Daniel Timi',
		            'username' => 'DanielTimi',
		            'email' => 'alabujadaniel@gmail.com',
		            'password' => bcrypt('password'),
		        ],
		        [
		        	'fullname' => 'Daniel Paul',
		            'username' => 'Daniel',
		            'email' => 'daniel@gmail.com',
		            'password' => bcrypt('password'),
		        ]
	        )
        );
    }
}
