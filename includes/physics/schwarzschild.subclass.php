<?php
/* 
 * 史瓦西计算
 */
require_once 'physics.class.php';
require_once 'checkPhysicsError.subclass.php';

class schwarzschild extends physics{
    private $in_sm; //声明质量(用户输入值)
    
    public function __construct($in_sm) {
        $this -> in_sm = $in_sm;
    }
    
    private function checkError(){
        $check = new checkPhysicsError();
        $checkNull = $check -> checkNullValue($this -> in_sm);
        $checkValue = $check -> checkValue($this -> in_sm);
        
        if ($checkNull == false){
            die (checkPhysicsError::$error10);
        }
        if ($checkValue == false){
            die (checkPhysicsError::$error2);
        }
    }

    /*得出结果*/
    private function getValue(){
        /*声明常量*/
        $c = parent::SPEED_OF_LIGHT; //光速
        $gc = parent::GRAVITATIONAL_CONSTANT; //万有引力常数
        
        $c2 = $c * $c; //计算光速平方
	$up = 2 * $this -> in_sm * $gc; //计算2MG
	$result = $up / $c2; //计算$up/c^2(结果)
        
        return $result;
    }
    
    final public function Output(){
        $this -> checkError();
        
        $output = parent::getOutput('schwarzschild', $this -> in_sm, $this -> getValue());
        echo $output;
    }
}