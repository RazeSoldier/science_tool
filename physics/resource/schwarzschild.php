<?php
/*声明变量*/
$gravitational_constant = 6.67408E-11; //万有引力常数
$m = $_POST["sm"]; //用户输入量"天体质量"
$c = 299792458; //光速

$c2= $c * $c; //计算光速的平方

$up = 2 * $m * $gravitational_constant; //计算2MG
$result = $up / $c2;

if($m <= 0){ //判断1个输入数值是否小于等于0
	require_once "../includes/gravity/error_2.php"; //如果ture，则返回错误信息"error_2.php"
}else{
echo "<title>史瓦西半径计算结果/学园都市</title>";
echo "<b>条件量</b></br>";
echo "天体质量:$m kg</br><hr/>";
echo "<b>计算结果</b>:$result m"; //输出结果
}