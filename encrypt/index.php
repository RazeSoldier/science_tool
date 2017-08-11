<?php
/* 
 * 处理enerypt/index.html传入的参数
 */
require_once '../includes/checkError.class.php';
require_once '../includes/enerypt/enerypt.class.php';

$type = filter_input(INPUT_POST, 'type'); //获取计算类型

if ($type == NULL){ //如果用户为未选择单选，终止脚本
    die (checkError::$error11);
}

$value = filter_input(INPUT_POST, $type); //获取用户输入的数值

$enerypt = new enerypt($type, $value);
$result = $enerypt -> Output();

$titletype = $enerypt -> getTitle(); //大写计算类型
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php
        echo "<title>{$titletype}函数计算结果 - 工具箱/学园都市</title>";
        ?>
    </head>
    <body>
        <?php
        echo <<<body
<h1>{$titletype}函数计算结果</h1>
<b>原文本</b><br>{$value}<hr/>
<b>计算结果</b><br>{$result}
body;
        ?>
    </body>
</html>
