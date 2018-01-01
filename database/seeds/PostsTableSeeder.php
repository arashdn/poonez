<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 200; $i++)
        {
            $user = DB::table('users')->first()['_id'];
            DB::table('posts')->insert(
                [
                    'title' => "title $i",
                    'Content' => 'Content',
                    'url' => 'http://arashdn.com',
                    'user_id' => $user->__toString(),
                    'tags' => ['t1','t2'],
                    'image' => '37ecd521670c014aa2ad.jpg'
                ]
            );
        }
    }
}
