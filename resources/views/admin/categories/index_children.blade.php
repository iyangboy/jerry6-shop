<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">分类管理:
      @if($parent_category->parent)
      <a href="{{ route('admin.categories.index') }}" class="btn btn-sm btn-default">{{$parent_category->parent->name}}</a>
      @endif
      @if($parent_category)
      <a href="{{ route('admin.categories.index') }}" class="btn btn-sm btn-default">{{$parent_category->name}}</a>
      @endif
    </h3>
    <div class="box-tools">
      <div class="btn-group float-right" style="margin-right: 10px">
        <a href="{{ route('admin.categories.index') }}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> 新增</a>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-sm btn-default"><i class="fa fa-list"></i> 列表</a>
      </div>
    </div>
  </div>
  <div class="box-body">
    <table class="table table-bordered">
      <head>
        <tr>
          <th>ID</th>
          <th>名称</th>
          <th>层级</th>
          <th>是否是目录</th>
          <th>分类路径</th>
          <th>操作</th>
        </tr>
      </head>
      <tbody>
        @foreach($categories as $ls)
          <tr>
            <td>{{$ls->id}}</td>
            <td>{{$ls->name}}</td>
            <td>{{$ls->level}}</td>
            <td>{{$ls->is_directory}}</td>
            <td>{{$ls->path}}</td>
            <td>
              @if(count($ls->children))
              <a href="{{ route('admin.categories_children.index', ['id' => $ls->id]) }}" class="btn btn-sm btn-default">三级级分类</a>
              @endif
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

<script>
$(document).ready(function() {

});
</script>
