<?php
require_once "..\includes\physics.php";

$str = new PhysicsObject();
echo $str->relativistic_momentum($_POST["rmm1"],$_POST["rmv1"]);