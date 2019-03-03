<?php

namespace App\Admin\Controllers;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class PostsController extends Controller
{
    use HasResourceActions;

    public function index(Content $content)
    {
        return $content
            ->header('文章列表')
            ->body($this->grid());
    }

    public function edit($id, Content $content)
    {
        return $content
            ->header('编辑文章')
            ->body($this->form()->edit($id));
    }

    public function create(Content $content)
    {
        return $content
            ->header('创建文章')
            ->body($this->form());
    }

    protected function grid()
    {
        $grid = new Grid(new Post);

        $grid->id('Id')->sortable();
        $grid->title('标题');
        $grid->user_id('用户ID');
        $grid->category_id('分类ID');
        $grid->reply_count('评论数');
        $grid->view_count('阅读数');
        $grid->created_at('创建于');
        $grid->updated_at('更新于');

        $grid->actions(function ($actions) {
            $actions->disableView();
            $actions->disableDelete();
        });
        $grid->tools(function ($tools) {
            // 禁用批量删除按钮
            $tools->batch(function ($batch) {
                $batch->disableDelete();
            });
        });

        return $grid;
    }

    protected function form()
    {
        $form = new Form(new Post);

        $form->text('title', '标题')->rules('required');
        $form->editor('body', '内容')->rules('required');
        $form->select('category_id', '分类')->options([1 => '日志', 2 => '数学', 3 => '英语', 4 => '笔记']);
        $form->image('image', '文章封面')->rules('image')->move('uploads/images');

        return $form;
    }
}
