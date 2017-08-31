<?php
/* 
 * 本文件用来路由物理主请求的子请求
 */
$subrequire = $require[1];

function routing($in){
    global $httprequire;
    $action = $httprequire['action'];
    if ($action == 'result'){
        require_once 'physics/index.php';
    }else{
        require_once DOCS_PATH.'physics/'.$in.'.html';
    }
}

switch ($subrequire) {
    case 'gravity':
        routing('gravity');
        break;
    case 'frequency_wavelength':
        routing('frequency_and_wavelength');
        break;
    case 'schwarzschild':
        routing('schwarzschild');
        break;
    case 'relativistic_mass':
        routing('relativistic_mass');
        break;
    case 'relativistic_momentum':
        routing('relativistic_momentum');
        break;
    case 'time_dilation':
        routing('time_dilation');
        break;
    case 'length_contraction':
        routing('length_contraction');
        break;
    default:
        $error = 404;
        break;
}