<?php
/* 
 * 作为物理学计算的后台接口
 */
define('INCLUDES_PATH', realpath('../includes')); //定义includes目录的绝对路径

$type = filter_input(INPUT_POST, 'type'); //获取计算类型

switch ($type) {
    case 'schwarzschild':
        require_once INCLUDES_PATH.'/physics/schwarzschild.subclass.php';
        $in_sm = filter_input(INPUT_POST, 'sm');
        $schwarzschild = new schwarzschild($in_sm);
        $output = $schwarzschild -> Output();
        break;
    case 'F-W':
	require_once INCLUDES_PATH.'/physics/frequency-wavelength.subclass.php';
	$in_type = filter_input(INPUT_POST, 'in_type'); //计算类型(FtoW,WtoF)
	$in_f = filter_input(INPUT_POST,'frequency'); //频率
	$in_w = filter_input(INPUT_POST,'wavelength'); //波长
	$in_unit = filter_input(INPUT_POST,'unit'); //(知波长求频率)波长输入值的单位
	$FW = new frequency_wavelength($in_type, $in_f, $in_w, $in_unit);
        $FW -> finalOutput();
        break;
}