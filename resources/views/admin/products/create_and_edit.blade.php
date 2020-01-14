<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">编辑：{{ $product->id }}</h3>
    <div class="box-tools">
      <div class="btn-group pull-right" style="margin-right: 5px">
        <a href="{{ route('admin.products.show', ['id' => $product->id]) }}" class="btn btn-sm btn-primary" title="查看">
          <i class="fa fa-eye"></i><span class="hidden-xs">查看</span>
        </a>
      </div>
      <div class="btn-group pull-right" style="margin-right: 5px">
        <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-default" title="列表">
          <i class="fa fa-list"></i><span class="hidden-xs">列表</span>
        </a>
      </div>
    </div>
  </div>
  <div>
    <form action="http://jerry6-shop.test/admin/products/10005" method="post" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data" pjax-container="">
      <div class="box-body">
        <div class="fields-group">
          <div class="col-md-12">
            <div class="form-group  ">
              <label for="title" class="col-sm-2 asterisk control-label">商品名称</label>
              <div class="col-sm-8">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                  <input type="text" id="title" name="title" value="3WL 1600A 3P 66KA 框架断路器" class="form-control title" placeholder="输入 商品名称" required="1">
                </div>
              </div>
            </div>
            <div class="form-group  ">
              <label for="category_id" class="col-sm-2  control-label">类目</label>
              <div class="col-sm-8">
                <input type="hidden" name="category_id">
                <select class="form-control category_id select2-hidden-accessible" style="width: 100%;" name="category_id" data-value="1015" tabindex="-1" aria-hidden="true">
                  <option value=""></option>
                  <option value="1015" selected="">中低压配电 - 空气断路器 - 框架断路器</option>
                </select>
                <span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100%;">
                  <span class="selection">
                    <span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-category_id-mq-container"><span class="select2-selection__rendered" id="select2-category_id-mq-container" title="中低压配电 - 空气断路器 - 框架断路器">
                      <span class="select2-selection__clear">×</span>中低压配电 - 空气断路器 - 框架断路器</span>
                      <span class="select2-selection__arrow" role="presentation">
                        <b role="presentation"></b>
                      </span>
                    </span>
                  </span>
                  <span class="dropdown-wrapper" aria-hidden="true"></span>
                </span>
              </div>
            </div>
            <div class="form-group  ">
              <label for="image" class="col-sm-2  control-label">封面图片</label>
              <div class="col-sm-8">
                <div class="file-input">
                  <div class="file-preview ">
                  <button type="button" class="close fileinput-remove" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                  <div class="file-drop-disabled">
                    <div class="file-preview-thumbnails">
                      <div class="file-preview-frame krajee-default  file-preview-initial file-sortable kv-preview-thumb" id="preview-1578973526243_76-init_0" data-fileindex="init_0" data-template="image">
                        <div class="kv-file-content">
                      <img src="https://img.zydmall.com/upload/20170718/s201707180850047868.jpg" class="file-preview-image kv-preview-data" title="s201707180850047868.jpg" alt="s201707180850047868.jpg" style="width:auto;height:auto;max-width:100%;max-height:100%;">
                    </div>
                    <div class="file-thumbnail-footer">
                      <div class="file-footer-caption" title="s201707180850047868.jpg">
                        <div class="file-caption-info">s201707180850047868.jpg</div>
                        <div class="file-size-info"></div>
                      </div>
                      <div class="file-thumb-progress kv-hidden">
                        <div class="progress">
                        <div class="progress-bar bg-success progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%;">
                          Initializing...
                        </div>
                      </div>
                    </div>

                      <div class="file-actions">
                        <div class="file-footer-buttons">
                          <a class="kv-file-download btn btn-sm btn-kv btn-default btn-outline-secondary" title="Download file" href="https://img.zydmall.com/upload/20170718/s201707180850047868.jpg" download="s201707180850047868.jpg" target="_blank">
                            <i class="glyphicon glyphicon-download"></i>
                          </a>
                          <button type="button" class="kv-file-zoom btn btn-sm btn-kv btn-default btn-outline-secondary" title="View Details"><i class="glyphicon glyphicon-zoom-in"></i></button>
                        </div>
                        </div>
                        <div class="clearfix"></div>
                      </div>
                    </div>

                    <div class="kv-zoom-cache" style="display:none">
                      <div class="file-preview-frame krajee-default  file-preview-initial kv-zoom-thumb" id="zoom-preview-1578973526243_76-init_0" data-fileindex="init_0" data-template="image">
                        <div class="kv-file-content">
                      <img src="https://img.zydmall.com/upload/20170718/s201707180850047868.jpg" class="file-preview-image kv-preview-data" title="s201707180850047868.jpg" alt="s201707180850047868.jpg" style="width:auto;height:auto;max-width:100%;max-height:100%;">
                    </div>
                    <div class="file-thumbnail-footer">
                      <div class="file-footer-caption" title="s201707180850047868.jpg">
                        <div class="file-caption-info">s201707180850047868.jpg</div>
                        <div class="file-size-info"></div>
                      </div>
                      <div class="file-thumb-progress kv-hidden">
                        <div class="progress">
                        <div class="progress-bar bg-success progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%;">
                          Initializing...
                        </div>
                      </div>
                    </div>

                      <div class="file-actions">
                        <div class="file-footer-buttons">
                          <a class="kv-file-download btn btn-sm btn-kv btn-default btn-outline-secondary" title="Download file" href="https://img.zydmall.com/upload/20170718/s201707180850047868.jpg" download="s201707180850047868.jpg" target="_blank">
                            <i class="glyphicon glyphicon-download"></i>
                          </a>
                          <button type="button" class="kv-file-zoom btn btn-sm btn-kv btn-default btn-outline-secondary" title="View Details"><i class="glyphicon glyphicon-zoom-in"></i></button>
                        </div>
                        </div>
                        <div class="clearfix"></div>
                      </div>
                    </div>
                  </div></div>
                  <div class="clearfix"></div>
                  <div class="file-preview-status text-center text-success"></div>
                  <div class="kv-fileinput-error file-error-message" style="display: none;"></div>
                </div>
              </div>
              <div class="kv-upload-progress kv-hidden"></div>
              <div class="clearfix"></div>
              <div class="input-group file-caption-main">
                <div class="file-caption form-control  kv-fileinput-caption icon-visible" tabindex="500">
                  <span class="file-caption-icon"><i class="glyphicon glyphicon-file"></i></span>
                  <input class="file-caption-name" onkeydown="return false;" onpaste="return false;" placeholder="选择图片" title="s201707180850047868.jpg">
                </div>
                <div class="input-group-btn input-group-append">
                  <div tabindex="500" class="btn btn-primary btn-file">
                    <i class="glyphicon glyphicon-folder-open"></i>&nbsp;
                    <span class="hidden-xs">浏览</span>
                    <input type="file" class="image" name="image" data-initial-preview="https://img.zydmall.com/upload/20170718/s201707180850047868.jpg" data-initial-caption="s201707180850047868.jpg" id="1578973526240_30">
                  </div>
                </div>
              </div></div>
            </div>
          </div>
          <div class="form-group  ">
            <label for="description" class="col-sm-2  control-label">商品描述</label>
            <div class="col-sm-8">
              <input type="hidden" name="description" value="">
            </div>
          </div>
          <div class="form-group  ">
            <label for="on_sale" class="col-sm-2  control-label">上架</label>
            <div class="col-sm-8">
              <span class="icheck">
                <label class="radio-inline">
                  <div class="iradio_minimal-blue checked" aria-checked="false" aria-disabled="false" style="position: relative;">
                    <input type="radio" name="on_sale" value="1" class="minimal on_sale" checked="" style="position: absolute; opacity: 0;">
                    <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                  </div>&nbsp;是&nbsp;&nbsp;
                </label>
              </span>
              <span class="icheck">
                <label class="radio-inline">
                  <div class="iradio_minimal-blue" aria-checked="false" aria-disabled="false" style="position: relative;">
                    <input type="radio" name="on_sale" value="0" class="minimal on_sale" style="position: absolute; opacity: 0;">
                    <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                  </div>&nbsp;否&nbsp;&nbsp;
                </label>
              </span>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2 "><h4 class="pull-right">SKU 列表</h4></div>
            <div class="col-sm-8"></div>
          </div>
          <hr style="margin-top: 0px;">
          <div id="has-many-skus" class="has-many-skus">
            <div class="has-many-skus-forms">
              <div class="has-many-skus-form fields-group">
                <div class="form-group  ">
                  <label for="title" class="col-sm-2 asterisk control-label">SKU 名称</label>
                  <div class="col-sm-8">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                      <input type="text" id="title" name="skus[10005][title]" value="3WL1120-3FB36-4GA4-ZK07+R21+T40" class="form-control skus title" placeholder="输入 SKU 名称" required="1">
                    </div>
                  </div>
                </div>
                <div class="form-group  ">
                  <label for="description" class="col-sm-2 asterisk control-label">SKU 描述</label>
                  <div class="col-sm-8">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                      <input type="text" id="description" name="skus[10005][description]" value="1600A | 66KA | ETU45B | 2000A | 3P | 抽出式带抽架 | 上水平后接线+下水平后接线 | LSIN | 电流 | 500VAC | 分闸线圈220VAC/DC，合闸线圈220VAC/DC，储能马达220VAC/DC，辅助触点4NO+4NC，跳闸信号触头，安全挡板，门密封框 | -" class="form-control skus description" placeholder="输入 SKU 描述" required="1">
                    </div>
                  </div>
                </div>
                <div class="form-group  ">
                  <label for="price" class="col-sm-2 asterisk control-label">单价</label>
                  <div class="col-sm-8">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                      <input type="text" id="price" name="skus[10005][price]" value="67067.62" class="form-control skus price" placeholder="输入 单价" required="1">


                    </div>


                  </div>
                </div>
                <div class="form-group  ">

                  <label for="stock" class="col-sm-2 asterisk control-label">剩余库存</label>

                  <div class="col-sm-8">


                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>

                      <input type="text" id="stock" name="skus[10005][stock]" value="1000" class="form-control skus stock" placeholder="输入 剩余库存" required="1">


                    </div>


                  </div>
                </div>
                <input type="hidden" name="skus[10005][id]" value="10005" class="skus id">

                <input type="hidden" name="skus[10005][_remove_]" value="0" class="skus _remove_ fom-removed">


                <div class="form-group">
                  <label class="col-sm-2  control-label"></label>
                  <div class="col-sm-8">
                    <div class="remove btn btn-warning btn-sm pull-right"><i class="fa fa-trash">&nbsp;</i>移除</div>
                  </div>
                </div>
                <hr>
              </div>

            </div>


            <template class="skus-tpl">
              <div class="has-many-skus-form fields-group">

                <div class="form-group  ">

                  <label for="title" class="col-sm-2 asterisk control-label">SKU 名称</label>

                  <div class="col-sm-8">


                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>

                      <input type="text" id="title" name="skus[new___LA_KEY__][title]" value="" class="form-control skus title" placeholder="输入 SKU 名称" required="1">


                    </div>


                  </div>
                </div><div class="form-group  ">

                  <label for="description" class="col-sm-2 asterisk control-label">SKU 描述</label>

                  <div class="col-sm-8">


                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>

                      <input type="text" id="description" name="skus[new___LA_KEY__][description]" value="" class="form-control skus description" placeholder="输入 SKU 描述" required="1">


                    </div>


                  </div>
                </div><div class="form-group  ">

                  <label for="price" class="col-sm-2 asterisk control-label">单价</label>

                  <div class="col-sm-8">


                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>

                      <input type="text" id="price" name="skus[new___LA_KEY__][price]" value="" class="form-control skus price" placeholder="输入 单价" required="1">


                    </div>


                  </div>
                </div><div class="form-group  ">

                  <label for="stock" class="col-sm-2 asterisk control-label">剩余库存</label>

                  <div class="col-sm-8">


                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>

                      <input type="text" id="stock" name="skus[new___LA_KEY__][stock]" value="" class="form-control skus stock" placeholder="输入 剩余库存" required="1">


                    </div>


                  </div>
                </div><input type="hidden" name="skus[new___LA_KEY__][id]" value="" class="skus id">
                <input type="hidden" name="skus[new___LA_KEY__][_remove_]" value="0" class="skus _remove_ fom-removed">


                <div class="form-group">
                  <label class="col-sm-2  control-label"></label>
                  <div class="col-sm-8">
                    <div class="remove btn btn-warning btn-sm pull-right"><i class="fa fa-trash"></i>&nbsp;移除</div>
                  </div>
                </div>
                <hr>
              </div>
            </template>

            <div class="form-group">
              <label class="col-sm-2  control-label"></label>
              <div class="col-sm-8">
                <div class="add btn btn-success btn-sm"><i class="fa fa-save"></i>&nbsp;新增</div>
              </div>
            </div>

          </div>
          <div class="row">
            <div class="col-sm-2 "><h4 class="pull-right">商品属性</h4></div>
            <div class="col-sm-8"></div>
          </div>

          <hr style="margin-top: 0px;">

          <div id="has-many-properties" class="has-many-properties">

            <div class="has-many-properties-forms">

            </div>


            <template class="properties-tpl">
              <div class="has-many-properties-form fields-group">

                <div class="form-group  ">

                  <label for="name" class="col-sm-2 asterisk control-label">属性名</label>

                  <div class="col-sm-8">


                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>

                      <input type="text" id="name" name="properties[new___LA_KEY__][name]" value="" class="form-control properties name" placeholder="输入 属性名" required="1">


                    </div>


                  </div>
                </div><div class="form-group  ">

                  <label for="value" class="col-sm-2 asterisk control-label">属性值</label>

                  <div class="col-sm-8">


                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>

                      <input type="text" id="value" name="properties[new___LA_KEY__][value]" value="" class="form-control properties value" placeholder="输入 属性值" required="1">


                    </div>


                  </div>
                </div><input type="hidden" name="properties[new___LA_KEY__][id]" value="" class="properties id">
                <input type="hidden" name="properties[new___LA_KEY__][_remove_]" value="0" class="properties _remove_ fom-removed">


                <div class="form-group">
                  <label class="col-sm-2  control-label"></label>
                  <div class="col-sm-8">
                    <div class="remove btn btn-warning btn-sm pull-right"><i class="fa fa-trash"></i>&nbsp;移除</div>
                  </div>
                </div>
                <hr>
              </div>
            </template>

            <div class="form-group">
              <label class="col-sm-2  control-label"></label>
              <div class="col-sm-8">
                <div class="add btn btn-success btn-sm"><i class="fa fa-save"></i>&nbsp;新增</div>
              </div>
            </div>

          </div>
        </div>
      </div>

    </div>
    <!-- /.box-body -->

    <div class="box-footer">

      <input type="hidden" name="_token" value="gLqBVko7y7LDeMKsPt9JfenJYundZRU29USCoqoK">

      <div class="col-md-2">
      </div>

      <div class="col-md-8">

        <div class="btn-group pull-right">
          <button type="submit" class="btn btn-primary">提交</button>
        </div>

        <label class="pull-right" style="margin: 5px 10px 0 0;">
          <div class="icheckbox_minimal-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" class="after-submit" name="after-save" value="1" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 继续编辑
        </label>
        <label class="pull-right" style="margin: 5px 10px 0 0;">
          <div class="icheckbox_minimal-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" class="after-submit" name="after-save" value="2" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 继续创建
        </label>
        <label class="pull-right" style="margin: 5px 10px 0 0;">
          <div class="icheckbox_minimal-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" class="after-submit" name="after-save" value="3" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 查看
        </label>


        <div class="btn-group pull-left">
          <button type="reset" class="btn btn-warning">重置</button>
        </div>
      </div>
    </div>

    <input type="hidden" name="_method" value="PUT" class="_method">


    <!-- /.box-footer -->
  </form>
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
