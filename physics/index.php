<?php
/* 
 * 作为物理学计算的后台接口
 */
$type = filter_input(INPUT_POST, 'type'); //获取计算类型

/**
 * 路由来自前端的请求
 * 
 * @param string $type 
 */
switch ($type) {
    case 'schwarzschild':
        $in_sm = filter_input(INPUT_POST, 'sm');
        $schwarzschild = new schwarzschild($in_sm);
        $output = $schwarzschild -> Output();
        break;
    case 'F-W':
	$in_type = filter_input(INPUT_POST, 'in_type'); //计算类型(FtoW,WtoF)
	$in_f = filter_input(INPUT_POST,'frequency'); //频率
	$in_w = filter_input(INPUT_POST,'wavelength'); //波长
	$in_unit = filter_input(INPUT_POST,'unit'); //(知波长求频率)波长输入值的单位
	$FW = new frequency_wavelength($in_type, $in_f, $in_w, $in_unit);
        $FW -> finalOutput();
        break;
    case 'gravity':
        $in_m1 = filter_input(INPUT_POST, 'gm1'); //一个物体的质量
        $in_m2 = filter_input(INPUT_POST, 'gm2'); //另一个物体的质量
        $in_r = filter_input(INPUT_POST, 'gr'); //两个物体之间的距离
        $output = new gravity($in_m1, $in_m2, $in_r);
        $output -> finalOutput();
        break;
    case 'relativistic_mass':
        $in_m = filter_input(INPUT_POST, 'rmm0'); //物体的质量
        $in_v = filter_input(INPUT_POST, 'rmv'); //物体的速度
        $output = new relativistic_mass($in_m, $in_v);
        $output -> finalOutput();
        break;
    case 'relativistic_momentum':
        $in_m = filter_input(INPUT_POST, 'rmm1'); //物体的质量
        $in_v = filter_input(INPUT_POST, 'rmv1'); //物体的速度
        $output = new relativistic_momentum($in_m, $in_v);
        $output -> finalOutput();
        break;
    case 'length_contraction':
        $in_l = filter_input(INPUT_POST, 'lcs'); //物体运动方向的长度
        $in_v = filter_input(INPUT_POST, 'lcv'); //物体的速度
        $output = new length_contraction($in_l, $in_v);
        $output -> finalOutput();
        break;
    case 'time_dilation':
        $in_t = filter_input(INPUT_POST, 'tdt'); //物体运动方向的长度
        $in_v = filter_input(INPUT_POST, 'tdv'); //物体的速度
        $output = new time_dilation($in_t, $in_v);
        $output -> finalOutput();
        break;
}
