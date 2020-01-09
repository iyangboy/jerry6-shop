<?php

namespace App\Admin\Actions\User;

use App\Handlers\ImageUploadHandler;
use Encore\Admin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CheckGrade extends RowAction
{
    public $name = '审核用户等级';

    public function handle(Model $model, Request $request)
    {
        $grade = $request->grade ?? 0;
        // $remark = $request->get('remark');
        $remark = $request->remark;
        // if ($request->avatar) {
        //     $uploader = new ImageUploadHandler();
        //     $result = $uploader->save($request->avatar, 'avatars', $model->id, 416);
        //     if ($result) {
        //         $data['avatar'] = $result['path'];
        //         $model->avatar = $result['path'];
        //     }
        // }
        $model->grade = $grade;
        $model->save();
        return $this->response()->success('操作成功')->refresh();
    }

    public function form(Model $model)
    {
        // $this->image('avatar', '图片');
        $this->select('grade', '会员类型')->options([0 => '终端客户', 1 => '普通会员'])->default($model->grade);
        // $this->textarea('remark', '备注信息');
    }

}
