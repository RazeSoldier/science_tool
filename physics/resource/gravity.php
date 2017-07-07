<?php
require_once "..\includes\physics.php";

$str = new PhysicsObject();
echo $str->gravity($_POST["gm1"],$_POST["gm2"],$_POST["gr"]);