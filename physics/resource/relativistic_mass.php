<?php
require_once "..\includes\physics.php";

$str = new PhysicsObject();
echo $str->relativistic_mass($_POST["rmm0"],$_POST["rmv"]);