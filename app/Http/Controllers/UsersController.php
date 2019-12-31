<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Handlers\ImageUploadHandler;
use App\Http\Requests\UserRequest;

class UsersController extends Controller
{
    // 用户信息
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    // 编辑信息
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    // 编辑信息-提交
    public function update(UserRequest $request, ImageUploadHandler $uploader, User $user)
    {
        $data = $request->all();

        if ($request->avatar) {
            $result = $uploader->save($request->avatar, 'avatars', $user->id, 416);
            if ($result) {
                $data['avatar'] = $result['path'];
            }
        }

        $user->update($data);
        return redirect()->route('users.show', $user->id)->with('success', '个人资料更新成功！');
    }
}
