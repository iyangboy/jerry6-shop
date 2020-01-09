<?php

namespace App\Http\Controllers;


use App\Models\BrandSeries;
use App\Models\CategoryBrand;
use App\Models\CategoryParameter;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Parameter;
use App\Models\ProductSku;
use App\Models\Series;
use App\Models\ZydProduct;
use App\Models\ZydProductNum;
use Illuminate\Http\Request;

class TestsController extends Controller
{
    // 产品SKU 生成
    public function productSku(Request $request)
    {
        ZydProduct::where('sku_id', 0)->chunk(200, function ($products) {
            dump('--------------------');
            foreach ($products as $key => $ls) {
                # code...
                //dd($ls->toArray());
                /*$sku = ProductSku::where('product_id', $ls->id)->first();
                if ($sku) {
                    $sku_id = $sku->id;
                } else {
                    $sku = new ProductSku();
                    $sku->product()->associate($ls->id);
                    $sku->title = $ls->model_name;
                    $sku->description = $ls->parameter_text;
                    $sku->price = $ls->price;
                    $sku->stock = 1000;
                    $sku->save();
                    $sku_id = $sku->id;
                }*/
                $sku = ProductSku::firstOrCreate(
                    [ 'product_id' => $ls->id,],
                    [
                        'stock' => 1000,
                        'title' => $ls->model_name,
                        'description' => $ls->parameter_text,
                        'price' => $ls->price,
                    ]);
                $sku_id = $sku->id;
                $rs = ZydProduct::where('id', $ls->id)->update(['sku_id' => $sku_id]);
                //dd($rs);
            }
        });
        dd(1);
    }

