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

    	// Making main admin role
    	DB::table('roles')->insert([
            'name' => 'Admin',
        ]);

        // Making main category
    	DB::table('categories')->insert([
            'name' => 'Other',
        ]);

    	// Making main admin account for testing
    	DB::table('users')->insert([
            'name' 		=> 'Blaz',
            'email' 	=> 'blaz@example.com',
            'password'  => bcrypt('12345'),
            'role_id'   => 1
        ]);

    	// Making random users and posts
        factory(App\User::class, 10)->create();
        factory(App\Post::class, 35)->create();
    }
}
