<?php
/** 
 * 本文件初始化来自用户的web请求
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
 * @var float 请求开始的时间戳，微秒级别
 */
$gRequestTime = $_SERVER['REQUEST_TIME_FLOAT'];

/*预加载配置*/
require_once "$IP/includes/PreConfigSetup.php";

/*加载配置文件*/
if (file_exists(CONFIG_FILE)){
	require_once CONFIG_FILE;
}else{
	require_once INCLUDES_PATH.'/NoLocalSettings.php';
	die (1);
}

/**
 * @var string $gCommonHead 通用的head代码
 */
$gCommonHead = '<link rel="shortcut icon" href="'.$gSitecion.'
" /><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">';

/**
 * 获取url中的查询字串符
 * @var array gHttpRequire URL中所有的查询字串符
 */
$gHttpRequire = $gWebRequest->getHttpRequire();

/*实例化PathRouter类*/
$pathRouter = new PathRouter($gHttpRequire);
$Routing = $pathRouter->Routing();