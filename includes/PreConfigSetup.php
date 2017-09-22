<?php
/** 
 * 预加载配置文件
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

/*手动设置include_path路径*/
set_include_path($IP.'includes');

/*加载一些全局常量*/
require_once "$IP/includes/Defines.php";

/*加载自动加载类的代码*/
require_once INCLUDES_PATH.'AutoLoader.php';

/*加载默认设置*/
require_once INCLUDES_PATH.'DefaultSettings.php';

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
$gCommonHead = '<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">';
