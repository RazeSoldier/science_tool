<?php
$sha384 = hash("sha384",$_POST["sha384"]);
echo "<title>SHA-384计算结果/学园都市</title>";
echo '原始文本:'.$_POST["sha384"]."</br>";
echo '计算结果:'.$sha384;