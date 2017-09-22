<?php
/** 
 * 软件的安装和配置脚本文件
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

/*检测PHP版本*/
require_once dirname( __FILE__ ) . '/../includes/PHPVersionCheck.php';

require_once __DIR__ . '/../includes/Installer.php';
$Installer = new Installer();

/**
 * @var string $HttpRequest 获取查询字符串的page参数
 */
$HttpRequest = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT);
$Installer->pathRouting($HttpRequest);
