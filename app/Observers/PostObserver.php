<?php

namespace App\Observers;

use App\Models\Post;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class PostObserver
{
    public function saving(Post $post)
    {
        $post->excerpt = make_excerpt($post->body);
    }
}
