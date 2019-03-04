<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use Auth;
use App\Models\Link;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index(Request $request, Link $link)
	{
        // 创建一个查询构造器
        $builder = Post::query();
        // 判断是否有提交 search 参数，如果有就赋值给 $search 变量
        // search 参数用来模糊搜索商品
        if ($search = $request->input('search', '')) {
            $like = '%'.$search.'%';
            // 模糊搜索文章标题、文章描述、文章详情
            $builder->where(function ($query) use ($like) {
                $query->where('title', 'like', $like)
                    ->orWhere('excerpt', 'like', $like)
                    ->orWhere('body', 'like', $like)
                    ->orderBy('created_at', 'desc');
            });
        }
		$posts = $builder->with('user', 'category')->orderBy('created_at', 'desc')->paginate(10);
        $links = $link->getAllCached();
		return view('posts.index', [
            'posts' => $posts,
            'links' => $links,
            'filters'  => [
                'search' => $search,
            ],
        ]);
	}

    public function show(Post $post)
    {
        $previous = Post::find($post->id - 1);
        $next = Post::find($post->id + 1);
        $total = Post::count();
        $post->visits()->increment();
        return view('posts.show', [
            'post' => $post,
            'previous' => $previous,
            'next' => $next,
            'total' => $total,
        ]);
    }
}
