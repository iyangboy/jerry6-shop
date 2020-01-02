<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\UserAddressResource;
use App\Http\Requests\Api\UserAddressRequest;
use App\Models\UserAddress;
use Illuminate\Http\Request;

class UserAddressesController extends Controller
{
    // 添加地址
    public function store(UserAddressRequest $request, UserAddress $user_address)
    {
        $user_address->fill($request->all());
        $user_address->user_id = $request->user()->id;
        $user_address->save();

        return new UserAddressResource($user_address);
    }

    // 编辑地址
    public function update(UserAddressRequest $request, UserAddress $user_address)
    {
        $this->authorize('own', $user_address);

        $user_address->update($request->all());
        return new UserAddressResource($user_address);
    }

    // 删除地址
    public function destroy(UserAddress $user_address)
    {
        $this->authorize('own', $user_address);

        $user_address->delete();

        return response(null, 204);
    }
}
