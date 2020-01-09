<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\QueryBuilder\QueryBuilder;

class Product extends Model
{
    protected $table = 'glj_products';

    protected $fillable = [
        'title', 'long_title', 'description', 'image', 'on_sale',
        'rating', 'sold_count', 'review_count', 'price'
    ];

    protected $casts = [
        'on_sale' => 'boolean', // on_sale 是一个布尔类型的字段
        'parameter_json' => 'array', // 商品参数
    ];

    // 与商品SKU关联
    public function skus()
    {
        return $this->hasMany(ProductSku::class);
    }

    // 图片链接拼接
    public function getImageUrlAttribute()
    {
        // 如果 image 字段本身就已经是完整的 url 就直接返回
        if (Str::startsWith($this->attributes['image'], ['http://', 'https://'])) {
            return $this->attributes['image'];
        }
        return \Storage::disk('public')->url($this->attributes['image']);
    }

    // 分类
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // 品牌
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    // 系列
    public function series()
    {
        return $this->belongsTo(Series::class);
    }

    // 关联商品属性
    public function properties()
    {
        return $this->hasMany(ProductProperty::class);
    }

    public function getGroupedPropertiesAttribute()
    {
        return $this->properties
            // 按照属性名聚合，返回的集合的 key 是属性名，value 是包含该属性名的所有属性集合
            ->groupBy('name')
            ->map(function ($properties) {
                // 使用 map 方法将属性集合变为属性值集合
                return $properties->pluck('value')->all();
            });
    }

    //
    public function resolveRouteBinding($value)
    {
        return QueryBuilder::for(self::class)
            ->allowedIncludes('category')
            ->where($this->getRouteKeyName(), $value)
            ->first();
    }
}
