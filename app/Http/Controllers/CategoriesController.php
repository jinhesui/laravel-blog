<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Link;

class CategoriesController extends Controller
{
    public function show(Request $request,Category $category, Link $link)
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
                    ->orWhere('body', 'like', $like)->orderBy('created_at', 'desc');
            });
        }
        // 读取分类 ID 关联的文章，并按每 10 条分页
        $posts = Post::where('category_id', $category->id)->with('user', 'category')->orderBy('created_at', 'desc')->paginate(10);
        // 资源链接
        $links = $link->getAllCached();
        // 传参变量话题和分类到模板中
        return view('posts.index', [
            'posts' => $posts,
            'category' => $category,
            'links' => $links,
            'filters'  => [
                'search' => $search,
            ],
        ]);
    }
}
