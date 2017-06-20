<?php
/*声明变量*/
$c = 299792458; //光速
$t = $_POST["tdt"]; //用户输入量"物体的原时"
$v = $_POST["tdv"]; //用户输入量"物体的速度"

$c2 = $c * $c; //计算光速的平方

$v2 = $v * $v; //计算物体速度的平方

$y = $v2 / $c2; //计算(v^2/c^2)
$down = sqrt(1 - $y); //计算√(1-(v^2/c^2))
$result = $t / $down;

$lorentz_factor = 1 / $down; //计算洛伦兹因子

if($v >= $c){ //判断"物体速度"是否大于等于光速
	require_once "../includes/gravity/error_1.php"; //如果ture，则返回错误信息"error_1.php"
}else if(($t <= 0) or ($v <= 0)){ //判断2个输入值是否有小于等于0的数值
	require_once "../includes/gravity/error_2.php"; //如果ture，则返回错误信息"error_2.php"
}else{ 
echo "<title>相对论质量计算结果/学园都市</title>";
echo "<b>条件量</b></br>";
echo "物体的原时:$t s</br>";
echo "物体的速度:$v m·s<sup>-1</sup></br>";
echo "<hr/>洛伦兹因子:$lorentz_factor</br><b>计算结果</b>:$result s"; //输出结果
}