<?php
$type = filter_input(INPUT_POST,'type'); //计算类型(FtoW,WtoF)
$frequency = filter_input(INPUT_POST,'frequency'); //频率
$wavelength = filter_input(INPUT_POST,'wavelength'); //波长
$unit = filter_input(INPUT_POST,'unit'); //(知波长求频率)波长输入值的单位

require_once "..\..\includes\physics\conversion.class.php";

$p = new Conversion($type,$frequency,$wavelength,$unit);
$p -> finalOutput();