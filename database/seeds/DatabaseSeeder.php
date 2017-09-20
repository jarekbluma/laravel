<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
 use App\Friend;

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

        $number_of_users = 20;

        for($user_id=1; $user_id <= $number_of_users; $user_id++)
        {
        	
        	if($user_id === 1)
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
        	
            for ($i=1; $i <= $faker -> numberBetween($min = 0, $max = $number_of_users - 1); $i++)
            { 
                $friend_id = $faker -> numberBetween($min = 1, $max = $number_of_users);

                $find = Friend::where([
                            'user_id' => $user_id,
                            'friend_id' => $friend_id,
                        ]) ->orWhere([
                            'user_id' => $friend_id,
                            'friend_id' => $user_id,
                        ]) -> exists();

                if ( ! $find ) 
                {
                          DB::table('friends') -> insert([
                          'user_id' => $user_id ,
                          'friend_id' => $friend_id,
                          'accepted' => 1,
                          'created_at' => $faker -> dateTimeThisYear($max = 'now'),
                           ]);  
                }        
            }
        }

    }
}
