<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">分类管理: 一级分类</h3>
    <div class="box-tools">
      <div class="btn-group float-right" style="margin-right: 10px">
        <button type="button" class="btn btn-sm btn-primary btn-category-add" data-toggle="modal" data-target="#myModalCategoryAdd">
          <i class="fa fa-plus"></i>新增
        </button>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-sm btn-default"><i class="fa fa-list"></i> 列表 </a>
      </div>
    </div>
  </div>
  <div class="box-body">
    <table class="table table-bordered">
      <head>
        <tr>
          <th>ID</th>
          <th>图片</th>
          <th>商品名称</th>
          <th>分类</th>
          <th>品牌</th>
          <th>系列</th>
          <th>型号</th>
          <th>订货号</th>
          <th>参数</th>
          <th>已上架</th>
          <th>价格</th>
          <th>销量</th>
          <th width="300" >操作</th>
        </tr>
      </head>
      <tbody>
        @foreach($products as $ls)
          <tr>
            <td>{{$ls->id}}</td>
            <td><img src="{{ $ls->image }}" alt="" width="100"></td>
            <td>{{$ls->title}}</td>
            <td>{{$ls->category->name ?? ''}}</td>
            <td>{{$ls->category_brand->name ?? ''}}</td>
            <td>{{$ls->series->name ?? ''}}</td>
            <td>{{$ls->model_name}}</td>
            <td>{{$ls->part_number}}</td>
            <td>
              @if($ls->parameter_json)
                @foreach($ls->parameter_json as $key => $value)
                {{ $key . '->' .$value}}<br>
                @endforeach
              @endif
            </td>
            <td>{{$ls->on_sale}}</td>
            <td>{{$ls->price}}</td>
            <td>{{$ls->sold_count}}</td>
            <td>
              <a href="{{ route('admin.categories_children.index', ['id' => $ls->id]) }}" class="btn btn-sm btn-default">子分类</a>
              <button type="button" class="btn btn-sm btn-primary btn-category-edit" data-toggle="modal" data-target="#myModalCategory"
              data-id="{{$ls->id}}"
              data-name="{{$ls->name}}">
                编辑
              </button>
              <button type="button" class="btn btn-sm btn-danger btn-category-delete" data-id="{{$ls->id}}">
                删除
              </button>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <div class="float-right">{{ $products->links() }}</div>
  </div>
</div>
<!-- Modal新增 -->
<div class="modal fade" id="myModalCategoryAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">新增分类</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label>名称</label>
            <input type="text" class="form-control" name="name" placeholder="名称" required >
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="button" class="btn btn-primary btn-category-add-submit">提交</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal编辑 -->
<div class="modal fade" id="myModalCategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">编辑</h4>
      </div>
      <div class="modal-body">
        <form>
          <input type="hidden" name="id" value="0">
          <div class="form-group">
            <label>名称</label>
            <input type="text" class="form-control" name="name" placeholder="名称" required >
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="button" class="btn btn-primary btn-category-submit">提交</button>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function() {


});
</script>
