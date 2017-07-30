<?php
$type = filter_input(INPUT_POST,'type'); //计算类型(FtoW,WtoF)
$frequency = filter_input(INPUT_POST,'frequency'); //频率
$wavelength = filter_input(INPUT_POST,'wavelength'); //波长

require_once "..\..\includes\physics\conversion.class.php";

$p = new Conversion($type,$frequency,$wavelength);
$p -> finalOutput();