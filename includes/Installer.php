<?php
/** 
 * 安装脚本的核心代码
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
 
class Installer{
	/**
	 * @var string $IP 软件根目录路径
	 */
	private $IP;
    
	/**
	 * @var array $getRequset GET请求的数组
	 */
	private $getRequest;

	/**
	 * @var array $postRequest POST请求的数组
	 */
	private $postRequest;

	public function __construct(){
	    global $IP;
	    
	    $this->IP = $IP;
            $this->getRequest = filter_input_array(INPUT_GET);
            $this->postRequest = filter_input_array(INPUT_POST);
	}

	/**
	 * 设置title
	 *
	 * @return string
	 */
	private function setTitle(){
		return '<title>安装脚本</title>';
	}
	
	/**
	 * 设置css样式
	 *
	 * @param string style
	 * @return string
	 */
	private function setCss($style){
		return '<style>'.$style.'</style>';
	}
	
	/**
	 * 设置Head块
	 *
	 * @return string
	 */
	private function setHead($css = null){
		return '<head>'.$this->setTitle().$this->setCss($css).'</head>';
	}
	
	/**
	 * 设置body块
	 *
	 * @return string
	 */
	private function setBody($content){
		return '<body>'.$content.'</body>';
	}
	
	/**
	 * 路由Web请求
	 *
	 */
	public function pathRouting(){
		$HttpRequest = $this->getRequest['page'];
		if ($HttpRequest == null or $HttpRequest == 1){
			$this->outputPage1();
			$HttpRequest = 1;
		}
		
		switch ($HttpRequest){
			case 1:
				break;
			case 2:
				$this->outputPage2();
				break;
			case 3:
				$this->outputPage3();
				break;
			default:
				$this->return404();
		}
	}
	
	/**
	 * 起始页
	 *
	 */
	private function outputPage1(){
	    if (file_exists($this->IP.'LocalSettings.php')){
		$content = <<<HTML
<div>
    <h2>安装脚本</h2>
    欢迎使用本软件，science tool。<br>
    <a href="/config/index.php?page=2">点此</a>开始安装软件。
</div>
HTML;
	    }else{
		$content = <<<HTML
<div>
    <h2>安装脚本</h2>
    LocalSettings.php已存在<br>
    <a href="/config/index.php?page=2">依旧配置</a>
</div>
HTML;
	    }
	    $css = 'div{text-align:center}';
	    return $this->output($content, $css);
	}
	
	/**
	 * 表单输入页
	 *
	 */
	private function outputPage2(){
		$content = <<<HTML
<form name="Installer" method="post" action="index.php?page=3">
	<div>
		<h2>安装脚本</h2>
		网站名称:<input name="set_Sitename" type="text"><br>
		网站地址栏图标路径:\$IP/ <input name="set_Siteicon" type="text"> <small>(请把图标文件放置到网站的目录下面，\$IP指软件当前的安装路径)</small><br>
		<input name="submit" type="submit" value="提交">
	</div>
</form>
HTML;
		$css = 'div{text-align:center}';
		return $this->output($content, $css);
	}
	
	private function outputPage3(){
		$post = $this->postRequest;
		$this->checkInstall($post);
		$code = $this->getCode($post);
		$content = <<<HTML
<div>
<h2>安装脚本</h2>{$this->setWarningInfobox($post)}
配置已完成，请复制以下代码到软件的根目录并命名为LocalSettings.php<br>
<textarea name="文本框" rows=10 cols=40 warp="hard" readonly>{$code}</textarea>
</div>
HTML;
	$css = 'div{text-align:center} .warning-infobox {
		border: 2px solid #ff7f00;
		margin: 0.5em;
		clear: left;
		overflow: hidden;
	}';
	return $this->output($content, $css);
	}
	
	/**
	 * HTML输出模版
	 *
	 */
	private function output($content, $css = null){
		echo '<!DOCTYPE html><html>';
		echo $this->setHead($css);
		echo $this->setBody($content);
		echo '</html>';
	}
	
	/**
	 * 获取LocalSettings.php文件的代码
	 *
	 * @return string
	 */
	private function getCode($post){
		$config = $this->handler($post);
		$code = $this->codeTemplate($config);
		return $code;
	}
	
	/**
	 * 处理用户输入的信息
	 *
	 */
	private function handler($post){
		$Sitename = $post['set_Sitename'];
		$SitecionPart = $this->getSitecionPart($post['set_Siteicon']);
		$config = array(
			'Sitename' => $Sitename,
			'SitecionPart' => $SitecionPart
		);
		return $config;
	}
	
	/**
	 * LocalSettings.php的模板代码
	 *
	 */
	private function codeTemplate($config){
		$template = <<<CODE
<?php
/**
 * 本文件是软件的配置文件
 * 本文件不应该能被外界直接访问
 *
 * @file
 */

//网站名称 
\$gSitename = '{$config['Sitename']}';
{$config['SitecionPart']}
CODE;
	return $template;
	}

	/**
	 * 获取$gSitexion配置的段落html代码
	 *
	 * 如果用户未指定Sitecion，则返回NULL
	 *
	 * @return string|NULL
	 */
	private function getSitecionPart($in){
	    if ($this->checkInputValueIsNotNull($in) == false){
		return NULL;
	    }else{
		$code = <<<CODE
\n//网站地址栏图标路径
\$gSitecion = '{$this->spliceFilePath($in)}';
CODE;
		return $code;
	    }
	}
	
	/**
	 * 定义404错误信息
	 *
	 */
	private function return404(){
		http_response_code(404);
        echo <<<Error404
<title>页面不存在</title>
<h1>页面不存在</h1>
<a href="JavaScript:history.go(-1)">返回上一页</a>或者
<a href="index.php">返回首页</a>
Error404;
	}
	
	/**
	 * 定义错误信息框
	 * 
	 * @param array $post POST请求数组
	 * @return string|NULL
	 */
	private function setWarningInfobox($post){
	    $checkFileExist = $this->checkFileExist($post['set_Siteicon']);
	    $check = array(
		$checkFileExist
	    );
	    
	    $error = NULL; //声明一个空值的变量
	    foreach ($check as $value) {
		/*如果数组$check其中一个元素有值，为$error赋true*/
		if (isset($value)){
		    $error = true;
		}
	    }
	    
	    if ($error){
		$content = $checkFileExist;
		$WarningInfobox = '<div class="warning-infobox"><b>警告</b>'.$content.'</div>';
		return $WarningInfobox;
	    }
	}

	/**
	 * 检查用户访问是否非法
	 *
	 * @param string $value
	 */
	private function checkInstall($value){
		if (isset($value) == false){
			echo '<script type="text/javascript">alert(\'非法访问!\');window.location.href=\'index.php?page=2\';</script>';
			die (1);
		}
	}


	/**
	 * 检查文件是否存在
	 *
	 * 如果不存在，返回一条错误信息到最终页
	 *
	 * @param string $in_filepath 用户提交的文件路径
	 */
	private function checkFileExist($in_filepath){
		$filepath = $this->IP.$in_filepath;
		if (file_exists($filepath) == false and $this->checkInputValueIsNotNull($in_filepath)){
			return '<li>地址栏图标文件不存在</li>';
		}
	}

	/**
	 * 检查用户是否输入值
	 *
	 * 如果有，则返回true;如果没有，则返回false
	 *
	 * @param string|NULL $value
	 */
	private function checkInputValueIsNotNull($value){
		if ($value == '' or ctype_space($value) == true){
			return false;
		}else{
			return true;
		}
	}

	/**
	 * 拼接用户传入的文件名
	 *
	 * @param string $in
	 *
	 * @return string
	 */
	private function spliceFilePath($in){
		return $this->IP.$in;
	}
}
