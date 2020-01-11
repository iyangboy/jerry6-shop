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
          <th>名称</th>
          <th>层级</th>
          <th>是否是目录</th>
          <th>分类路径</th>
          <th width="300" >操作</th>
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
  // 新增
  $('.btn-category-add-submit').click(function() {
    var req = {
      name: $('#myModalCategoryAdd').find('input[name=name]').val(),
    };
    console.log(req);
    if(!req.name) {
      swal('请填写名称', '', 'warning');
      return;
    }
    //return false;
    $.ajax({
      url: "{{ route('admin.categories_add.index') }}",
      type: 'POST',
      data: JSON.stringify({   // 将请求变成 JSON 字符串
        name: req.name,
        _token: LA.token,
      }),
      contentType: 'application/json',  // 请求的数据格式为 JSON
      success:function(data) {
        console.log(data);
        if (data) {
          swal({
            title: '操作成功',
            type: 'success'
          }).then(function(rs) {
            // 用户点击 swal 上的按钮时刷新页面
            location.reload();
          });
        }
      }
    });
  });
  // 编辑
  $('.btn-category-edit').click(function() {
    console.log($(this).data('id'));
    var id = $(this).data('id');
    var name = $(this).data('name');
    $('#myModalCategory').find('input[name=id]').val(id);
    $('#myModalCategory').find('input[name=name]').val(name);
  });
  // 编辑提交
  $('.btn-category-submit').click(function() {
    var req = {
      id: $('#myModalCategory').find('input[name=id]').val(),
      name: $('#myModalCategory').find('input[name=name]').val(),
    };
    var id = req.id;
    console.log(req);
    if(!req.name) {
      swal('请填写名称', '', 'warning');
      return;
    }
    if(!req.id) {
      swal('数据有误', '', 'error');
      return;
    }
    //return false;
    $.ajax({
      url: "{{ route('admin.categories_edit.index') }}",
      type: 'put',
      data: JSON.stringify({   // 将请求变成 JSON 字符串
        id: req.id,
        name: req.name,
        _token: LA.token,
      }),
      contentType: 'application/json',  // 请求的数据格式为 JSON
      success:function(data) {
        console.log(data);
        if (data) {
          swal({
            title: '操作成功',
            type: 'success'
          }).then(function(rs) {
            // 用户点击 swal 上的按钮时刷新页面
            location.reload();
          });
        }
      }
    });
  });

  // 删除
  $('.btn-category-delete').click(function() {
    var delete_id = $(this).data('id')
    swal({
        title: '确认删除？',
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: "确认",
        cancelButtonText: "取消",
        showLoaderOnConfirm: true,
        preConfirm: function() {
          return $.ajax({
            url: "{{ route('admin.categories.delete') }}",
            type: 'POST',
            data: JSON.stringify({
              _method: 'delete',
              _token: LA.token,
              id: delete_id,
            }),
            contentType: 'application/json',
          });
        },
        allowOutsideClick: false
      }).then(function (ret) {
        // 如果用户点击了『取消』按钮，则不做任何操作
        if (ret.dismiss === 'cancel') {
          return;
        }
        swal({
          title: '操作成功',
          type: 'success'
        }).then(function() {
          // 用户点击 swal 上的按钮时刷新页面
          location.reload();
        });
      });
  });

});
</script>
