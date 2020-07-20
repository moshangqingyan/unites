<?php

namespace App\Admin\Actions\Account;

use Encore\Admin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class Download extends RowAction
{
    public $name = '下载';

    public function handle(Model $model)
    {
        // $model ...
        $this->code($model->id);

        return $this->response()->success('Success！')->download(url('qrCodes') . "/{$model->id}.png");
    }

    public function code($id)
    {
        if (!$id) {
            return false;
        }
        $res = QrCode::format('png')->size(200)->encoding('UTF-8')
            ->generate(url('web/user-center/' . $id), public_path("qrCodes/{$id}.png"));
        if ($res) {
            return url('admin/user-center/' . $id);
        } else {
            return false;
        }
    }

}