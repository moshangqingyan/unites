<?php

namespace App\Admin\Controllers;

use App\Memorabilia;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class MemorabiliaController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '大事记';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Memorabilia());
        $grid->column('id', __('Id'));
        $grid->column('title', __('标题'));
        $grid->column('introduce', __('简介'));
        $grid->column('created_at', __('创建时间'));
        $grid->column('updated_at', __('修改时间'));
        $grid->filter(function($filter){
            // 去掉默认的id过滤器
            $filter->disableIdFilter();
            // 在这里添加字段过滤器
            $filter->equal('title', '标题');

        });
        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Memorabilia::findOrFail($id));

        $show->field('name', __('名字'));
        $show->field('tags', __('标签'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Memorabilia());

        $form->display('id', 'ID');
        $form->text('title', '标题');
        $form->text('introduce', '简介');
//        $form->text('content', '内容');
        $form->editor('content', '内容');
        $form->footer(function ($footer) {

            // 去掉`查看`checkbox
            $footer->disableViewCheck();

            // 去掉`继续编辑`checkbox
            $footer->disableEditingCheck();

            // 去掉`继续创建`checkbox
            $footer->disableCreatingCheck();

        });
        return $form;
    }
}
