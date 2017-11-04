<?php
/** 
 * 包含使ScienceTool工作的大部分内容
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

/**
 * 本文件不是一个有效的访问点，不做进一步执行
 * 除非定义了SCIENCE_TOOL
 */
if (!defined('SCIENCE_TOOL')){
    die (1);
}

/**
 * 预加载配置，在加载LocalSettings.php之前
 */

// 加载一些全局常量
require_once "$IP/includes/Defines.php";

// 加载自动加载类的代码
require_once INCLUDES_PATH.'AutoLoader.php';

// 加载默认设置
require_once INCLUDES_PATH.'DefaultSettings.php';

// 加载全局函数
require_once INCLUDES_PATH.'GlobalFunctions.php';

// 加载composer的自动加载器，如果存在的话
if ( is_readable( "$IP/vendor/autoload.php" ) ) {
    require_once "$IP/vendor/autoload.php";
}

// 实例化HTMLPurifier的配置
$HPconfig = HTMLPurifier_Config::createDefault();

/**
 * 加载LocalSettings.php
 */
if (defined('ST_CONFIG_CALLBACK')){
    call_user_func(ST_CONFIG_CALLBACK);
}else{
    if ( !defined('CONFIG_FILE')){
	define('CONFIG_FILE', "$IP/LocalSettings.php");
    }
    require_once CONFIG_FILE;
}

// 设置内部字符编码为UTF-8
mb_internal_encoding( 'UTF-8' );

if ($gFilterCache) {
    // 检查HTMLPurifier的缓存目录是否可被web服务器读写
    checkError::checkFilterCache();
}else{
    $HPconfig->set('Cache.DefinitionImpl', null);
}

/**
 * 实例化checkError类
 * 
 * @var string $gCheckError 将checkError对象存储到全局变量里
 */
$gCheckError = new checkError();

$gWebRequest = new WebRequest();

/**
 * @var string $gCommonHead 通用的head代码
 */
$gCommonHead = CommonHTML::setCommonHead();

/**
 * 实例化HTMLPurifier类
 * @var object HTMLPurifier对象
 */
$gPurifier = new HTMLPurifier($HPconfig);

$gOutput = new OutputPage();

/*实例化PathRouter类*/
$pathRouter = new PathRouter();
$Routing = $pathRouter->Routing();
