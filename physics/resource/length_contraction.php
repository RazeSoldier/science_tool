<?php
require_once "..\includes\physics.php";

$str = new PhysicsObject();
echo $str->length_contraction($_POST["lcs"],$_POST["lcv"]);