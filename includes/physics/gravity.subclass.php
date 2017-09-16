<?php
/*
 * 万有引力计算
 */

class gravity extends physics{
    private $in_m1;
    private $in_m2;
    private $in_r;

    public function __construct($in_m1, $in_m2, $in_r) {
        $this -> in_m1 = $in_m1;
        $this -> in_m2 = $in_m2;
        $this -> in_r = $in_r;
    }
    
    /**检查用户输入的内容
     * 先检查用户是否输入所有必要的数值,
     * 然后检查用户输入的值是否都为数字,
     * 最后检查用户输入的数字是否大于0
     */
    private function checkError(){
        $value = array(
            $this -> in_m1,
            $this -> in_m2,
            $this -> in_r
        );
        
        $check = new checkPhysicsError();
        $checknull = $check -> checkAllValueNotNull($value); //检查用户是否输入所有必要的数值
        if ($checknull == false){
            die (checkPhysicsError::$error12);
        }
        
        $checkisnumber = $check -> checkIsNumber($value); //检查用户输入的值是否都为数字
        if ($checkisnumber == false){
            die (checkPhysicsError::$error3);
        }
        
        $checkValue = $check -> checkValue($value);
        if ($checkValue == false){
            die (checkPhysicsError::$error2); //检查用户输入的数字是否大于0
        }
    }
    
    /*得出结果*/
    private function getValue(){
        /*声明常量*/
        $gc = parent::GRAVITATIONAL_CONSTANT; //万有引力常数
        
        $m12 = $this -> in_m1 * $this -> in_m2;
        $gm = $gc * $m12;
        $result = $gm / ($this -> in_r * $this -> in_r);
        
        return $result;
    }
    
    final public function finalOutput(){
        $this -> checkError();
        
        $in = array(
            'm1' => $this -> in_m1,
            'm2' => $this -> in_m2,
            'r' => $this -> in_r
        );
        $output = parent::getOutput('gravity', $in, $this -> getValue());
        echo $output;
    }
}
