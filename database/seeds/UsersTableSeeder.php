<?php

use Illuminate\Database\Seeder;

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

        \App\User::first()->update([
            'name' => 'Rolad Tacadena',
            'email' => 'tacadena.roland@gmail.com',
            'password' => bcrypt('090412')
        ]);
    }
}
