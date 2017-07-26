<?php
require_once "..\includes\physics.php";

$str = new PhysicsObject();
echo $str->schwarzschild($_POST["sm"]);