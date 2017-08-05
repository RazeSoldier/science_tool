<?php
/* 本类用来检查用户输入值的错误
 * 
 * @Error
 * 错误信息 | 错误码 | 使用场景
 * 用户未输入任何值 | 10
 * 用户未选择任何单选项 | 11 | 具有单选的页面
 * 用户输入的值不合法 | 2
 * 用户输入值不是数字 | 3 | 设置要求输入值为数字时
 */

abstract class checkError {
    static $error10 = <<<Error10
<h1>错误！</h1>
你未输入任何数值！<br>
<a href="JavaScript:history.go(-1)">返回</a>
Error10;
    
    static $error11 = <<<Error11
<h1>错误！</h1>
你未选择任意选项！<br>
<a href="JavaScript:history.go(-1)">返回</a>
Error11;
    
    static $error3 = <<<Error2
<h1>错误！</h1>
你输入了非数字，请输入大于0的数字。<br>
<a href="JavaScript:history.go(-1)">返回</a>
Error2;

    public function checkNullValue($value){ //检查用户是否输入内容(error1)
        if ('' !== $value){
            return false;
        }else{
            return true;
        }
    }


    public function checkRadioValue($value) { //检查用户是否选定单选项(error11)
        if (isset($value)){
            return false;
        }else{
            return true;
        }
    }
    
    public function checkIsNumber($value){ //检查用户输入值是否为数字(error3)
        if (is_numeric($value)){
            return false;
        }else{
            return true;
        }
    }
}

