<?php
require_once "..\includes\physics.php";

$str = new PhysicsObject();
echo $str->time_dilation($_POST["tdt"],$_POST["tdv"]);