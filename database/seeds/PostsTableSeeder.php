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
        $images = ['8ccf428fa8bfaeb3c468.jpg','a8f84265fc86795db7fa.jpg'];
        for ($i = 1; $i < 200; $i++)
        {
            $user = DB::table('users')->first()['_id'];
            $date = new DateTime();
            $date->sub(new DateInterval('P'.(202-$i).'D'));
            DB::table('posts')->insert(
                [
                    'title' => "title $i",
                    'content' => 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.',
                    'url' => 'http://arashdn.com',
                    'pubic' => $i%2 == 0,
                    'user_id' => $user->__toString(),
                    'tags' => ['t1','t2'],
                    'image' => $images[array_rand($images)],
                    'pins' => [],
                    'pin_count' => 0,
                    'created_at' => new \MongoDB\BSON\UTCDateTime($date),
                    'updated_at' => new \MongoDB\BSON\UTCDateTime($date),
                ]
            );
        }
    }
}
