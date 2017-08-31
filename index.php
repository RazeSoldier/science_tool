<?php
/* 
 * @file 入口文件
 */

/**
 * 定义一些全局常量路径
 * @const string DOCS_PATH html静态文件路径
 */
define('ROOT_PATH', __DIR__);
define('DOCS_PATH', __DIR__.'/docs/');
define('INCLUDES_PATH', __DIR__.'/includes/');
define('ROUTING_PATH', INCLUDES_PATH.'routing/');

require_once INCLUDES_PATH.'checkError.class.php';

$checkerror = new checkError();

/**
 * 获取url中的查询字串符
 * @var array httpreqies URL中所有的查询字串符
 * @var string 抓取URL中title的查询字串符
 */
$httprequire = filter_input_array(INPUT_GET);
$title = $httprequire['title'];

/**
 * 首页路由
 * 如果$title为NULL或者title为main_page，
 * 则引用首页的html文件
 */
if ($title == NULL or $title == 'main_page'){
    require_once DOCS_PATH.'index.html';
    $title = 'main_page';
}

/**
 * 拆分$title的请求
 * @param string $require Description
 * @return array 返回一个数组
 */
$require = explode('/', $title);


/**
 * 路由主请求
 * 
 * 如果请求未匹配则返回404错误码
 */
switch ($require[0]) {
    case 'physics':
        require_once ROUTING_PATH.'physics.php';
        break;
    case 'encrypt':
        require_once ROUTING_PATH.'encrypt.php';
        break;
    case 'health':
        require_once ROUTING_PATH.'health.php';
        break;
    case 'main_page':
        break;
    default:
        $error = 404;
        break;
}

/*如果错误码为404，则返回404错误页*/
if ($error == 404){
    die (checkError::return404());
}