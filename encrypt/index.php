<?php
/* 
 * 处理enerypt/index.html传入的参数
 */
global $gOutput;

$type = filter_input(INPUT_POST, 'type'); //获取计算类型

/*检查用户是否选定单选项(error11)*/
$checkerror = new checkEncryptError(); 
$checkerror->checkRadioValue($type);

$value = filter_input(INPUT_POST, $type); //获取用户输入的数值
$capitalOutput = filter_input(INPUT_POST, 'capital'); //获得是否大写输出文本的值

$enerypt = new encrypt($type, $value, $capitalOutput);
$space = $enerypt->checkSpace($value); //检查用户是否输入了文本或是否输入了空格
$result = $enerypt->Output();

$titletype = $enerypt->getTitle(); //大写计算类型

$content = <<<STR
<h1>{$titletype}函数计算结果</h1>
<b>原文本</b><br>{$value}{$space}<hr/>
<b>计算结果</b><br>{$result}
STR;
$title = "{$titletype}函数计算结果";
$gOutput->output($title, $content);