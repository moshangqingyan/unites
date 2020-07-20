<?php

namespace App\Admin\Controllers;

use App\Article;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ArticleController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '文章';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Article());

        $grid->column('id', __('Id'));
        $grid->column('publisher', __('发布者'));
        $grid->column('title', __('标题'));
        $grid->column('type', '文章栏目')->display(function ($type) {
            $options = [
                1 => '文化大礼堂',
                2 => '产品大讲堂',
                3 => '我要学政策',
            ];
            return $options[$type];
        });
        $grid->column('created_at', __('创建时间'));
        $grid->column('updated_at', __('修改时间'));
        $grid->filter(function($filter){
            // 去掉默认的id过滤器
            $filter->disableIdFilter();
            // 在这里添加字段过滤器
            $filter->equal('title', '标题');
            $filter->equal('publisher', '发布者');
            $filter->equal('type', '文章栏目')->select([1 => '文化大礼堂', 2 => '产品大讲堂', 3 => '我要学政策']);
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
        $show = new Show(Article::findOrFail($id));



        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Article());

        $form->display('id', 'Id');
        $form->text('publisher', '发布者')->rules('required');
        $form->text('title', '标题')->rules('required');
        $form->editor('content', '详情内容')->rules('required');
        $options = [
            1 => '文化大礼堂',
            2 => '产品大讲堂',
            3 => '我要学政策',
        ];
        $form->select('type', '文章栏目')->options($options)->rules('required');
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
