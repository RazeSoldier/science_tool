<?php
$md2 = hash("md2",$_POST["md2"]);
echo "<title>MD2计算结果/学园都市</title>";
echo '原始文本:'.$_POST["md2"]."</br>";
echo '计算结果:'.$md2;