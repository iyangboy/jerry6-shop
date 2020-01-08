<?php

namespace App\Http\Requests\Api;


class AuthorizationRequest extends FormRequest
{
    // 登录
    public function rules()
    {
        return [
            'username' => 'required|string',
            'password' => 'required|alpha_dash|min:6',
        ];
    }
}
