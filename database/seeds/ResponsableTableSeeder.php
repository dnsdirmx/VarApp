<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class ResponsableTableSeeder extends Seeder
{
    /**
	 *      * Run the database seeds.
	 *           *
	 *                * @return void
	 *                     */
    public function run()
    {
			
		DB::table('responsables')->insert([
			'nombre' => 'Hector Villa',
			'email' => 'user@user.com',
			'password' => Hash::make('secret'),
			'api_token' => str_random(60),
		]);
	
	}
}
