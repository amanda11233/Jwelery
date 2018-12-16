<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        $faker = \Faker\Factory::create();
        $password = Hash::make('user123');
        User::create(
            [
                'name' => $faker->name,
                'email' => $faker->email,
                'address' => 'Nepal',
                'phone' => '9808443383',
                'password' => $password,
                'gender' => 'Male',

            ]
        );
    }
}
