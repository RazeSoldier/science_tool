<?php
/* 
 * 作为物理学计算的后台接口
 */

$type = filter_input(INPUT_POST, 'type'); //获取计算类型

switch ($type) {
    case 'schwarzschild':
        require_once '../includes/physics/schwarzschild.class.php';
        $in_sm = filter_input(INPUT_POST, 'sm');
        $schwarzschild = new schwarzschild($in_sm);
        $output = $schwarzschild -> Output();
        break;
}