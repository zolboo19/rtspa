<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Model\Category;
use App\Model\Question;
use App\Model\Reply;
use App\Model\Like;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(User::class, 20)->create();
        factory(Category::class, 10)->create();
        factory(Question::class, 20)->create();
        //factory(Reply::class, 50)->create(); //энэ ажиллахгүй байгаа.
        factory(Reply::class, 50)->create()->each(function($reply){
            return $reply->like()->save(factory(Like::class)->make());
        });
        //reply seed хийх үед Reply.php model-д байгаа static function boot function-ыг сайн харж байх.
        //учир нь user_id гэсэн утгыг зөвхөн хэрэглэгч нэвтэрсэн үед буцаадаг болгосон байгаа.
        //Тиймээс хэрэглэгчийн ID-ирэхгүй. Коммент болгож байгаад seed хийнэ. Дараа нь комментыг арилгана.
        // factory(Reply::class, 50)->create()->each(function ($reply) {
        //     return $reply->like()->save(factory(Like::class)->make());
        // });
    }
}
