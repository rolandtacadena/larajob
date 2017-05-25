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
        factory(\App\User::class, 100)->create();

        User::first()->update([
            'name' => 'Roland Tacadena',
            'email' => 'tacadena.roland@gmail.com',
            'password' => bcrypt('090412')
        ]);
    }
}