    public function productTable(Request $request)
    {
        ZydProduct::where('part_number', 'like', '[ZYD]%')->chunk(200, function ($products) {
            dump('--------------------');
            foreach ($products as $key => $ls) {
                # code...
                $part_number = str_replace("[ZYD]", "[GLJ]", $ls->part_number);
                //dump($part_number);
                //dd($ls->toArray());
                $rs = ZydProduct::where('id', $ls->id)->update(['part_number' => $part_number]);
                //dd($rs);
            }
        });
        dd(1);
    }
    //
    public function indexZYDCaiJi(Request $request)
    {
        //$products = ZydProduct::find(1);
        //$product_nums = ZydProductNum::all();
        ZydProductNum::where('is', 0)->chunk(200, function ($zyd) {
            dump('--------------------');
            foreach ($zyd as $ls) {
                //$t = \DB::transaction(function () use ($ls) {
                    //dd($ls->toArray());
                    // 分类
                    $title = $ls->title;
                    $title_array = explode(" ", $title);

                    // 分类
                    //$category_name = array_pop($title_array) ?? '';
                    //$category = Category::where('name', $category_name)->first();
                    //$category_id = $category->id ?? 1012;
                    $category_id = 1130;
                    // dd($category_name);
                    // dd($ls->toArray());
                    $brand_name = $ls->brand;
                    // 查询品牌是否存在
                    $brand = Brand::firstOrCreate(['name' => $brand_name, 'category_id' => $category_id]);
                    $brand_id = $brand->id;

                    // 系列
                    $series_name = array_shift($title_array) ?? '';
                    $series = Series::firstOrCreate(['name' => $series_name, 'brand_id' => $brand_id]);
                    $series_id = $series->id;

                    // 参数
                    $parameter_text = $ls->parameter;
                    $parameter_array = explode(" | ", $parameter_text);

                    // 26_358_377
                    $parameter_parent = [
                        "产品类型",
                        "电源电压",
                        "接线方式",
                        "连接方式",
                        "输出类型",
                        "功能",
                        "感应距离",
                        "检测模式",
                        "材料",
                    ];
                    // 32_74_76
                    /*$parameter_parent = [
                        "输出控制路数",
                        "电源电压",
                        "通讯协议",
                        "安装方式",
                        "防护等级",
                    ];*/
                    $parameter_key = implode(" | ", $parameter_parent);
                    // dd(count($parameter_array));
                    // if (count($parameter_parent) != count($parameter_array))
                    // {
                    //     continue;
                    // }
                    if (count($parameter_array) > 1) {
                        foreach ($parameter_parent as $key => $parameter_p_name) {
                            $parameter_p = Parameter::firstOrCreate(['name' => $parameter_p_name, 'parent_id' => 0, 'category_id' => $category_id ]);
                            $p_id = $parameter_p->id;
                            if (empty($parameter_array[$key])) {
                                //continue;
                                dump($ls->id);
                                dump($ls->toArray());
                                dd($parameter_array);
                            }
                            $parameter_s = Parameter::firstOrCreate(
                                ['name' => trim($parameter_array[$key]), 'parent_id' => $p_id],
                            );
                            // dump($key . '->' .$parameter_p_name);
                            // 分类-参数Key
                            CategoryParameter::firstOrCreate(['category_id' => $category_id, 'parameter_id' => $p_id]);
                        }

                        $par_collection = collect($parameter_parent);
                        $par_combined = $par_collection->combine($parameter_array);

                        $par_combined->all();
                        $parameter_json = $par_combined->toArray();
                        // dd($parameter_json);
                    }

                    // 价格
                    $price_text = $ls->price_text;
                    $price = (float)substr($price_text, 2);

                    // 关联关系
                    // 分类-品牌
                    CategoryBrand::firstOrCreate(['category_id' => $category_id, 'brand_id' => $brand_id]);
                    // 品牌-系列
                    BrandSeries::firstOrCreate(['brand_id' => $brand_id, 'series_id' => $series_id]);
                    // 分类-参数Key
                    // CategoryParameter::firstOrCreate(['category_id' => $category_id, 'series_id' => $series_id]);


                    $products = new ZydProduct;
                    $products->category_id      = $category_id;
                    $products->brand_id         = $brand_id;
                    $products->brand_name       = $brand_name;
                    $products->series_id        = $series_id;
                    $products->series_name      = $series_name;
                    $products->model_name       = $ls->model;
                    $products->parameter_key    = $parameter_key;
                    $products->parameter_text   = $parameter_text;
                    $products->parameter_json   = $parameter_json ?? '';
                    $products->part_number      = $ls->part_number;
                    $products->url              = $ls->url;
                    $products->extract          = $ls->extract;
                    $products->title            = $ls->title;
                    $products->image            = $ls->image ?? '';
                    $products->price_text       = $price;
                    $products->price            = $price;

                    $is = $products->save();

                    if ($is) {
                        ZydProductNum::where('id', $ls->id)->update(['is' => 1]);
                    }
                    // dd($is);
                    //return $is;

                //});
                //dd($t);
                // dd($is);
            }
        });
        // dd($product_nums);
        dd(1);
    }

