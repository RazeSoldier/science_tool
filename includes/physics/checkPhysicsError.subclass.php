<?php
require_once '../includes/checkError.class.php';

class checkPhysicsError extends checkError {
    static $error2 = <<<Error2
<title>错误 - 工具箱/学园都市</title>
<h1>错误！</h1>
你输入的数值小于等于0！<br>
<a href="JavaScript:history.go(-1)">返回</a>
Error2;
    
    static $error21 = <<<Error21
<title>错误 - 工具箱/学园都市</title>
<h1>错误！</h1>
你输入的数值大于等于光速(299792458)！<br>
<a href="JavaScript:history.go(-1)">返回</a>
Error21;
    
    public function checkValue($value){ //检查用户输入值是否合法(error2)
        /*如果$value不是数组，则只检查单一数值*/
        if (is_array($value) == false){
            if ($value <= 0){
                return false;
            }else{
                return true;
            }
        }
        /*如果$value是数组，则循环数组*/
        $error = NULL; //声明一个空值的变量
        /*循环数组$value*/
        foreach ($value as $check) {
            /* 如果数组$value其中一个元素小于等于0，
             * 为$error赋1
             */ 
            if ($check <= 0){
                $error = 1;
            }
        }
        /* 检查$error是否等于0
         * 如果等于1，则说明用户输入了小于等于0的数字，返回false
         */
        if ($error == 1){
            return false;
        }else{
            return true;
        }
    }
    
    /**检查用户输入的数字是否小于光速(error21)
     * 使用方法:参数$value必须为数组
     */
    public function checkLightSpeed($value){
        $this -> checkMethodInputValueIsArray($value);
        $error = NULL; //声明一个空值的变量
        /*循环数组$value*/
        foreach ($value as $check) {
            /* 如果数组$value其中一个元素大于等于光速，
             * 为$error赋1
             */ 
            if ($check >= 299792458){
                $error = 1;
            }
        }
        
        /* 检查$error是否等于0
         * 如果等于1，则说明用户输入了大于光速的数字，返回false
         */
        if ($error == 1){
            return false;
        }else{
            return true;
        }
    }
}
