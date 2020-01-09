<?php

namespace App\Admin\Actions\Post;

use Encore\Admin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;

class Replicate extends RowAction
{
    public $name = '复制';

    public function handle(Model $model)
    {
        // 这里调用模型的`replicate`方法复制数据，再调用`save`方法保存
        $model->replicate()->save();

        // 返回一个内容为`复制成功`的成功信息，并且刷新页面
        return $this->response()->success('复制成功.')->refresh();
    }

}
