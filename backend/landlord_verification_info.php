<?php
require_once('Aglobal_file.php');


$id = $_POST['id'];

$data_info = $database->get("select * from landlord_verification where verification_id = ?", [$id], "fetch");

echo json_encode($data_info);