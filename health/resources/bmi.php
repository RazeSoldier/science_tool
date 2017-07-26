<?php
$weight = filter_input(INPUT_POST,'weight');
$height = filter_input(INPUT_POST,'height');

require_once '../../includes/health/bmi.class.php';

$bml = new BMI($weight,$height);
$bml -> output();