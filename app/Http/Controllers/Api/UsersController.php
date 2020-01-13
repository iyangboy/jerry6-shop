<?php

namespace App\Http\Controllers\Api;

use App\Models\Image;
use App\Models\User;
use App\Http\Requests\Api\UserRequest;
use App\Http\Resources\UserResource;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    // 用户注册
    public function store(UserRequest $request)
    {
        $verifyData = \Cache::get($request->verification_key);

       if (!$verifyData) {
           abort(403, '验证码已失效');
        }

        if (!hash_equals($verifyData['code'], $request->verification_code)) {
            // 返回401
            throw new AuthenticationException('验证码错误');
        }

        $user = User::create([
            'name' => $request->name,
            'phone' => $verifyData['phone'],
            'password' => Hash::make($request->password),
        ]);

        // 清除验证码缓存
        \Cache::forget($request->verification_key);

        // return new UserResource($user);
        return (new UserResource($user))->showSensitiveFields();
    }

    // 用户
    public function show(User $user, Request $request)
    {
        return new UserResource($user);
    }

    // 我的
    public function me(Request $request)
    {
        // return new UserResource($request->user());
        return (new UserResource($request->user()))->showSensitiveFields();
    }

    // 编辑个人信息
    public function update(UserRequest $request)
    {
        $user = $request->user();

        $attributes = $request->only(['name', 'email', 'introduction']);

        if ($request->avatar_image_id) {
            $image = Image::find($request->avatar_image_id);

            $attributes['avatar'] = $image->path;
        }

        $user->update($attributes);

        return (new UserResource($user))->showSensitiveFields();
    }
}
