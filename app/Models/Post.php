<?php

namespace App\Models;

class Post extends Model
{
    protected $fillable = [
        'title', 'body', 'category_id', 'excerpt', 'slug', 'image',
    ];

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setImageAttribute($path)
    {
        // 如果不是'http'子串开头，那就是从后台上传的，需要补全 URL
        if ( ! starts_with($path, 'http')) {
            // 拼接完整的 URL
            $path = config('app.url') . "/storage/$path";
        }

        $this->attributes['image'] = $path;
    }
}
