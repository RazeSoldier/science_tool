<?php
/*本文件用于报错。当用户输入的数值小于等于0时，调用本文件
已被包含的文件:
/physics/resource/relativistic_mass.php
/physics/resource/gravity.php
/physics/resource/schwarzschild.php
*/
echo "
<title>错误 - 工具箱/学园都市</title>
您输入的数值包含了<b>非正数</b>数字</br>
请确保您输入的数字<b>大于0</b></br>
<a href=\"JavaScript:history.go(-1)\">返回</a>
";