<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ZydProductNum extends Model
{
    protected $connection = 'caiji';

    // protected $table = 'zyd_products_32_33_34'; // $category_id = 1015;
    // protected $table = 'zyd_products_32_33_35'; // $category_id = 1016;
    // protected $table = 'zyd_products_32_37_42'; // $category_id = 1011;
    // protected $table = 'zyd_products_32_37_49'; // $category_id = 1012;
    // protected $table = 'zyd_products_32_37_347'; // $category_id = 1013;
    // protected $table = 'zyd_products_32_37_380'; // $category_id = 1010;
    // protected $table = 'zyd_products_32_43_44'; // $category_id = 1003;
    // protected $table = 'zyd_products_32_43_45'; // $category_id = 1004;
    // protected $table = 'zyd_products_32_43_48'; // $category_id = 1005;
    // protected $table = 'zyd_products_32_43_51'; // $category_id = 1006;
    // protected $table = 'zyd_products_32_43_131'; // $category_id = 1008;
    // protected $table = 'zyd_products_32_52_53'; // $category_id = 1018;
    // protected $table = 'zyd_products_32_55_56'; // $category_id = 1022;
    // protected $table = 'zyd_products_32_55_59'; // $category_id = 1024;
    // protected $table = 'zyd_products_32_55_334'; // $category_id = 1023;
    // protected $table = 'zyd_products_32_55_1463'; // $category_id = 1025;
    // protected $table = 'zyd_products_32_61_62'; // $category_id = 1027;
    // protected $table = 'zyd_products_32_61_66'; // $category_id = 1028;
    // protected $table = 'zyd_products_32_140_141'; // $category_id = 1032;
    // protected $table = 'zyd_products_32_140_295'; // $category_id = 1030;
    // protected $table = 'zyd_products_32_140_298'; // $category_id = 1031;

    // protected $table = 'zyd_products_26_106_107'; // $category_id = 1162;
    // protected $table = 'zyd_products_26_117_118'; // $category_id = 1147;
    // protected $table = 'zyd_products_26_117_119'; // $category_id = 1148;
    // protected $table = 'zyd_products_26_117_120'; // $category_id = 1149;
    // protected $table = 'zyd_products_26_117_1632'; // $category_id = 1150;
    // protected $table = 'zyd_products_26_117_1633'; // $category_id = 1151;
    // protected $table = 'zyd_products_26_117_1635'; // $category_id = 1152;
    // protected $table = 'zyd_products_26_205_208'; // $category_id = 1069;
    // protected $table = 'zyd_products_26_205_209'; // $category_id = 1070;
    // protected $table = 'zyd_products_26_205_210'; // $category_id = 1071;
    // protected $table = 'zyd_products_26_205_211'; // $category_id = 1072;
    // protected $table = 'zyd_products_26_205_212'; // $category_id = 1073;
    // protected $table = 'zyd_products_26_206_215'; // $category_id = 1078;
    // protected $table = 'zyd_products_26_206_216'; // $category_id = 1079;
    // protected $table = 'zyd_products_26_206_217'; // $category_id = 1075;
    // protected $table = 'zyd_products_26_206_218'; // $category_id = 1076;
    // protected $table = 'zyd_products_26_206_219'; // $category_id = 1077;
    // protected $table = 'zyd_products_26_206_220'; // $category_id = 1080;
    // protected $table = 'zyd_products_26_206_307'; // $category_id = 1081;
    // protected $table = 'zyd_products_26_206_473'; // $category_id = 1085;
    // protected $table = 'zyd_products_26_206_474'; // $category_id = 1086;
    // protected $table = 'zyd_products_26_206_475'; // $category_id = 1087;
    // protected $table = 'zyd_products_26_206_531'; // $category_id = 1088;
    // protected $table = 'zyd_products_26_206_532'; // $category_id = 1089;
    // protected $table = 'zyd_products_26_207_224'; // $category_id = 1091;
    // protected $table = 'zyd_products_26_207_225'; // $category_id = 1092;
    // protected $table = 'zyd_products_26_207_226'; // $category_id = 1094;
    // protected $table = 'zyd_products_26_207_372'; // $category_id = 1095;
    // protected $table = 'zyd_products_26_27_126'; // $category_id = 1097;
    // protected $table = 'zyd_products_26_27_1556'; // $category_id = 1107;
    // protected $table = 'zyd_products_26_27_199'; // $category_id = 1100;
    // protected $table = 'zyd_products_26_27_201'; // $category_id = 1102;
    // protected $table = 'zyd_products_26_27_203'; // $category_id = 1101;
    // protected $table = 'zyd_products_26_27_276'; // $category_id = 1103;
    // protected $table = 'zyd_products_26_27_28'; // $category_id = 1099;
    // protected $table = 'zyd_products_26_27_30'; // $category_id = 1098;
    // protected $table = 'zyd_products_26_27_306'; // $category_id = 1106;
    // protected $table = 'zyd_products_26_27_369'; // $category_id = 1104;
    // protected $table = 'zyd_products_26_27_530'; // $category_id = 1108;
    // protected $table = 'zyd_products_26_356_283'; // $category_id = 1117;
    // protected $table = 'zyd_products_26_356_344'; // $category_id = 1118;
    // protected $table = 'zyd_products_26_356_70'; // $category_id = 1116;
    // protected $table = 'zyd_products_26_358_2026'; // $category_id = 1139;
    // protected $table = 'zyd_products_26_358_234'; // $category_id = 1129;
    // protected $table = 'zyd_products_26_358_240'; // $category_id = 1131;
    // protected $table = 'zyd_products_26_358_245'; // $category_id = 1135;
    // protected $table = 'zyd_products_26_358_246'; // $category_id = 1136;
    // protected $table = 'zyd_products_26_358_253'; // $category_id = 1122;
    // protected $table = 'zyd_products_26_358_255'; // $category_id = 1124;
    // protected $table = 'zyd_products_26_358_256'; // $category_id = 1123;
    // protected $table = 'zyd_products_26_358_257'; // $category_id = 1126;
    // protected $table = 'zyd_products_26_358_261'; // $category_id = 1137;
    // protected $table = 'zyd_products_26_358_265'; // $category_id = 1134;
    // protected $table = 'zyd_products_26_358_275'; // $category_id = 1138;
    // protected $table = 'zyd_products_26_358_373'; // $category_id = 1121;
    // protected $table = 'zyd_products_26_358_375'; // $category_id = 1128;
    // protected $table = 'zyd_products_26_358_376'; // $category_id = 1132;
    // protected $table = 'zyd_products_26_358_377'; // $category_id = 1130;
    // protected $table = 'zyd_products_26_358_379'; // $category_id = 1133;
    // protected $table = 'zyd_products_26_81_82'; // $category_id = 1141;
    // protected $table = 'zyd_products_26_90_91'; // $category_id = 1110;
    // protected $table = 'zyd_products_26_90_92'; // $category_id = 1111;
    // protected $table = 'zyd_products_26_90_93'; // $category_id = 1112;
    // protected $table = 'zyd_products_26_90_97'; // $category_id = 1114;
    // protected $table = 'zyd_products_26_99_101'; // $category_id = 1144;

    // protected $table = 'zyd_products_32_140_1550'; // $category_id = 1032;
    // protected $table = 'zyd_products_32_140_297'; // $category_id = 1033;
    // protected $table = 'zyd_products_32_140_308'; // $category_id = 1034;
    // protected $table = 'zyd_products_32_140_317'; // $category_id = 1035;
    // protected $table = 'zyd_products_32_140_346'; // $category_id = 1036;
    // protected $table = 'zyd_products_32_174_175'; // $category_id = 1056;
    // protected $table = 'zyd_products_32_177_182'; // $category_id = 1062;
    // protected $table = 'zyd_products_32_311_132'; // $category_id = 1038;
    // protected $table = 'zyd_products_32_311_471'; // $category_id = 1040;
    // protected $table = 'zyd_products_32_336_337'; // $category_id = 1060;
    // protected $table = 'zyd_products_32_71_335'; // $category_id = 1048;
    // protected $table = 'zyd_products_32_71_533'; // $category_id = 1049;
    // protected $table = 'zyd_products_32_71_72'; // $category_id = 1046;
    // protected $table = 'zyd_products_32_74_281'; // $category_id = 1052;
    // protected $table = 'zyd_products_32_74_75'; // $category_id = 1051;
    // protected $table = 'zyd_products_32_74_76'; // $category_id = 1053;


    protected $primaryKey = 'id';

    protected $guarded = [];

    public $timestamps = false;
}
