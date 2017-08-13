<?php
/**健康
 * checkError的子类
 */
require_once '../../includes/checkError.class.php';

class checkHealthError extends checkError{
    /*检查用户输入的数值是否大于0*/
    public function checkValue($value){
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
}
