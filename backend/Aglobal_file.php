<?php

require('class/database.php');
require('class/custom_function.php');

$database = new Database();
$custom_func = new CustomFunction();

session_start();    