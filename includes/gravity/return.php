<?php
/*本文件用于报错。当用户输入的数值为非数字内容时，调用本文件
已被包含的文件:
./physics/result.php
*/
echo "<title>错误 - 工具箱/学园都市</title>";
echo "您有未输入的<b>前提量</b>，或者您输入的数值中含有<b>非数字内容</b></br>";
echo '请检查您是否输入<b>所有</b>的前提量并确保输入值为<b>数字</b>';
echo "</br><a href=\"JavaScript:history.go(-1)\">返回</a>";