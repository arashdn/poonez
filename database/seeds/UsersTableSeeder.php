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
//        DB::table('users')->insert(
        $user = new \App\User(
            [
                'email' => 'a@b.com',
                'name' => 'Arash',
                'password' => bcrypt('123456'),
            ]
        );
        $user->save();
    }
}
