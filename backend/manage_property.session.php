<?php

require('Aglobal_file.php');

$id = $_POST['property_id'];

$_SESSION['manage_property_id'] = $id;

$check = $database->get("select post_status from post_property where post_id =?", [$id], "fetch");

$status = $check['post_status'];

echo $status;