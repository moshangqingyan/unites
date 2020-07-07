<?php

namespace App\Admin\Controllers;

use App\Sign;
use App\Volunteer;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class SignController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '志愿报名';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Sign());

        $grid->column('id', __('Id'));
        $grid->column('volunteer_id', __('志愿活动'))->display(function ($volunteer_id) {
            $volunteer = Volunteer::find($volunteer_id);
            return $volunteer->title;
        });
        $grid->column('name', __('姓名'));
        $grid->column('six', '性别')->display(function ($six) {
            return $six == 1 ? '男' : '女';
        });
        $grid->column('age', __('年龄'));
        $grid->column('occupation', __('职业'));
        $grid->column('phone', __('手机号码'));
        $grid->column('hobby', __('爱好'));
        $grid->column('declaration', __('志愿宣言'));
        $grid->column('created_at', __('创建时间'));
        $grid->column('updated_at', __('修改时间'));
        $grid->filter(function($filter){
            // 去掉默认的id过滤器
            $filter->disableIdFilter();
            // 在这里添加字段过滤器
            $filter->equal('volunteer_id', '姓名')->select(Volunteer::all()->pluck('title', 'id'));
            $filter->equal('six', '性别')->select([1 => '男', 2 => '女']);
            $filter->equal('phone', '手机号码');
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
        $show = new Show(Sign::findOrFail($id));

        $show->field('id', 'Id');
        $show->volunteer_id('志愿主题')->unescape()->as(function ($volunteer_id) {
            $volunteer = Volunteer::find($volunteer_id);
            return $volunteer->title;
        });
        $show->field('name', '姓名');
        $show->field('six', '性别')->as(function ($six) {
            return $six == 1 ? '男' : '女';
        });
        $show->field('age', '年龄');
        $show->field('occupation', '职业');
        $show->field('phone', '手机号码');
        $show->field('hobby', '爱好');
        $show->field('declaration', '志愿宣言');
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Sign());

        $form->display('id', 'Id');
        $form->select('volunteer_id', '志愿主题')->options(Volunteer::all()->pluck('title', 'id'));
        $form->text('name', '姓名');
        $form->radio('six', '性别')->options([1 => '男', 2 => '女'])->default(1);
        $form->text('age', '年龄')->rules('required|regex:/^\d+$/', [
            'regex' => '必须全部为数字',
        ]);
        $form->text('occupation', '职业');
        $form->mobile('phone', '手机号码');
        $form->text('hobby', '爱好');
        $form->text('declaration', '志愿宣言');
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
