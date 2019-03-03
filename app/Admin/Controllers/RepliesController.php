<?php

namespace App\Admin\Controllers;

use App\Models\Reply;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class RepliesController extends Controller
{
    use HasResourceActions;

    public function index(Content $content)
    {
        return $content
            ->header('评论列表')
            ->body($this->grid());
    }

    protected function grid()
    {
        $grid = new Grid(new Reply);

        $grid->id('ID')->sortable();
        $grid->post_id('文章ID');
        $grid->user_id('用户ID');
        $grid->content('评论内容');
        $grid->created_at('评论时间');
        $grid->actions(function ($actions) {
            $actions->disableView();
            $actions->disableEdit();
        });

        return $grid;
    }
}
