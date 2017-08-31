<?php
/* 
 * 处理enerypt/index.html传入的参数
 */
require_once INCLUDES_PATH.'encrypt/checkEncryptError.subclass.php';
require_once INCLUDES_PATH.'encrypt/encrypt.class.php';

$type = filter_input(INPUT_POST, 'type'); //获取计算类型

/*检查用户是否选定单选项(error11)*/
$checkerror = new checkEneryptError(); 
$checkerror -> checkRadioValue($type);

$value = filter_input(INPUT_POST, $type); //获取用户输入的数值

$enerypt = new enerypt($type, $value);
$space = $enerypt -> checkSpace($value); //检查用户是否输入了文本或是否输入了空格
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
<b>原文本</b><br>{$value}{$space}<hr/>
<b>计算结果</b><br>{$result}
body;
        ?>
    </body>
</html>
