<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ProductsController extends Controller
{

    // 产品列表
    public function index(Request $request, Product $product)
    {
        // $query = $product->query();

        // if ($categoryId = $request->category_id) {
        //     $query->where('category_id', $categoryId);
        // }

        // $products = $query->with('category')->paginate();

        // return ProductResource::collection($products);

        $products = QueryBuilder::for(Product::class)
            ->allowedIncludes('category')
            ->allowedFilters([
                'title',
                AllowedFilter::exact('category_id'),
            ])
            ->paginate();
        return ProductResource::collection($products);

    }
}
