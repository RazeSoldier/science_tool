<?php
/** 
 * 最终渲染要显示的HTML代码
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

class OutputPage {
    /**
     * @var string 网站名称
     */
    private $siteName;

    /**
     * @var string 共用的head代码
     */
    private $commonHead;
    
    public function __construct() {
	global $gSitename;
	$this->siteName = $gSitename;
	$this->setCommonHead();
    }

    /**
     * 定义共用的head
     * 
     * @return string
     */
    private function setCommonHead(){
	global $gSiteicon;
	if (!empty($gSiteicon)){
	    $this->commonHead = '<link rel="shortcut icon" href="'.$gSiteicon
		    .'" /><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">';
	}else{
	    $this->commonHead = '<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">';
	}
    }
    
    /**
     * 定义HTML的head部分
     */
    private function setHTMLHead($pageTitle){
	$title = "<title>{$pageTitle} - {$this->siteName}</title>";
	return '<head>'.
		$title.
		$this->commonHead.
		'</head>';
    }
    
    /**
     * 定义HTML的body部分
     */
    private function setHTMLBody($body){
	$content = gfFilterHTML($body);
	return '<body>'.
		$content.
		'</body>';
    }

    /**
     * 输出HTML
     * 
     * @param string $pageTitle 页面标题
     * @param string $content 内容
     * @return string
     */
    final public function output($pageTitle, $content){
	echo '<!DOCTYPE html><html>'.
		$this->setHTMLHead($pageTitle).
		$this->setHTMLBody($content).
		'</html>';
    }
}
