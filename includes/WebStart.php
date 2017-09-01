<?php
/** 
 * 本文件初始化来自用户的web请求，
 * 并实例化checkError类
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
 * http://www.gnu.org/copyleft/gpl.html
 * 
 * @file
 */

/*实例化checkError类*/
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