<?php
/** 
 * 本文件定义了一些全局常量
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
 * 定义一些全局路径常量
 * 
 * @const string DOCS_PATH 软件根目录下的docs文件夹路径
 * @const string INCLUDES_PATH 软件根目录下的includes文件夹路径
 * @const string ROUTING_PATH 软件根目录下的includes/routing文件夹路径
 * @const string CONFIG_FILE 软件的配置文件路径
 */
define('INCLUDES_PATH', $IP.'/includes/');
define('DOCS_PATH', INCLUDES_PATH.'page/');
define('ROUTING_PATH', INCLUDES_PATH.'routing/');
define('CONFIG_FILE', $IP.'/LocalSettings.php');