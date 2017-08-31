<?php
/* 
 * 本文件用来路由哈希函数计算的请求
 */

$action = $httprequire['action'];
if ($action == 'result'){
    require_once 'encrypt/index.php';
}else{
    require_once DOCS_PATH.'encrypt/index.html';
}