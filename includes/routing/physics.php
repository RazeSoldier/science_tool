<?php
/** 
 * 本文件用来路由物理主请求的子请求
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

function routing($in){
    global $httprequire;
    $action = $httprequire['action'];
    if ($action == 'result'){
        require_once 'physics/index.php';
    }else{
        require_once DOCS_PATH.'physics/'.$in.'.html';
    }
}

switch ($subTitleRequire) {
    case 'gravity':
        routing('gravity');
        break;
    case 'frequency_wavelength':
        routing('frequency_and_wavelength');
        break;
    case 'schwarzschild':
        routing('schwarzschild');
        break;
    case 'relativistic_mass':
        routing('relativistic_mass');
        break;
    case 'relativistic_momentum':
        routing('relativistic_momentum');
        break;
    case 'time_dilation':
        routing('time_dilation');
        break;
    case 'length_contraction':
        routing('length_contraction');
        break;
    default:
        die (checkError::return404());
        break;
}