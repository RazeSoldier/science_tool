<?php
$sha512 = hash("sha512",$_POST["sha512"]);
echo "<title>SHA-512计算结果/学园都市</title>";
echo '原始文本:'.$_POST["sha512"]."</br>";
echo '计算结果:'."</br>";
echo "$sha512";