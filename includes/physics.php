<?php
class SchwarzschildObject{ //史瓦西半径计算
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
}