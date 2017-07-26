<?php
$sha256 = hash("sha256",$_POST["sha256"]);
echo "<title>SHA-256计算结果/学园都市</title>";
echo '原始文本:'.$_POST["sha256"]."</br>";
echo '计算结果:'.$sha256;