    public function parameter_parent()
    {
        //32_33_34
                    /*
                    $parameter_parent = [
                        "框架电流",
                        "分断能力",
                        "脱扣单元",
                        "脱扣器额定电流",
                        "极数",
                        "安装方式",
                        "接线方式",
                        "保护功能",
                        "测量显示功能",
                        "额定电压",
                        "已配置附件",
                        "必选配附件（请另购）",
                    ];
                    // 32_33_35

                    $parameter_parent = [
                        "框架电流",
                        "极数",
                        "安装方式",
                        "接线方式",
                        "额定电压",
                        "已配置附件",
                        "必选配附件（请另购）",
                    ];

                    // 32_37_42

                    $parameter_parent = [
                        "壳架电流",
                        "脱扣器额定电流",
                        "极数",
                        "安装方式",
                        "接线方式",
                        "操作方式",
                        "额定电压",
                        "附件",
                    ];

                    // 32_37_49

                    $parameter_parent = [
                        "壳架电流",
                        "分断能力",
                        "脱扣形式",
                        "脱扣单元",
                        "脱扣器额定电流",
                        "极数",
                        "安装方式",
                        "接线方式",
                        "操作方式",
                        "保护功能",
                        "额定电压",
                        "附件",
                    ];

                    // 32_37_347

                    $parameter_parent = [
                        "适用范围",
                        "额定电压",
                        "额定电流",
                        "极数",
                        "漏电电流",
                    ];

                    // 32_37_380

                    $parameter_parent = [
                        "壳架电流",
                        "分断能力",
                        "脱扣形式",
                        "脱扣单元",
                        "脱扣器额定电流",
                        "极数",
                        "安装方式",
                        "接线方式",
                        "操作方式",
                        "保护功能",
                        "保护类型",
                        "额定电压",
                        "附件",
                    ];

                    // 32_43_44

                    $parameter_parent = [
                        "级数",
                        "脱扣器特性",
                        "额定电流",
                        "分断能力",
                        "额定电压",
                    ];

                    // 32_43_44

                    $parameter_parent = [
                        "级数",
                        "额定电流",
                        "额定电压",
                    ];

                    // 32_43_48

                    $parameter_parent = [
                        "极数",
                        "脱扣器特性",
                        "额定电流",
                        "漏电电流",
                        "漏电脱扣形式",
                        "漏电保护类型",
                        "额定电压",
                    ];

                    // 32_43_131

                    $parameter_parent = [
                        "极数",
                        "额定电流",
                        "额定电压",
                    ];

                    // 32_52_53

                    $parameter_parent = [
                        "额定电流",
                        "极数",
                        "分断能力",
                        "转换开关类型",
                        "运行模式",
                        "电源类型",
                        "控制模式",
                        "控制器类型",
                        "控制电压",
                        "额定电压",
                    ];

                    // 32_52_53

                    $parameter_parent = [
                        "额定电流",
                        "极数",
                        "安装方式",
                        "操作方式",
                        "手柄类型",
                        "通断负载类型",
                        "额定电压",
                    ];

                    // 32_52_59

                    $parameter_parent = [
                        "额定电流",
                        "极数",
                        "操作方式",
                        "灭弧室",
                        "额定电压",
                    ];

                    // 32_52_334

                    $parameter_parent = [
                        "额定电流",
                        "极数",
                        "安装方式",
                        "手柄类型",
                        "操作方式",
                        "熔断器规格",
                        "通断负载类型",
                        "额定电压",
                    ];

                    // 32_52_1463

                    $parameter_parent = [
                        "产品类型",
                        "适用范围",
                    ];

                    // 32_61_62

                    $parameter_parent = [
                        "熔断器形状",
                        "熔断器规格",
                        "额定电流",
                        "分断能力",
                        "使用类别",
                        "额定电压",
                    ];

                    // 32_61_66

                    $parameter_parent = [
                        "底座类型",
                        "熔断器规格",
                        "额定电流",
                        "极数",
                        "额定电压",
                    ];

                    // 32_140_141

                    $parameter_parent = [
                        "位数",
                        "排数",
                        "安装方式",
                        "颜色",
                        "箱体尺寸（长*宽*高）mm",
                        "箱体材料",
                        "箱盖尺寸（长*宽*高）mm",
                        "箱盖材料",
                    ];

                    // 32_140_295

                    $parameter_parent = [
                        "产品类型",
                        "功能类型",
                        "颜色",
                        "额定电流",
                        "额定电压",
                    ];

                    // 32_140_298

                    $parameter_parent = [
                        "产品类型",
                        "颜色",
                        "线长",
                        "额定电流",
                        "额定电压",
                    ];
                    */
        // 26_106_107

                    /*
                    $parameter_parent = [
                        "CPU",
                        "Memory",
                        "voltage供电电压",
                        "Com串口",
                        "LAN以太网口",
                        "USB2.0",
                        "USB3.0",
                        "VGA接口",
                        "DVI接口",
                        "DP接口",
                        "HDMI接口",
                    ];
                    */
                    // 26_117_118
                    /*$parameter_parent = [
                        "产品类型",
                        "以太网接口",
                        "光纤接口",
                        "电源电压",
                    ];*/

                    // 26_117_119
                    /*$parameter_parent = [
                        "产品类型",
                        "以太网接口",
                        "串行接口",
                        "电源电压",
                        "工业协议",
                    ];*/
                    // 26_117_120
                    /*$parameter_parent = [
                        "产品类型",
                        "以太网接口",
                        "串行接口",
                        "电源电压",
                        "无线频段",
                    ];*/
                    // 26_117_1632
                    /*$parameter_parent = [
                        "连接方式",
                        "功能",
                    ];*/
                    // 26_117_1633
                    /*$parameter_parent = [
                        "通讯协议",
                        "芯数",
                        "传输带宽",
                        "传输速率",
                        "接线方式",
                        "外壳材料",
                        "线缆线径",
                        "屏蔽连接方式",
                    ];*/
                    // 26_117_1635
                    /*$parameter_parent = [
                        "连接方式",
                        "输出功率（W）",
                        "工作温度范围",
                        "功能",
                    ];*/
                    // 26_205_208
                    /*$parameter_parent = [
                        "额定电流",
                        "控制线圈电压",
                        "极数",
                        "主触点",
                        "辅助触点",
                        "控制电路",
                        "额定电压",
                    ];*/
                    // 26_205_209
                    /*$parameter_parent = [
                        "额定电流",
                        "控制线圈电压",
                        "极数",
                        "主触点",
                        "辅助触点",
                        "控制电路",
                        "额定电压",
                    ];*/
                    // 26_205_210
                    /*$parameter_parent = [
                        "切换电容容量",
                        "额定电流",
                        "控制线圈电压",
                        "辅助触点",
                    ];*/
                    // 26_205_211
                    /*$parameter_parent = [
                        "额定电流",
                        "控制线圈电压",
                        "极数",
                        "主触点",
                        "辅助触点",
                        "控制电路",
                        "额定电压",
                    ];*/
                    // 26_205_212
                    /*$parameter_parent = [
                        "额定电流",
                        "控制线圈电压",
                        "极数",
                        "主触点",
                        "辅助触点",
                        "控制电路",
                        "额定电压",
                        "应用场合",
                    ];*/
                    // 26_206_215
                    /*$parameter_parent = [
                        "产品类型",
                        "控制电压",
                        "辅助触点",
                        "控制电路",
                    ];*/
                    // 26_206_216
                    /*$parameter_parent = [
                        "产品类型",
                        "电源电压",
                        "测量范围",
                        "输出类型",
                        "安装方式",
                        "延时功能",
                        "功耗",
                        "功能",
                    ];*/
                    // 26_206_217
                    /*$parameter_parent = [
                        "产品类型",
                        "整定电流范围",
                        "适用接触器",
                    ];*/
                    // 26_206_218
                    /*$parameter_parent = [
                        "产品类型",
                        "额定电流",
                        "触点类型",
                        "LED指示灯",
                        "控制电压",
                    ];*/
                    // 26_206_219
                    /*$parameter_parent = [
                        "产品类型",
                        "额定电流",
                        "电源电压",
                        "时间范围",
                        "触点类型",
                        "输出类型",
                        "功能",
                    ];*/
                    // 26_206_220
                    /*$parameter_parent = [
                        "额定电流",
                        "控制电压",
                        "工作电压",
                        "LED指示灯",
                        "安装方式",
                    ];*/
                    // 26_206_220
                    /*$parameter_parent = [
                        "电源电压",
                        "安全输出通道数量",
                        "辅助输出通道数量",
                        "监测类型",
                    ];*/
                    // 26_206_473
                    /*$parameter_parent = [
                        "产品类型",
                        "输入电压",
                        "端子厚度",
                        "导线截面积",
                        "连接方式",
                        "外壳材料",
                        "阻燃等级",
                    ];*/
                    // 26_206_474
                    /*$parameter_parent = [
                        "产品类型",
                        "输入电压",
                        "端子厚度",
                        "导线截面积",
                        "连接方式",
                        "外壳材料",
                        "阻燃等级",
                    ];*/
                    // 26_206_475
                    /*$parameter_parent = [
                        "产品类型",
                        "输入电压",
                        "端子厚度",
                        "导线截面积",
                        "连接方式",
                        "外壳材料",
                        "阻燃等级",
                    ];*/
                    // 26_206_531
                    /*$parameter_parent = [
                        "传感器数量",
                        "传感器类型",
                        "控制逻辑",
                        "显示方式",
                        "开孔尺寸（mm）",
                        "外形尺寸（mm）",
                        "功能",
                        "安装方式",
                    ];*/
                    // 26_206_532
                    /*$parameter_parent = [
                        "产品类型",
                    ];*/
                    // 26_207_224
                    /*$parameter_parent = [
                        "分断能力",
                        "整定电流范围",
                        "极数",
                        "控制类型",
                        "额定电压",
                        "额定功率",
                        "辅助触点",
                        "接线方式",
                        "应用",
                    ];*/
                    // 26_207_225
                    /*$parameter_parent = [
                        "额定电压",
                        "额定功率",
                        "整定电流范围",
                        "控制电压",
                        "配置底座",
                    ];*/
                    // 26_207_226
                    /*$parameter_parent = [
                        "电流范围",
                        "控制电压",
                        "输入点数量",
                        "输出点数量",
                        "操作面板",
                        "通讯协议",
                        "测量参数",
                    ];*/
                    // 26_207_372
                    /*$parameter_parent = [
                        "额定电压",
                        "额定电流",
                        "辅助触点",
                        "控制线圈电压",
                        "剩余电流保护",
                        "应该场合",
                    ];*/
                    // 26_27_126
                    /*$parameter_parent = [
                        "产品类型",
                        "额定电压",
                        "颜色",
                        "安装直径",
                        "材料",
                    ];*/
                    // 26_27_1556
                    /*$parameter_parent = [
                        "电阻值",
                        "元件类型",
                        "额定功率",
                        "机械角度",
                        "接线方式",
                    ];*/
                    // 26_27_199
                    /*$parameter_parent = [
                        "产品类型",
                        "位数",
                        "功能",
                        "手柄类型",
                        "辅助触点",
                        "颜色",
                        "灯源",
                        "额定电压",
                        "基座材料",
                        "安装直径",
                    ];*/
                    // 26_27_201
                    /*$parameter_parent = [
                        "产品类型",
                        "功能",
                        "额定电流",
                        "触点数量",
                        "手柄类型",
                        "控制面板",
                        "安装方式",
                    ];*/
                    // 26_27_203
                    /*$parameter_parent = [
                        "产品类型",
                        "位数",
                        "操作方向",
                        "辅助触点",
                    ];*/
                    // 26_27_273
                    /*$parameter_parent = [
                        "额定电流",
                        "触点类型",
                        "极数",
                        "控制电压",
                    ];*/
                    // 26_27_28
                    /*$parameter_parent = [
                        "产品类型",
                        "颜色",
                        "灯源",
                        "灯座额定电压",
                        "辅助触点",
                        "基座材料",
                        "功能",
                        "安装直径",
                    ];*/
                    // 26_27_30
                    /*$parameter_parent = [
                        "产品类型",
                        "额定电压",
                        "颜色",
                        "安装方式",
                        "发光形式",
                        "灯源",
                        "蜂鸣器",
                    ];*/
                    // 26_27_306
                    /*$parameter_parent = [
                        "产品类型",
                        "额定电压",
                        "基座材料",
                        "信号类型",
                    ];*/
                    // 26_27_369
                    /*$parameter_parent = [
                        "产品类型",
                        "输出类型",
                        "连接",
                        "电源电压",
                        "操作位置",
                        "操作类型",
                        "边框材料",
                        "IP防护等级",
                        "安装直径",
                    ];*/
                    // 26_27_530
                    /*$parameter_parent = [
                        "产品类型",
                        "扩展位",
                        "功能",
                    ];*/
                    // 26_356_283
                    /*$parameter_parent = [
                        "输入电压",
                        "输出电压",
                        "额定功率",
                    ];*/
                    // 26_356_344
                    /*$parameter_parent = [
                        "产品类型",
                        "相数",
                        "额定容量",
                        "输入电压",
                        "输出电压",
                        "额定工作频率",
                    ];*/
                    // 26_356_70
                    /*$parameter_parent = [
                        "产品类型",
                        "输入电压",
                        "输出功率",
                        "输出电压",
                        "额定输出电流",
                    ];*/
                    // 26_358_2026
                    /*$parameter_parent = [
                        "产品类型",
                        "外形尺寸（mm）",
                        "安装方式",
                        "供电方式",
                        "精度",
                        "测温范围",
                        "探头",
                        "发射功率",
                        "通讯频率",
                    ];*/
                    // 26_358_234
                    /*$parameter_parent = [
                        "产品类型",
                    ];*/
                    // 26_358_240
                    /*$parameter_parent = [
                        "产品类型",
                    ];*/
                    // 26_358_245
                    /*$parameter_parent = [
                        "产品类型",
                        "触点类型",
                        "压力量程",
                        "连接方式",
                        "流体连接",
                        "可控流体",
                    ];*/
                    // 26_358_246
                    /*$parameter_parent = [
                        "产品类型",
                        "触点类型",
                        "压力量程",
                        "连接方式",
                        "流体连接",
                        "可控流体",
                    ];*/
                    // 26_358_253
                    /*$parameter_parent = [
                        "产品类型",
                        "材料",
                    ];*/
                    // 26_358_255
                    /*$parameter_parent = [
                        "产品类型",
                        "触点类型",
                        "连接方式",
                        "拉线定位点",
                        "拉绳长度",
                        "按钮类型",
                        "颜色",
                    ];*/
                    // 26_358_256
                    /*$parameter_parent = [
                        "产品类型",
                        "踏板",
                        "触点动作",
                        "材料",
                        "颜色",
                        "保护盖",
                    ];*/
                    // 26_358_257
                    /*$parameter_parent = [
                        "产品类型",
                        "控制电压",
                        "触点类型",
                        "连接方式",
                        "操作头",
                        "极数",
                        "应用场合",
                        "材料",
                    ];*/
                    // 26_358_261
                    /*$parameter_parent = [
                        "产品类型",
                        "感应距离",
                        "电源电压",
                        "通讯协议",
                    ];*/
                    // 26_358_265
                    /*$parameter_parent = [
                        "产品类型",
                    ];*/
                    // 26_358_275
                    /*$parameter_parent = [
                        "电缆长度",
                        "产品类型",
                    ];*/
                    // 26_358_373
                    /*$parameter_parent = [
                        "产品类型",
                        "操作头形式",
                        "触点类型",
                        "连接方式",
                        "本体外壳材料",
                    ];*/
                    // 26_358_375
                    /*$parameter_parent = [
                        "产品类型",
                        "电源电压",
                        "安装方式",
                        "接线方式",
                        "连接方式",
                        "输出类型",
                        "功能",
                        "感应距离",
                        "材料",
                    ];*/
                    // 26_358_376
                    /*$parameter_parent = [
                        "产品类型",
                        "电源电压",
                        "接线方式",
                        "连接方式",
                        "输出类型",
                        "功能",
                        "感应距离",
                        "材料",
                    ];*/
                    // 26_358_379
                    /*$parameter_parent = [
                        "产品类型",
                        "轴类型",
                        "电源电压",
                        "输出类型",
                        "连接方式",
                        "分辨率",
                    ];*/
                    // 26_81_82
                    /*$parameter_parent = [
                        "产品类型",
                        "电源电压",
                        "数字量输入",
                        "数字量输出",
                        "模拟量输入",
                        "模拟量输出",
                        "数字量输入电压",
                        "数字量输出类型",
                        "模拟量输入类型",
                        "模拟量输出类型",
                    ];*/
                    // 26_90_91
                    /*$parameter_parent = [
                        "电压等级",
                        "额定功率",
                        "额定电流",
                        "控制面板",
                        "通讯协议",
                        "远程显示终端",
                        "应用场合",
                        "防护等级",
                    ];*/
                    // 26_90_92
                    /*$parameter_parent = [
                        "电压等级",
                        "额定功率",
                        "额定电流",
                        "控制面板",
                        "通讯协议",
                        "远程显示终端",
                        "应用场合",
                        "防护等级",
                    ];*/
                    // 26_90_93
                    /*$parameter_parent = [
                        "电压等级",
                        "额定功率",
                        "额定电流",
                        "控制面板",
                        "通讯协议",
                        "远程显示终端",
                        "应用场合",
                        "防护等级",
                    ];*/
                    // 26_90_97
                    /*$parameter_parent = [
                        "产品分类",
                        "电压等级",
                        "额定功率",
                        "额定电流",
                        "应用场合",
                        "内置旁路接触器",
                    ];*/
                    // 26_99_101
                    /*$parameter_parent = [
                        "分辨率",
                        "屏幕尺寸",
                        "颜色",
                        "用户内存",
                        "功能",
                    ];*/
                    // 26_99_1461
                    /*$parameter_parent = [
                        "分辨率",
                        "屏幕尺寸",
                        "CPU",
                        "内存",
                    ];*/
                    // 32_140_1550
                    /*$parameter_parent = [
                        "产品类型",
                        "产品描述",
                    ];*/
                    // 32_140_297
                    /*$parameter_parent = [
                        "支架类型",
                        "箱体尺寸（长*宽*高）mm",
                        "箱体材料",
                        "箱盖尺寸（长*宽*高）mm",
                        "箱盖材料",
                        "其他配置",
                    ];*/
                    // 32_140_308
                    /*$parameter_parent = [
                        "功能",
                        "产品说明",
                    ];*/
                    // 32_140_317
                    /*$parameter_parent = [
                        "支架类型",
                        "箱盖颜色",
                        "箱盖尺寸（长*宽*高）mm",
                        "箱体尺寸（长*宽*高）mm",
                    ];*/
                    // 32_140_346
                    /*$parameter_parent = [
                        "箱体规格",
                        "地排端子材料",
                        "地排端子尺寸",
                        "打开方式",
                    ];*/
                    // 32_174_175
                    /*$parameter_parent = [
                        "额定电压",
                        "额定短路开断电流",
                        "额定电流",
                        "安装方式",
                        "相间距（mm）",
                        "标准配置附件",
                        "可选附件",
                    ];*/
                    // 32_177_182
                    /*$parameter_parent = [
                        "电压保护功能",
                        "装置电源电压",
                        "额定相电流",
                        "额定零序电流",
                        "开孔尺寸（mm）",
                        "开入量点数",
                        "开出量点数",
                        "装置保护类型",
                        "扩展I/O模块",
                        "操作/防跳回路",
                        "测量CT回路",
                        "通讯接口",
                        "通讯协议",
                    ];*/
                    // 32_311_132
                    /*$parameter_parent = [
                        "产品分类",
                        "安装方式",
                        "连接时钟位置",
                        "额定电压",
                        "额定电流",
                        "极数",
                        "额定频率",
                        "防护等级",
                    ];*/
                    // 32_311_471
                    /*$parameter_parent = [
                        "产品类型",
                        "芯数",
                        "插芯额定电流",
                        "插芯额定电压",
                        "插芯连接方式",
                        "外壳锁扣形式",
                        "外壳高度（mm）",
                        "外壳螺纹连接",
                    ];*/
                    // 32_336_337
                    /*$parameter_parent = [
                        "额定电压",
                        "额定短路开断电流",
                        "接触器额定电流",
                        "安装方式",
                        "熔断器座",
                        "相间距/极间距（mm）",
                        "控制方式",
                        "控制电压",
                        "标准配置附件",
                        "可选附件",
                    ];*/
                    // 32_71_335
                    /*$parameter_parent = [
                        "额定电压",
                        "最大冲击电流",
                        "最大放电电流",
                        "标称放电电流",
                        "最大短路分断",
                        "极数",
                        "试验类别",
                    ];*/
                    // 32_71_533
                    /*$parameter_parent = [
                        "产品类型",
                    ];*/
                    // 32_71_72
                    /*$parameter_parent = [
                        "极数",
                        "最大放电电流",
                        "标称放电电流",
                        "最大可持续电压",
                        "电压保护水平",
                        "远程指示触点",
                        "额定电压",
                    ];*/
                    // 32_74_281
                    /*$parameter_parent = [
                        "相数",
                        "额定电压",
                        "额定电流",
                        "电抗率",
                    ];*/
                    // 32_74_75
                    /*$parameter_parent = [
                        "额定容量",
                        "相数",
                        "额定电压",
                        "额定频率",
                        "外壳",
                        "连接方式",
                    ];*/
    }
}
