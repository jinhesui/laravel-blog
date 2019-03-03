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
                    ->orWhere('body', 'like', $like);
            });
        }
		$posts = $builder->with('user', 'category')->paginate(10);
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

	public function create(Post $post)
	{
		return view('posts.create_and_edit', compact('post'));
	}

	public function store(PostRequest $request)
	{
		$post = Post::create($request->all());
		return redirect()->route('posts.show', $post->id)->with('message', 'Created successfully.');
	}

	public function edit(Post $post)
	{
        $this->authorize('update', $post);
		return view('posts.create_and_edit', compact('post'));
	}

	public function update(PostRequest $request, Post $post)
	{
		$this->authorize('update', $post);
		$post->update($request->all());

		return redirect()->route('posts.show', $post->id)->with('message', 'Updated successfully.');
	}

	public function destroy(Post $post)
	{
		$this->authorize('destroy', $post);
		$post->delete();

		return redirect()->route('posts.index')->with('message', 'Deleted successfully.');
	}
}
