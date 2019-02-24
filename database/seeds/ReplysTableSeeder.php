<?php

use Illuminate\Database\Seeder;
use App\Models\Reply;
use App\Models\User;
use App\Models\Post;

class ReplysTableSeeder extends Seeder
{
    public function run()
    {
        // 所有用户 ID 数组，如：[1,2,3,4]
        $user_ids = User::all()->pluck('id')->toArray();

        // 所有话题 ID 数组，如：[1,2,3,4]
        $post_ids = Post::all()->pluck('id')->toArray();

        // 获取 Faker 实例
        $faker = app(Faker\Generator::class);

        $replys = factory(Reply::class)
                        ->times(100)
                        ->make()
                        ->each(function ($reply, $index)
                            use ($user_ids, $post_ids, $faker)
        {
            // 从用户 ID 数组中随机取出一个并赋值
            $reply->user_id = $faker->randomElement($user_ids);

            // 话题 ID，同上
            $reply->post_id = $faker->randomElement($post_ids);
        });

        // 将数据集合转换为数组，并插入到数据库中
        Reply::insert($replys->toArray());
    }
}
