<?php
/*
 * 相对论质量
 */

class relativistic_mass extends physics{
    private $in_m; //物体的质量
    private $in_v; //物体的速度
    
    public function __construct($in_m, $in_v) {
        $this -> in_m = $in_m;
        $this -> in_v = $in_v;
    }
    
    /**检查用户输入的内容
     * 先检查用户是否输入所有必要的数值,
     * 之后检查用户输入的数字是否大于0,
     * 最后检查用户输入的数字是否小于光速
     */
    private function checkError(){
        $value = array(
	    $this -> in_m,
            $this -> in_v,
        );
        
        $check = new checkPhysicsError();
        $checknull = $check -> checkAllValueNotNull($value); //检查用户是否输入所有必要的数值
        if ($checknull == false){
            die ($check->return12());
        }
        
        $checkisnumber = $check -> checkIsNumber($value); //检查用户输入的值是否都为数字
        if ($checkisnumber == false){
            die ($check->return3());
        }
        
        $checkValue = $check -> checkValue($value);
        if ($checkValue == false){
            die ($check->return2()); //检查用户输入的数字是否大于0
        }
        
        $checkLightSpeed = $check -> checkLightSpeed(array($this->in_v));
        if ($checkLightSpeed == false){
            die ($check->return21()); //检查用户输入的数字是否小于光速
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
	$value = $this -> in_m / $down;
		
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
        $content = parent::getOutput('relativistic_mass', $in, $this -> getValue()['value'], $this -> getValue());
        global $gOutput;
	$gOutput->output('相对论质量计算', $content);
    }
}
