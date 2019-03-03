<?php

namespace App\Admin\Controllers;

use App\Models\Link;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class LinksController extends Controller
{
    use HasResourceActions;

    public function index(Content $content)
    {
        return $content
            ->header('资源链接')
            ->body($this->grid());
    }

    public function edit($id, Content $content)
    {
        return $content
            ->header('编辑链接')
            ->body($this->form()->edit($id));
    }


    public function create(Content $content)
    {
        return $content
            ->header('创建链接')
            ->body($this->form());
    }

    protected function grid()
    {
        $grid = new Grid(new Link);

        $grid->id('ID');
        $grid->title('名称');
        $grid->link('链接');
        $grid->actions(function ($actions) {
            $actions->disableView();
        });

        return $grid;
    }

    protected function form()
    {
        $form = new Form(new Link);

        $form->text('title', '名称');
        $form->url('link', '链接');

        return $form;
    }
}
