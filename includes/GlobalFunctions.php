<?php
/** 
 * 本文件放置全局函数
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

if (!defined('SCIENCE_TOOL')){
    die ('本文件是science_tool的一部分，它不是一个有效的访问点。');
}

/**
 * 过滤输入的HTML代码
 * 
 * @global object $gPurifier
 * @param string $input
 * @return string
 * @since 0.3.3
 */
function gfFilterHTML($input) {
    global $gPurifier;
    $finalOutput = $gPurifier->purify($input);
    return $finalOutput;
}