<?php

use Illuminate\Database\Seeder;

class ArtistesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('artistes')->insert(
        	array(
        		[
		            'artiste_name' => 'Out Burst Music Group',
		            'biography' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, rerum nemo accusamus recusandae vitae sunt placeat illo amet temporibus dolorum reiciendis odio ut, magnam, itaque ducimus veniam eaque. Cum, beatae? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit minus voluptates expedita dolorum officiis quos cum earum neque ipsa aperiam esse impedit eveniet nisi sunt architecto vitae magnam, magni maxime.',
		            'slug' => 'out-burst-music-group',
		        ],
		        [
		            'artiste_name' => 'Kim Walker',
		            'biography' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, rerum nemo accusamus recusandae vitae sunt placeat illo amet temporibus dolorum reiciendis odio ut, magnam, itaque ducimus veniam eaque. Cum, beatae? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit minus voluptates expedita dolorum officiis quos cum earum neque ipsa aperiam esse impedit eveniet nisi sunt architecto vitae magnam',
		            'slug' => 'kim-walker',
		        ],
		        [
		            'artiste_name' => 'Tomiwa',
		            'biography' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, rerum nemo accusamus recusandae vitae sunt placeat illo amet temporibus dolorum reiciendis odio ut, magnam, itaque ducimus veniam eaque. Cum, beatae? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit minus voluptates expedita dolorum officiis quos cum earum neque ipsa aperiam esse impedit eveniet nisi sunt architecto vitae magnam, magni',
		            'slug' => 'tomiwa',
		        ]
	        )
        );
    }
}
