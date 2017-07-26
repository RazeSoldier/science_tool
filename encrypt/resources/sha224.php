<?php
$sha224 = hash("sha224",$_POST["sha224"]);
echo "<title>SHA-224计算结果/学园都市</title>";
echo '原始文本:'.$_POST["sha224"]."</br>";
echo '计算结果:'.$sha224;