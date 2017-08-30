<?php
/**
 * 相对论动量
 */
require_once 'physics.class.php';
require_once 'checkPhysicsError.subclass.php';

class relativistic_momentum extends physics{
    private $in_m; //物体的质量
    private $in_v; //物体的速度
    
    public function __construct($in_m, $in_v) {
        $this -> in_m = $in_m;
        $this -> in_v = $in_v;
    }
    
    /**检查用户输入的内容
     * 先检查用户是否输入所有必要的数值,
     * 然后检查用户输入的值是否都为数字,
     * 最后检查用户输入的数字是否大于0
     */
    private function checkError(){
        $value = array(
            $this -> in_m,
            $this -> in_v,
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
        /*声明初始变量*/
	$c = parent::SPEED_OF_LIGHT; //声明光速(变量)
		
	$c2 = $c * $c; //计算光速平方
	$v2 = $this -> in_v * $this -> in_v; //计算物体速度的平方
	$y = $v2 / $c2; //计算(v^2/c^2)
	$down = sqrt(1 - $y); //计算√(1-(v^2/c^2))
        $up = $this -> in_v * $this -> in_m;
	$value = $up / $down;
		
	$lorentz_factor = 1 / $down; //计算洛伦兹因子
        
        return array(
            'value' => $value,
            'lorentz_factor' => $lorentz_factor
        );
    }
    
    final public function finalOutput(){
        $this -> checkError();
        
        $in = array(
            'm' => $this -> in_m,
            'v' => $this -> in_v
        );
        $output = parent::getOutput('relativistic_momentum', $in, $this -> getValue()['value'], $this -> getValue());
        echo $output;
    }
}
