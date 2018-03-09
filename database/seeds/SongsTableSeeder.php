<?php

use Illuminate\Database\Seeder;

class SongsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// $users = User::all()->where('id')->first();
        DB::table('songs')->insert(
        	array(
		       [
		           'song_title' => 'Grace Anthem',
		           'artiste_name' => 'Kim Walker',
		           'lyrics' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta distinctio, qui harum iure, culpa atque sint eaque debitis tempore quisquam in officia dolorem, aut voluptatem ipsum perspiciatis. Animi, eveniet, sapiente? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius non tempore, iste odio a molestias porro nam laudantium architecto unde reprehenderit repudiandae veniam quae, expedita, asperiores quibusdam. Soluta, non, doloribus?',
		       		'download_link' => 'http://old.hulkshare.com/dl/i9bcqflwlcsg/My_Hero_I39m_In_Love_With_You.mp3?d=1',
		            'user_id' => 1,
		       ],
		       [
		            'song_title' => 'Hallelujah',
		            'artiste_name' => 'Tomiwa',
		            'lyrics' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta distinctio, qui harum iure, culpa atque sint eaque debitis tempore quisquam in officia dolorem, aut voluptatem ipsum perspiciatis. Animi, eveniet, sapiente? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius non tempore, iste odio a molestias porro nam laudantium architecto unde reprehenderit repudiandae veniam quae, expedita, asperiores quibusdam. Soluta, non, doloribus?',
		           'download_link' => 'http://old.hulkshare.com/dl/i9bcqflwlcsg/My_Hero_I39m_In_Love_With_You.mp3?d=1',
		           'user_id' => 3,
		        ],
		       [
		            'song_title' => 'Stedfast Love',
		       	    'artiste_name' => 'Out-Burst Music Group',
		            'lyrics' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta distinctio, qui harum iure, culpa atque sint eaque debitis tempore quisquam in officia dolorem, aut voluptatem ipsum perspiciatis. Animi, eveniet, sapiente? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius non tempore, iste odio a molestias porro nam laudantium architecto unde reprehenderit repudiandae veniam quae, expedita, asperiores quibusdam. Soluta, non, doloribus?',
		            'download_link' => 'http://old.hulkshare.com/dl/i9bcqflwlcsg/My_Hero_I39m_In_Love_With_You.mp3?d=1',
		            'user_id' => 2,
		        ],
		        [
		            'song_title' => 'Hallelujah God is Great',
		            'artiste_name' => 'Out-Burst Music Group',
		            'lyrics' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta distinctio, qui harum iure, culpa atque sint eaque debitis tempore quisquam in officia dolorem, aut voluptatem ipsum perspiciatis. Animi, eveniet, sapiente? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius non tempore, iste odio a molestias porro nam laudantium architecto unde reprehenderit repudiandae veniam quae, expedita, asperiores quibusdam. Soluta, non, doloribus?',
		            'download_link' => 'http://old.hulkshare.com/dl/i9bcqflwlcsg/My_Hero_I39m_In_Love_With_You.mp3?d=1',
		            'user_id' => 3,
		        ]
		    )
        );
    }
}
