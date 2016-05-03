<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
          'name' => 'Admin',
          'email' => 'admin@inventaris.dev',
          'password' => bcrypt('admin'),
          'role' => 'admin',
          'avatar' => 'img.jpg'
        ]);

        User::create([
          'name' => 'Operator',
          'email' => 'operator@inventaris.dev',
          'password' => bcrypt('operator'),
          'role' => 'operator',
          'avatar' => 'operator.png'
        ]);
    }
}
