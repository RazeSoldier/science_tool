﻿<?php
class  PhysicsObject{ //物理计算
    /*声明常量*/
    const SPEED_OF_LIGHT = 299792458; //声明光速(常量)
    const GRAVITATIONAL_CONSTANT = 6.67408E-11; //声明万有引力常数(常量)
	
    /*声明错误信息(变量)*/
    public $error1 = "<title>错误 - 工具箱/学园都市</title>您所输入的速度值<b>大于等于</b>光速(299792458 m·s<sup>-1</sup>)</br>
    请确保您输入的速度值小于光速</br>
    <a href=\"JavaScript:history.go(-1)\">返回</a>";
    public $error2 = "<title>错误 - 工具箱/学园都市</title>您输入的数值包含了<b>非正数</b>数字</br>
    请确保您输入的数字<b>大于0</b></br>
    <a href=\"JavaScript:history.go(-1)\">返回</a>
    ";
        
        public function length_contraction($s,$v){ //计算长度收缩
            /*声明初始变量*/
	    $c = self::SPEED_OF_LIGHT; //声明光速(变量)
            
            $c2 = $c * $c; //计算光速平方
	    $v2 = $v * $v; //计算物体速度的平方
	    $y = $v2 / $c2; //计算(v^2/c^2)
            $down = sqrt(1 - $y); //计算√(1-(v^2/c^2))
	    $result = $s / $down;
            
            $lorentz_factor = 1 / $down; //计算洛伦兹因子
            
            /*输出变量*/
            $output = "<title>长度收缩计算结果/学园都市</title>"
                    . "<b>条件量</b></br>"
                    . "物体运动方向的长度:$s m</br>"
                    . "物体的速度:$v m·s<sup>-1</sup></br>"
                    . "<hr/>洛伦兹因子:$lorentz_factor</br><b>计算结果</b>:$result m
                    ";
            
            if($v >= $c){ ////判断"物体速度"是否大于等于光速
		    return $this->error1; //如果ture，则返回错误信息"$error1"
			}else if(($s <= 0) or ($v <= 0)){ //判断2个输入值是否有小于等于0的数值
			return $this->error2; //如果ture，则返回错误信息"$error2"
			}else{ 
			return $output;
			}
        }
        
        public function relativistic_momentum($m,$v){ //计算相对论动量
            /*声明初始变量*/
	        $c = self::SPEED_OF_LIGHT; //声明光速(变量)
            
            $c2 = $c * $c; //计算光速平方
	        $v2 = $v * $v; //计算物体速度的平方
	        $y = $v2 / $c2; //计算(v^2/c^2)
            $down = sqrt(1 - $y); //计算√(1-(v^2/c^2))
            $up = $m * $v; //计算vm0
	        $result = $up / $down;
            
            $lorentz_factor = 1 / $down; //计算洛伦兹因子
            
            /*输出变量*/
	        $output = "<title>相对论动量计算结果/学园都市</title>
                <b>条件量</b></br>
                物体的质量:$m kg</br>
                物体的速度:$v m·s<sup>-1</sup></br>
                <hr/>洛伦兹因子:$lorentz_factor</br><b>计算结果</b>:$result kg·m/s";
            
            if($v >= $c){ ////判断"物体速度"是否大于等于光速
		    return $this->error1; //如果ture，则返回错误信息"$error1"
			}else if(($m <= 0) or ($v <= 0)){ //判断2个输入值是否有小于等于0的数值
			return $this->error2; //如果ture，则返回错误信息"$error2"
			}else{ 
			return $output;
			}
        }
	
	public function time_dilation($t,$v){ //计算时间膨胀
		/*声明初始变量*/
		$c = self::SPEED_OF_LIGHT; //声明光速(变量)
		
		$c2 = $c * $c; //计算光速平方
		$v2 = $v * $v; //计算物体速度的平方
		$y = $v2 / $c2; //计算(v^2/c^2)
		$down = sqrt(1 - $y); //计算√(1-(v^2/c^2))
		$result = $t / $down;
		
		$lorentz_factor = 1 / $down; //计算洛伦兹因子
		
		/*输出变量*/
		$output = "<title>时间膨胀计算结果/学园都市</title><b>条件量</b></br>
		物体的原时:$t s</br>
		物体的速度:$v m·s<sup>-1</sup></br><hr/>洛伦兹因子:$lorentz_factor</br><b>计算结果</b>:$result s
		";
		
		if($v >= $c){ ////判断"物体速度"是否大于等于光速
		    return $this->error1; //如果ture，则返回错误信息"$error2"
			}else if(($t <= 0) or ($v <= 0)){ //判断2个输入值是否有小于等于0的数值
			return $this->error2; //如果ture，则返回错误信息"$error2"
			}else{ 
			return $output;
			}
	}
}