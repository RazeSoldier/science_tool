<?php
/** 
 * 本文件解析查询URL的参数，并路由其请求
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

class PathRouter {
    private $httpRequest; //URL中所有的查询字符串
    
    private $titleParm; //查询字符串中的title参数

    public function __construct($httpRequest) {
        $this->httpRequest = $httpRequest;
    }
    
    /**
     * 获取查询URL中的title参数
     * 
     * @return string 查询URL中的title参数
     */
    private function getTitleParm(){
        $titleParm = $this->httpRequest['title'];
        return $titleParm;
    }

    /**
     * 首页路由
     * 如果title参数为NULL或者title参数为main_page，
     * 则引用首页的html文件
     */
    private function MainPage_Router(){
        $titleParm = $this->getTitleParm();
        
        if ($titleParm == NULL or $titleParm == 'main_page'){
            require_once DOCS_PATH.'index.php';
            $this->titleParm = 'main_page';
            
            die(1);
        }
    }
    
    /**
     * 拆分title参数
     * 
     * @return array 包含所有title参数的数组
     */
    private function explodeTitleRequest(){
        $splitTitleRequest = explode('/', $this->getTitleParm());
        return $splitTitleRequest;
    }
    
    /**
     * 获取title参数中的主请求
     * 
     * @return string title参数中的主请求
     */
    private function getMainTitleRequest(){
        $mainTitleRequest = $this->explodeTitleRequest()[0];
        return $mainTitleRequest;
    }
    
    /**
     * 获取title参数中的子请求
     * 
     * @return string title参数中的子请求
     */
    private function getSubTitleRequest(){
        $subTitleRequest = $this->explodeTitleRequest()[1];
        return $subTitleRequest;
    }

    /**
     * 路由主请求
     */
    private function MainRouter(){
	global $gSitename;
        $mainTitleRequire = $this->getMainTitleRequest();
        $subTitleRequest = $this->getSubTitleRequest();
        
        switch ($mainTitleRequire) {
            case 'physics':
                require_once ROUTING_PATH.'physics.php';
                break;
            case 'encrypt':
                require_once ROUTING_PATH.'encrypt.php';
                break;
            case 'health':
                require_once ROUTING_PATH.'health.php';
                break;
            case 'main_page':
                break;
            default :
                die (checkError::return404());
        }
    }

    final public function Routing(){
        $this->MainPage_Router();
        $this->MainRouter();
    }
}
