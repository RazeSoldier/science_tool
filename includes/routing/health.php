<?php
/* 
 * 本文件用来路由健康指数计算的请求
 */
$subrequire = $require[1];

function routing($in){
    global $httprequire;
    $action = $httprequire['action'];
    if ($action == 'result'){
        require_once 'health/index.php';
    }else{
        require_once DOCS_PATH.'health/'.$in.'.html';
    }
}

switch ($subrequire) {
    case 'bmi':
        routing('bmi');
        break;
    default:
        $error = 404;
        break;
}