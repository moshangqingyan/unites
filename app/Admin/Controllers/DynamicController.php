<?php

namespace App\Admin\Controllers;

use App\Dynamic;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class DynamicController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '动态';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Dynamic());

        $grid->column('id', __('Id'));
        $grid->column('title', '标题');
        $grid->column('publisher', __('发布机构'));
        $grid->column('publish_time', __('发布时间'));
        $grid->column('created_at', __('创建时间'));
        $grid->column('updated_at', __('修改时间'));
        $grid->filter(function($filter){
            // 去掉默认的id过滤器
            $filter->disableIdFilter();
            // 在这里添加字段过滤器
            $filter->equal('title', '标题');
            $filter->equal('publisher', '发布机构');

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
        $show = new Show(Dynamic::findOrFail($id));



        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Dynamic());

        $form->display('id', 'Id');
        $form->text('publisher', '发布机构')->rules('required');
        $form->text('title', '标题')->rules('required');
        $form->image('', '缩略图')->rules('required');
        $form->editor('content', '内容')->rules('required');
        $form->datetime('publish_time', '发布时间')->rules('required');
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
