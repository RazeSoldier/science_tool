<?php
require_once '../includes/checkError.class.php';

class checkPhysicsError extends checkError {
    static $error2 = <<<Error2
<title>错误 - 工具箱/学园都市</title>
<h1>错误！</h1>
你输入的数值小于等于0！<br>
<a href="JavaScript:history.go(-1)">返回</a>
Error2;
    
    public function checkValue($value){ //检查用户输入值是否合法(error2)
        if ($value > 0){
            return false;
        }else{
            return true;
        }
    }
}