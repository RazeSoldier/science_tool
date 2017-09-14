<?php
/** 
 * 本文件检查PHP版本是否符合要求
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
 * 检查PHP的版本
 * 如果当前环境的版本低于5.4.0,报错
 * 
 * @class
 */
class PHPVersionCheck{
    /**
     * 返回当前PHP环境的相关信息
     * 
     * @return array 软件所能支持的PHP信息，包括:
     * - 'minimumVersionPHP':软件所能支持的最低版本
     * - 'phpVersion':当前的PHP版本
     * - 'upgradeURL':升级网址
     */
    function getPHPinfo(){
        $minimumVersionPHP = '5.4.0';
        $phpVersion = PHP_VERSION;
        $upgradeURL = 'https://secure.php.net/downloads.php';
        return array(
            'minimumVersionPHP' => $minimumVersionPHP,
            'phpVersion' => $phpVersion,
            'upgradeURL' => $upgradeURL
        );
    }
    
    /**
     * 检查PHP环境
     * 
     * @return int 如果PHP版本低于最低可接受的版本，返回1
     */
    function checkVersion(){
        if (function_exists( 'version_compare' ) == false){
            die ('version_compare函数<b>不存在</b>，无法比较PHP版本。你的PHP版本很可能低于4.1.0！');
        }
        
        $PHPinfo = $this->getPHPinfo();
        if (version_compare($PHPinfo['phpVersion'], $PHPinfo['minimumVersionPHP']) < 0){
            return 1;
        }
    }
    
    /**
     * 设置输出页面
     * 
     * @return string
     */
    function setOutputHTML(){
        $finalOutput = <<<HTML
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>PHP版本过低</title>
    </head>
    <body>
        <h1>内部错误</h1>
        您所安装的PHP的版本为<b>{$this->getPHPinfo()['phpVersion']}</b>。<br>
        安装本软件的最低要求为<b>{$this->getPHPinfo()['minimumVersionPHP']}</b>
        您可以到此处下载最新版的PHP:<a href='{$this->getPHPinfo()['upgradeURL']}'>{$this->getPHPinfo()['upgradeURL']}</a>
    </body>
</html>
HTML;
        
        return $finalOutput;
    }
            
    function returnError(){
        if ($this->checkVersion() == 1){
            header('HTTP/1.0 500 Internal Error');
            // Don't cache error pages!  They cause no end of trouble...
            header( 'Cache-control: none' );
            header( 'Pragma: no-cache' );
            
            echo $this->setOutputHTML();
            die (1);
        }
    }
} 

/**
 * 实例化PHPVersionCheck类
 */
$PHPVersionCheck = new PHPVersionCheck();
$PHPVersionCheck->returnError();
