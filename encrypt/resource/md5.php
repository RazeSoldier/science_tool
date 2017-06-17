<?php
$md5 = md5($_POST["md5"]);
echo "<title>MD5计算结果/学园都市</title>";
echo '原始文本:'.$_POST["md5"]."</br>";
echo '计算结果:'.$md5;