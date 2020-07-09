<?php

namespace App\Admin\Controllers;

use App\Thumb;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ThumbController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '我要点赞';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Thumb());

        $grid->column('id', __('Id'));
        $grid->column('url', __('图片'))->display(function ($url) {
            return '<img style="width:200px" src="/uploads/' . $url . '" />';
        });
        $grid->column('introduce', __('简介'));
        $grid->column('thumbs', __('点赞数'));
        $grid->column('show', '显示?')->display(function ($show) {
            return $show == 1 ? '隐藏' : '显示';
        });
        $grid->column('created_at', __('创建时间'));
        $grid->column('updated_at', __('修改时间'));
        $grid->filter(function($filter){
            // 去掉默认的id过滤器
            $filter->disableIdFilter();
            // 在这里添加字段过滤器
            $filter->equal('show', '是否显示')->select([1 => '隐藏', 2 => '显示']);;
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
        $show = new Show(Thumb::findOrFail($id));



        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Thumb());

        $form->display('id', 'Id');
        $form->image('url', '缩略图');
        $form->text('introduce', '简介');
        $form->text('thumbs', '点赞数');
        $form->radio('show', '是否显示')->options([1 => '隐藏', 2 => '显示'])->default(2);
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
