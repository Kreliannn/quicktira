<?php
require_once('Aglobal_file.php');

if(empty($_SESSION['user']))
{
    header("location: error_page.php");
}







