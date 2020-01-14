<?php

namespace App\Http\Controllers\Api;

use App\Http\Queries\ProductQuery;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ProductsController extends Controller
{

    // 产品列表
    public function index(Request $request, Product $product, ProductQuery $query)
    {
        // $query = $product->query();

        // if ($categoryId = $request->category_id) {
        //     $query->where('category_id', $categoryId);
        // }

        // $products = $query->with('category')->paginate();

        // return ProductResource::collection($products);

        $products = $query->paginate();

        return ProductResource::collection($products);

        // $products = QueryBuilder::for(Product::class)
        //     ->allowedIncludes('category')
        //     ->allowedFilters([
        //         'title',
        //         AllowedFilter::exact('category_id'),
        //     ])
        //     ->paginate();
        // return ProductResource::collection($products);

    }

    // 商品详情
    public function show($id, ProductQuery $query)
    {
        $product = $query->findOrFail($id);
        return new ProductResource($product);

        // $product = QueryBuilder::for(Product::class)
        //     ->allowedIncludes('category')
        //     ->findOrFail($id);

        // return new ProductResource($product);
    }

    // 添加收藏
    public function favor(Product $product, Request $request)
    {
        $user = $request->user();
        if ($user->favoriteProducts()->find($product->id)) {
            return ['status'=>1, 'message' => '已收藏'];
        }
        $user->favoriteProducts()->attach($product);

        return ['status'=>1, 'message' => '收藏成功'];
    }

    // 取消收藏
    public function disfavor(Product $product, Request $request)
    {
        $user = $request->user();
        $user->favoriteProducts()->detach($product);

        return ['status'=>1, 'message' => '收藏取消'];
    }

    // 收藏列表
    public function favorites(Request $request)
    {
        $products = $request->user()->favoriteProducts()->paginate(16);

        return ProductResource::collection($products);
    }
}
