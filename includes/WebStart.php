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

/**
 * @const boolean 定义web入口点，请勿移动此行到includes/Defines.php
 */
define('SCIENCE_TOOL', true);

// 手动设置include_path路径
set_include_path($IP.'/includes');

/**
 * 如果LocalSettings.php不存在，尝试显示错误信息
 */
if (!defined('ST_CONFIG_CALLBACK')){
    if (!defined('CONFIG_FILE')){
	define('CONFIG_FILE', "$IP/LocalSettings.php");
    }
    if (!is_readable(CONFIG_FILE)){
	function gfWebStartNoLocalSettings(){
	    global $IP;
	    require_once "$IP/includes/NoLocalSettings.php";
	    die();
	}
	define('ST_CONFIG_CALLBACK', 'gfWebStartNoLocalSettings');
    }
}

require_once "$IP/includes/Setup.php";