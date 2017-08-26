<?php
/* 本类用来检查用户输入值的错误
 * 
 * @Error
 * 错误信息 | 错误码 | 使用场景
 * 用户未输入任何值 | 10
 * 用户未选择任何单选项 | 11 | 具有单选的页面
 * 用户输入的值不合法 | 2
 * 用户输入值不是数字 | 3 | 设置要求输入值为数字时
 * //内部错误
 * 开发者未按要求编程 - 输入值并非数组 | 500 | 要求方法的输入值为数组的时
 */

abstract class checkError {
    static $error10 = <<<Error10
<title>错误 - 工具箱/学园都市</title>
<h1>错误！</h1>
你未输入任何数值！<br>
<a href="JavaScript:history.go(-1)">返回</a>
Error10;
    
    static $error11 = <<<Error11
<title>错误 - 工具箱/学园都市</title>
<h1>错误！</h1>
你未选择任意选项！<br>
<a href="JavaScript:history.go(-1)">返回</a>
Error11;
    
    static $error3 = <<<Error3
<title>错误 - 工具箱/学园都市</title>
<h1>错误！</h1>
你输入了非数字，请输入正确的数字。<br>
<a href="JavaScript:history.go(-1)">返回</a>
Error3;

    private $error500 = <<<Error500
<title>Internal Error</title>
<h1>500 Error</h1>
You entered a non-array for the method.
Error500;
    
    /*检查输入值是否为数组*/
    private function checkMethodInputValueIsArray($value){
        if (is_array($value) == false){
            die ($this -> error500);
        }
    }

    public function checkNullValue($value){ //检查用户是否输入内容(error1)
        return ('' !== $value);
    }


    public function checkRadioValue($value) { //检查用户是否选定单选项(error11)
        return isset($value);
    }
    
    /*检查用户输入值是否为数字(error3)*/
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
}

