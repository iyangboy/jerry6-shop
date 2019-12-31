<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\UserAddressResource;
use App\Http\Requests\Api\UserAddressRequest;
use App\Models\UserAddress;
use Illuminate\Http\Request;

class UserAddressesController extends Controller
{
    // 添加地址
    public function store(UserAddressRequest $request, UserAddress $user_addresses)
    {
        $user_addresses->fill($request->all());
        $user_addresses->user_id = $request->user()->id;
        $user_addresses->save();

        return new UserAddressResource($user_addresses);
    }
}
