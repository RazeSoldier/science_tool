<?php
require_once "..\includes\physics.php";

$str = new SchwarzschildObject();
echo $str->schwarzschild($_POST["sm"]);