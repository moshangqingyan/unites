<?php

namespace App\Admin\Controllers;

use App\Account;
use App\Admin\Actions\Account\Download;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
//use function GuzzleHttp\Psr7\uri_for;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AccountController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '用户管理';

    public function code($id = 1)
    {
        if (!$id) {
            return false;
        }
        $res = QrCode::format('png')->size(200)->color(255,0,255)->encoding('UTF-8')
            ->generate(url('admin/user-center/' . $id), public_path("qrCodes/1.png"));
        var_dump($res);
        if ($res) {
            return url($id . '.png');
        } else {
            return false;
        }
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Account());

        $grid->column('id', __('Id'));
        $grid->column('name', __('名字'));
        $grid->column('tags', __('标签'));
        $grid->column('ba', '八好荣光')->display(function ($ba) {
            $options = [
                    1 => '好卫生',
                    2 => '好生活',
                    3 => '好家人',
                    4 => '好邻居',
                    5 => '好村民',
                    6 => '好帮手',
                    7 => '好心肠',
                    8 => '好农技',
                ];
            $ba = json_decode($ba, true);
            $html = '';
            if (is_array($ba)) {
                foreach ($ba as $v) {
                    $html .= "<span class='label label-success'>$options[$v]</span>&nbsp;";
                }
            }
            return $html;
        });
        $grid->column('created_at', __('创建时间'));
        $grid->column('updated_at', __('修改时间'));
        $grid->filter(function($filter){
            // 去掉默认的id过滤器
            $filter->disableIdFilter();
            // 在这里添加字段过滤器
            $filter->equal('name', '姓名');

        });
        $grid->actions(function ($actions) {
            // 添加操作
            $actions->add(new Download());
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
        $show = new Show(Account::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('名字'));
        $show->field('tags', __('标签'));
        $show->ba('八好荣光')->unescape()->as(function ($ba) {
            $options = [
                1 => '好卫生',
                2 => '好生活',
                3 => '好家人',
                4 => '好邻居',
                5 => '好村民',
                6 => '好帮手',
                7 => '好心肠',
                8 => '好农技',
            ];
            $ba = json_decode($ba, true);
            $html = '';
            if (is_array($ba)) {
                foreach ($ba as $v) {
                    $html .= "<span class='label label-success'>$options[$v]</span>&nbsp;";
                }
            }
            return $html;
        });
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
        $form = new Form(new Account());

        $form->display('id', 'ID');
        $form->text('name', '名字')->rules('required');
        $form->text('tags', '标签')->rules('required');
        $options = [
            1 => '好卫生',
            2 => '好生活',
            3 => '好家人',
            4 => '好邻居',
            5 => '好村民',
            6 => '好帮手',
            7 => '好心肠',
            8 => '好农技',
        ];
        $checked = [];
        $account = request()->route()->parameters();
        if (array_key_exists('account', $account)) {
            $ba = Account::find($account['account']);
            $checked = json_decode($ba->ba, true);
        }
        $form->checkbox('ba', '八好荣光')->options($options)->default($checked)->checked($checked);
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
