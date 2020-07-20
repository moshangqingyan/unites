<?php

namespace App\Admin\Controllers;

use App\Account;
use App\Reception;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ReceptionController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '签到管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Reception());

        $grid->column('id', __('Id'));
        $grid->column('userinfo_id', __('姓名'))->display(function ($userinfo_id) {
            $account = Account::find($userinfo_id);
            return @$account->name;
        });
        $grid->column('name', __('签到姓名'));
        $grid->column('created_at', __('创建时间'));
        $grid->column('updated_at', __('修改时间'));
        $grid->filter(function($filter){
            // 去掉默认的id过滤器
            $filter->disableIdFilter();
            // 在这里添加字段过滤器
            $filter->equal('userinfo_id', '姓名')->select(Account::all()->pluck('name', 'id'));
            $filter->equal('name', '签到姓名');
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
        $show = new Show(Reception::findOrFail($id));
        $show->field('id', __('Id'));
        $show->userinfo_id('姓名')->unescape()->as(function ($userinfo_id) {

            $account = Account::find($userinfo_id);
            return @$account->name;

        });
        $show->field('name', __('签到姓名'));
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
        $form = new Form(new Reception());
        $form->display('id', 'ID');
        $form->select('userinfo_id', '姓名')->options(Account::all()->pluck('name', 'id'));
        $form->text('name', '签到姓名')->rules('required');

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
