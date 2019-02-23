<?php

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostsTableSeeder extends Seeder
{
    public function run()
    {
        $posts = factory(Post::class)->times(50)->make()->each(function ($post, $index) {
            if ($index == 0) {
                // $post->field = 'value';
            }
        });

        Post::insert($posts->toArray());
    }

}

