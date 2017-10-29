<?php
/* 本类用来检查用户输入值的错误
 * 
 * @Error
 * 错误信息 | 错误码 | 使用场景
 * 用户未输入任何值 | 10
 * 用户未选择任何单选项 | 11 | 具有单选的页面
 * 用户未完全输入必要的值 | 12 | 需要输入所有必要值的页面
 * 用户输入的值不合法 | 2
 * 用户输入值不是数字 | 3 | 设置要求输入值为数字时
 * 用户访问了不存在的页面 | 404
 * 用户指定了不存在的操作 | 405
 * //内部错误
 * 开发者未按要求编程 - 输入值并非数组 | 500 | 要求方法的输入值为数组的时
 */

class checkError {
    /**
     * 检查HTMLPurifier的缓存目录是否可被web服务器读写
     * 
     * 检查vendor/ezyang/htmlpurifier/library/HTMLPurifier/DefinitionCache/Serializer
     * 是否可以被网络服务器读写
     */
    public static function checkFilterCache(){
	global $IP;
	$checkDir = "$IP/vendor/ezyang/htmlpurifier/library/HTMLPurifier/DefinitionCache/Serializer";
	
	if ( !is_readable( $checkDir ) ){
	    HttpStatus::header( 500 );
	    echo 'HTMLPurifier的缓存目录不可读，请确保vendor/ezyang/htmlpurifier/library/HTMLPurifier/DefinitionCache/Serializer可以由web服务器读写';
	    die ( 1 );
	}
	if ( !is_writable( $checkDir ) ){
	    HttpStatus::header( 500 );
	    echo 'HTMLPurifier的缓存目录不可写，请确保vendor/ezyang/htmlpurifier/library/HTMLPurifier/DefinitionCache/Serializer可以由web服务器读写';
	    die ( 1 );
	}
    }

    /**
     * 获取$gSitename的数值
     * 
     * @return string $gSitename的数值
     */
    protected function getSiteName(){
        global $gSitename;
        return $gSitename;
    }
    
    /*检查输入值是否为数组*/
    protected function checkMethodInputValueIsArray($value){
        if (is_array($value) == false){
            die ($this ->return500());
        }
    }

    public function checkNullValue($value){ //检查用户是否输入内容(error10)
        return ('' !== $value);
    }

    public function checkRadioValue($value) { //检查用户是否选定单选项(error11)
        return isset($value);
    }
    
    /** 检查是否用户输入所有的必要值(error12)
     * 使用方法:参数$value必须为数组
     */
    public function checkAllValueNotNull($value){ 
        $this -> checkMethodInputValueIsArray($value);
        $error = NULL; //声明一个空值的变量
        /*循环数组$value*/
        foreach ($value as $check) {
            /* 如果数组$value其中一个元素为空，
             * 为$error赋1
             */ 
            if ('' == $check){
                $error = 1;
            }
        }
        
        /* 检查$error是否等于0
         * 如果等于1，则说明用户没有输入任何内容，返回false
         */
        if ($error == 1){
            return false;
        }else{
            return true;
        }
    }


    /** 检查用户输入值是否为数字(error3)
     * 使用方法:参数$value必须为数组
     */
    public function checkIsNumber($value){
        $this -> checkMethodInputValueIsArray($value);
        $error = NULL; //声明一个空值的变量
        /*循环数组$value*/
        foreach ($value as $check) {
            /* 如果数组$value其中一个元素不为数字，
             * 为$error赋1
             */ 
            if (is_numeric($check) == false){
                $error = 1;
            }
        }
        
        /* 检查$error是否等于0
         * 如果等于1，则说明用户没有输入数字，返回false
         */
        if ($error == 1){
            return false;
        }else{
            return true;
        }
    }
    
    /*返回10错误码*/
    public function return10(){
        global $gCommonHead;
        $error10 = <<<Error10
<title>错误 - {$this->getSiteName()}</title>
$gCommonHead
<h1>错误！</h1>
你未输入任何数值！<br>
<a href="JavaScript:history.go(-1)">返回</a>
Error10;

        return $error10;
    }

    /*返回11错误码*/
    public function return11(){
        global $gCommonHead;
        $error11 = <<<Error11
<title>错误 - {$this->getSiteName()}</title>
$gCommonHead
<h1>错误！</h1>
你未选择任意选项！<br>
<a href="JavaScript:history.go(-1)">返回</a>
Error11;

        return $error11;
    }
    
    /*返回12错误码*/
    public function return12(){
        global $gCommonHead;
        $error12 = <<<Error12
<title>错误 - {$this->getSiteName()}</title>
$gCommonHead
<h1>错误！</h1>
你未输入所有计算所需要的数值<br>
<a href="JavaScript:history.go(-1)">返回</a>
Error12;

        return $error12;
    }
    
    /*返回3错误码*/
    public function return3(){
        global $gCommonHead;
        $error3 = <<<Error3
<title>错误 - {$this->getSiteName()}</title>
$gCommonHead
<h1>错误！</h1>
你输入了非数字，请输入正确的数字。<br>
<a href="JavaScript:history.go(-1)">返回</a>
Error3;

        return $error3;
    }

    /*返回404错误码并且返回404错误信息*/
    public function return404(){
        HttpStatus::header(404);
        global $gCommonHead;
	global $gSitename;
	echo <<<Error404
<title>页面不存在 - {$gSitename}</title>
$gCommonHead
<h1>页面不存在</h1>
<a href="JavaScript:history.go(-1)">返回上一页</a>或者
<a href="index.php">返回首页</a>
Error404;
    }
    
    /*返回405错误码并且返回405错误信息*/
    public function return405(){
        HttpStatus::header(405);
        global $gCommonHead;
        echo <<<Error405
<title>操作不存在 - {$this->getSiteName()}</title>
$gCommonHead
<h1>操作不存在</h1>
<a href="JavaScript:history.go(-1)">返回上一页</a>或者
<a href="index.php">返回首页</a>
Error405;
    }
    
    /*返回500错误码*/
    public function return500(){
	HttpStatus::header(500);
        global $gCommonHead;
        $error500 = <<<Error500
$gCommonHead
<title>Internal Error - {$this->getSiteName()}</title>
<h1>500 Error</h1>
You entered a non-array for the method.
Error500;

        return $error500;
    }
}

