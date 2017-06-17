﻿<?php
$judge1 = (is_numeric($_POST["gm1"]) and is_numeric($_POST["gm2"]) and is_numeric($_POST["gr"])); //判断"万有引力计算"的3个输入值是否都为数字
$judge2 = (is_numeric($_POST["sm"])); //判断"史瓦西半径计算"的一个输入量是否为数字
$judge3 = (is_numeric($_POST["rmm0"]) and is_numeric($_POST["rmv"])); //判断"相对论质量计算"的2个输入量是否都为数字

if($judge1){
	require_once "./resource/gravity.php"; //万有引力计算
}else if($judge2){ 
	require_once "./resource/schwarzschild.php"; //史瓦西半径计算
}else if($judge3){
	require_once "./resource/relativistic_mass.php"; //相对论质量计算
}else{
	require_once "../includes/gravity/return.php";
}