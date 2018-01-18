<?php

use Illuminate\Database\Seeder;
use Sleimanx2\Plastic\Facades\Plastic;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = Plastic::getClient();
        if($client->indices()->exists(['index'=> Plastic::getDefaultIndex()]))
            $client->indices()->delete(['index'=> Plastic::getDefaultIndex()]);
        $client->indices()->create(['index' => Plastic::getDefaultIndex()]);

        \Illuminate\Support\Facades\Artisan::call('mapping:rerun');
        echo "Elastic Index re-created\n";

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
