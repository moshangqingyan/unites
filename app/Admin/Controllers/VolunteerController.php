<?php

namespace App\Admin\Controllers;

use App\Volunteer;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class VolunteerController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '志愿活动';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Volunteer());

        $grid->column('id', __('Id'));
        $grid->column('publisher', __('发布者'));
        $grid->column('title', __('志愿主题'));
        $grid->column('type', '类型')->display(function ($type) {
            $options = [
                1 => '报名中',
                2 => '活动中',
                3 => '已结束',
            ];

            return $options[$type];
        });
        $grid->column('start_time', __('活动开始时间'));
        $grid->column('end_time', __('活动结束时间'));
        $grid->column('created_at', __('创建时间'));
        $grid->column('updated_at', __('修改时间'));
        $grid->filter(function($filter){
            // 去掉默认的id过滤器
            $filter->disableIdFilter();
            // 在这里添加字段过滤器
            $filter->equal('title', '志愿主题');
            $filter->equal('publisher', '发布者');
            $filter->equal('type', '类型')->select([1 => '报名中', 2 => '活动中', 3 => '已结束']);
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
        $show = new Show(Volunteer::findOrFail($id));



        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Volunteer());

        $form->display('id', 'Id');
        $form->text('publisher', '发布者');
        $form->text('title', '志愿主题');
        $form->editor('content', '详情内容');
        $options = [
            1 => '报名中',
            2 => '活动中',
            3 => '已结束',
        ];
        $form->select('type', '类型')->options($options);
        $form->datetime('start_time', '开始时间')->format('YYYY-MM-DD HH:mm:ss');
        $form->datetime('end_time', '结束时间')->format('YYYY-MM-DD HH:mm:ss');
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
