<?php

namespace App\Admin\Controllers;

use App\Account;
use App\Integral;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class IntergralController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '基金';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Integral());

        $grid->column('id', __('Id'));
        $grid->column('userinfo_id', __('姓名'))->display(function ($userinfo_id) {
            $account = Account::find($userinfo_id);
            return $account->name;
        });
        $grid->column('type', '类型')->display(function ($type) {
            // 1获得，2扣除，2使用
            $r = [
                1 => '获得',
                2 => '扣除',
                3 => '兑换',
            ];
            return $r[$type];
        });
        $grid->column('integral', __('基金'));
        $grid->column('remark', __('备注'));
        $grid->column('created_at', __('创建时间'));
        $grid->column('updated_at', __('修改时间'));
        $grid->filter(function($filter){
            // 去掉默认的id过滤器
            $filter->disableIdFilter();
            // 在这里添加字段过滤器
            $filter->equal('userinfo_id', '姓名')->select(Account::all()->pluck('name', 'id'));
            $filter->equal('type', '类型')->select([1 => '获得', 2 => '扣除', 3 => '兑换']);
//            $filter->equal('publisher', '发布机构');

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
        $show = new Show(Integral::findOrFail($id));
        $show->field('id', __('Id'));
        $show->userinfo_id('姓名')->unescape()->as(function ($userinfo_id) {

            $account = Account::find($userinfo_id);
            return $account->name;

        });
        $show->type('类型')->as(function ($type) {
            $r = [
                1 => '获得',
                2 => '扣除',
                3 => '兑换',
            ];
            return $r[$type];
        });
        $show->field('integral', __('基金'));
        $show->field('remark', __('备注'));
        $show->field('created_at', __('创建时间'));
        $show->field('updated_at', __('修改时间'));


        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Integral());
        $form->display('id', 'ID');
        $form->select('userinfo_id', '姓名')->options(Account::all()->pluck('name', 'id'))->rules('required');
        $type = [
            1 => '获得',
            2 => '扣除',
            3 => '兑换',
        ];
        $form->select('type', '积金类型')->options($type)->rules('required');
        $form->text('integral', '基金')->rules('required|regex:/^\d+$/', [
            'regex' => '必须全部为数字',
        ]);
        $form->text('remark', '备注')->rules('required');

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
