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
	 * @var string $phpExt 普通类文件的扩展名
	 */
	private $phpExt = '.php';

	/**
	 * @var string $classphpExt 类文件的扩展名
	 */
	private $classExt = '.class.php';

	/**
	 * @var string $subclassExt 子类文件的扩展名
	 */
	private $subclassExt = '.subclass.php';

	/**
	 * @var array $subDir includes文件夹下拥有类文件的文件夹名称
	 */
	private $subDir = array('encrypt', 'health', 'physics');

	/**
	 * @var int $subCount $subDir数组的键值个数
	 */
	private $subCount;

	public function __construct(){
		$this->subCount = count($this->subDir);
	}

	/**
	 * 在includes文件夹里搜索是否有匹配的类文件
	 *
	 * @return boolean
	 */
    private function findRoot($classname){
        if (file_exists(INCLUDES_PATH.$classname.$this->phpExt)){
        	require_once INCLUDES_PATH.$classname.$this->phpExt;
        	return true;
        }else if(file_exists(INCLUDES_PATH.$classname.$this->classExt)){
        	require_once INCLUDES_PATH.$classname.$this->classExt;
        	return true;
        }else if(file_exists(INCLUDES_PATH.$classname.$this->subclassExt)){
        	require_once INCLUDES_PATH.$classname.$this->subclassExt;
        	return true;
        }else{
        	return false;
        }
    }

    /**
     * 在includes下面特地的子文件夹里搜索是否有匹配的类文件
     */
    private function findSubDir($classname){
    	for ($i = 0; $i < $this->subCount; $i++){
    		$subDirname = $this->subDir[$i];
	    	if (file_exists(INCLUDES_PATH.$subDirname.'/'.$classname.$this->phpExt)){
	        	require_once INCLUDES_PATH.$subDirname.'/'.$classname.$this->phpExt;
	        	$i = -1;
	        }else if(file_exists(INCLUDES_PATH.$subDirname.'/'.$classname.$this->classExt)){
	        	require_once INCLUDES_PATH.$subDirname.'/'.$classname.$this->classExt;
	        	$i = -1;
	        }else if(file_exists(INCLUDES_PATH.$subDirname.'/'.$classname.$this->subclassExt)){
	        	require_once INCLUDES_PATH.$subDirname.'/'.$classname.$this->subclassExt;
	        	$i = -1;
	        } //end if
	        if ($i == -1){
	        	break;
	        }
    	} //end for
    }

    private function loadClass($classname){
    	$findRootResult = $this->findRoot($classname);
    	if (!$findRootResult){
    		$this->findSubDir($classname);
    	}
    }
    
    final public function autoLoading(){
        spl_autoload_register(array($this, 'loadClass'));
    }
}

$AutoLoader = new AutoLoader();
$AutoLoader->autoLoading();