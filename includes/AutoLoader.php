<?php
/** 
 * 本文件自动加载本软件所有的类
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

class AutoLoader{
    /**
     * 设定spl_autoload_register的默认文件扩展名
     */
    private function setSplExtension(){
        spl_autoload_extensions('.class.php,.subclass.php,.php');
    }
    
    final public function autoLoading(){
        $this->setSplExtension();
        spl_autoload_register();
    }
}

$AutoLoader = new AutoLoader();
$AutoLoader->autoLoading();