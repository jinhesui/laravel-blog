<?php

namespace App\Observers;

use App\Models\Reply;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class ReplyObserver
{
    public function created(Reply $reply)
    {
        $reply->post->reply_count = $reply->post->replies->count();
        $reply->post->save();
    }

    public function creating(Reply $reply)
    {
        $reply->content = clean($reply->content, 'user_post_body');
    }
}
