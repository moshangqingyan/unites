<?php

namespace App\Admin\Controllers;

use App\Account;
use App\RedOrBlack;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class RankController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '红黑榜';

    public $tag = [
        1 => '卫生',
        2 => '文明',
        3 => '德治',
        4 => '自治',
        5 => '法制',
        6 => '农技',
    ];

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new RedOrBlack());

        $grid->column('id', __('Id'));
        $grid->column('userinfo_id', __('姓名'))->display(function ($userinfo_id) {
            $account = Account::find($userinfo_id);
            return $account->name;
        });
        $grid->column('tag', __('标签'))->display(function ($tag) {
            $tags = [
                1 => '卫生',
                2 => '文明',
                3 => '德治',
                4 => '自治',
                5 => '法制',
                6 => '农技',
            ];
            return $tags[$tag];
        });
        $grid->column('title', __('标题'));
        $grid->column('type', '红黑榜')->display(function ($type) {
            $options = [
                1 => '红榜',
                2 => '黑榜',
            ];
            return $options[$type];
        });
        $grid->column('time', __('时间'));
        $grid->column('created_at', __('创建时间'));
        $grid->column('updated_at', __('修改时间'));
        $grid->filter(function($filter){
            // 去掉默认的id过滤器
            $filter->disableIdFilter();
            // 在这里添加字段过滤器
            $filter->equal('userinfo_id', '姓名')->select(Account::all()->pluck('name', 'id'));
            $filter->equal('type', '红黑榜')->select([1 => '红榜', 2 => '黑榜']);
            // 设置datetime类型
            $filter->between('time', '时间')->datetime();

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
        $show = new Show(RedOrBlack::findOrFail($id));

        $show->field('id', 'Id');
        $show->field('userinfo_id', '姓名')->as(function($userinfo_id) {
            $account = Account::find($userinfo_id);
            return $account->name;
        });
        $show->field('tag', '标签')->as(function ($tag) {
            return $this->tag[$tag];
        });
        $show->field('title', '标签');
        $show->type('红黑榜')->as(function ($type) {
            $r = [
                1 => '红榜',
                2 => '黑榜',
            ];
            return $r[$type];
        });
        $show->field('time', '时间');
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new RedOrBlack());

        $form->display('id', 'ID');
        $form->select('userinfo_id', '姓名')->options(Account::all()->pluck('name', 'id'));
        $form->select('tag', '标签')->options($this->tag);
        $form->text('title', '标题');
        $type = [
            1 => '红榜',
            2 => '黑榜',
        ];
        $form->select('type', '红黑榜')->options($type);
        $form->editor('content', '详情内容');
        $form->datetime('time', '时间')->rules('required');
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
