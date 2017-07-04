<?php
class  PhysicsObject{ //史瓦西半径计算
	public function schwarzschild($m){
		/*声明初始变量*/
		$c = 299792458; //声明光速(变量)
		$gc = 6.67408E-11; //声明万有引力常数(变量)
		
		$c2 = $c * $c; //计算光速平方
		$up = 2 * $m * $gc; //计算2MG
		$result = $up / $c2; //计算$up/c^2
		
		/*输出变量*/
		$output = "
		<title>史瓦西半径计算结果/学园都市</title>
		<b>条件量</b></br>
		天体质量:$m kg</br><hr/>
		<b>计算结果</b>:$result m
		";

		if($m <= 0){ //判断1个输入数值是否小于等于0
			return require_once "../includes/gravity/error_2.php"; //如果ture，则返回错误信息"error_2.php"
		}else{
			return $output; //输出结果
		}
	}
	
	public function time_dilation($t,$v){
		/*声明初始变量*/
		$c = 299792458; //声明光速(变量)
		
		$c2 = $c * $c; //计算光速平方
		$v2 = $v * $v; //计算物体速度的平方
		$y = $v2 / $c2; //计算(v^2/c^2)
		$down = sqrt(1 - $y); //计算√(1-(v^2/c^2))
		$result = $t / $down;
		
		$lorentz_factor = 1 / $down; //计算洛伦兹因子
		
		/*输出变量*/
		$output = "
		<title>相对论质量计算结果/学园都市</title>
		<b>条件量</b></br>
		物体的原时:$t s</br>
		物体的速度:$v m·s<sup>-1</sup></br><hr/>洛伦兹因子:$lorentz_factor</br><b>计算结果</b>:$result s
		";
		
		if($v >= $c){ ////判断"物体速度"是否大于等于光速
		    return require_once "../includes/gravity/error_1.php"; //如果ture，则返回错误信息"error_1.php"
			}else if(($t <= 0) or ($v <= 0)){ //判断2个输入值是否有小于等于0的数值
			return require_once "../includes/gravity/error_2.php"; //如果ture，则返回错误信息"error_2.php"
			}else{ 
			return $output;
			}
	}
}