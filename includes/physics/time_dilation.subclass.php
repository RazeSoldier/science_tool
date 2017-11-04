<?php
/* 
 * 时间膨胀计算
 */

class time_dilation extends physics{
    private $in_t;
    private $in_v;

    public function __construct($in_t, $in_v) {
        $this -> in_t = $in_t;
        $this -> in_v = $in_v;
    }
    
    /**检查用户输入的内容
     * 先检查用户是否输入所有必要的数值,
     * 然后检查用户输入的值是否都为数字,
     * 之后检查用户输入的数字是否大于0,
     * 最后检查用户输入的数字是否小于光速
     */
    private function checkError(){
        $value = array(
            $this -> in_t,
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
            die ($check->return3()); //检查用户输入的数字是否大于0
        }
        
        $checkLightSpeed = $check -> checkLightSpeed(array($this -> in_v));
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
	$value = $this -> in_t / $down;
		
	$lorentz_factor = 1 / $down; //计算洛伦兹因子
        
        return array(
            'value' => $value,
            'lorentz_factor' => $lorentz_factor
        );
    }
    
    final public function finalOutput(){
        $this -> checkError();
        
        $in = array(
            't' => $this -> in_t,
            'v' => $this -> in_v
        );
        $content = parent::getOutput('time_dilation', $in, $this -> getValue()['value'], $this -> getValue());
        global $gOutput;
	$gOutput->output('时间膨胀计算', $content);
    }
    
}
