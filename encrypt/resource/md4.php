<?php
$md4 = hash("md4",$_POST["md4"]);
echo "<title>MD4计算结果/学园都市</title>";
echo '原始文本:'.$_POST["md4"]."</br>";
echo '计算结果:'.$md4;