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

        $user = new \App\User(
            [
                'email' => 'a@c.com',
                'name' => 'علی',
                'password' => bcrypt('123456'),
                'followers' => [],
                'following' => [],
            ]
        );
        $user->save();
        $user2 = new \App\User(
            [
                'email' => 'a@b.com',
                'name' => 'آرش',
                'password' => bcrypt('123456'),
                'followers' => [],
                'following' => [$user->_id],
            ]
        );
        $user2->save();

        $user->followers = [$user2->_id];
        $user->save();
    }
}
