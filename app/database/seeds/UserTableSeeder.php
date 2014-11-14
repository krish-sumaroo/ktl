<?php

class UserTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('users')->delete();
		User::create(['name' => 'User 1',
					   'username' => 'user1',
					   'email' => 'user1@kitole.mu',
					   'password' => Hash::make('test')	
			]);
	}
}