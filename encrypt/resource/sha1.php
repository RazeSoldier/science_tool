<?php
$sha1 = sha1($_POST["sha1"]);
echo "<title>SHA-1计算结果/学园都市</title>";
echo '原始文本:'.$_POST["sha1"]."</br>";
echo '计算结果:'.$sha1;