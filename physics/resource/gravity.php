<?php
/*声明变量*/
$gravitational_constant = 6.67408E-11; //万有引力常数
$m1 = $_POST["gm1"];
$m2 = $_POST["gm2"];
$r = $_POST["gr"];

$m12 = $m1 * $m2;
$gm = $gravitational_constant * $m12;
$result = $gm / ($r * $r);

echo "<title>万有引力计算结果/学园都市</title>";
echo "<b>条件量</b></br>";
echo "一个物体的质量:$m1 kg</br>";
echo "另一个物体的质量:$m2 kg</br>";
echo "两物体之间的距离:$r m</br>";
echo "<hr/><b>计算结果</b>:$result N";