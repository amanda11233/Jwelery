<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $this->call(AdminsTableSeeder::class);
      $this->call(UsersTableSeeder::class);
    }
}
