<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $faker = Faker::create('pl_PL');
        $pass = 'qwerty';

        $number_of_users = 10;

        for($i=0; $i <= 19; $i++)
        {
        	
        	if($i === 0)
        	{
        		DB::table('users') -> insert([
        		'name' => 'jarek' ,
        		'email'	=> 'jarekbluma@gmail.com',
        		'password' => bcrypt($pass),

        		]);
        	}
        	else
        	{
        		$name = $faker -> FirstNameMale . ' ' . $faker -> LastNameMale;

        		DB::table('users') -> insert([
        		'name' => $name ,
        		'email'	=> str_replace('-', '', str_slug($name)) . '@' . $faker -> safeEmailDomain,
        		'password' => bcrypt($pass),
        		]);
        	}	
        	
        }

    }
}
