<?php
/* 
 * 作为健康指数计算的后台接口
 */

$type = filter_input(INPUT_POST, 'type'); //获取计算类型

/**
 * 路由来自前端的请求
 * 
 * @param string $type 
 */
switch ($type) {
    case 'bmi':
        require_once INCLUDES_PATH.'health/bmi.class.php';
        $weight = filter_input(INPUT_POST,'weight');
        $height = filter_input(INPUT_POST,'height');
        $bml = new BMI($weight,$height);
        $bml -> output();
        break;
    default:
        $error = 404;
        break;
}