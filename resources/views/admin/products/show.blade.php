<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">产品详情：{{ $product->id }}</h3>
    <div class="box-tools">
      <div class="btn-group float-right" style="margin-right: 10px">
        <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-default"><i class="fa fa-list"></i> 列表</a>
      </div>
    </div>
  </div>
  <div class="box-body">
    <table class="table table-bordered">
      <tbody>
      <tr>
        <td>图片：</td>
        <td><img src="{{ $product->image }}" alt="" width="100"></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>商品标题：</td>
        <td>{{ $product->title }}</td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>长标题：</td>
        <td>{{ $product->long_title }}</td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>分类：</td>
        <td>{{ $product->category->name }}</td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>品牌：</td>
        <td>{{ $product->category_brand->name ?? '' }}</td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>系列：</td>
        <td>{{ $product->series->name }}</td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>型号：</td>
        <td>{{ $product->model_name }}</td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>订货号：</td>
        <td>{{ $product->part_number }}</td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>参数：</td>
        <td>
          @if($product->parameter_json)
          @foreach($product->parameter_json as $key => $value)
          {{ $key . '->' .$value}}<br>
          @endforeach
          @endif
        </td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>是否上架：</td>
        <td>{{ $product->on_sale }}</td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>价格：</td>
        <td>{{ $product->price }}</td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>销量：</td>
        <td>{{ $product->sold_count }}</td>
        <td></td>
        <td></td>
      </tr>
      </tbody>
    </table>
    <div class="product-description">
      {!! $product->description !!}
    </div>
  </div>
</div>

<script>
$(document).ready(function() {

});
</script>
