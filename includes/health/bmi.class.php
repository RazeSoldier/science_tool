<?php
/* 计算BMI
 * 
 */

class BMI {
    public $m ; //身高
    public $h ; //体重
    public $arr; //$m与$h的数组

    public function __construct($weight,$height){ //获取外部数据
        $this -> m = $weight;
        $this -> h = (integer)$height / 100;
        $this -> arr = array(
            1 => $this -> m,
            2 => $height
        );
    }
	
	private function checkError(){
		$check = new checkHealthError();
		
		$checkallvalue = $check -> checkAllValueNotNull($this -> arr);
		if ($checkallvalue == false){
			die ($check->return12());
		}
		
		$checknumber = $check -> checkIsNumber($this -> arr);
		if ($checknumber == false){
			die ($check->return3());
		}
		
		$checkvalue = $check -> checkvalue($this -> arr);
		if ($checkvalue == false){
			die ($check->return2());
		}
	}

    private function getValue(){ //计算
        $h2 = pow($this -> h,2);
        $result = round(($this -> m / $h2),2); //四舍五入后保留2位小数
        return $result;
    }
    
    private function getHealthStatus(){ //根据BMI数值判断健康状况
        $value = $this -> getValue();
        if ($value < 18.5){
            return '体重过低 (<18.5)';
        }elseif ($value >= 18.5 and $value < 24){
            return '体重正常 (18.5-24)';
        }elseif ($value >= 24 and $value < 28){
            return '超重 (24-28)';
        }elseif ($value >= 28){
            return '肥胖 (>28)';
        }
    }

    final public function output(){ //最终输出
	$this -> checkError();
	$content = '你的BMI为:'.$this -> getValue().' kg/m<sup>2</sup><br>健康状况:'.$this ->getHealthStatus();
	global $gOutput;
	$gOutput->output('BMI计算结果', $content);
    }
}