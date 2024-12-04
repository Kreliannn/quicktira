<?php
require_once('Aglobal_file.php');

$request_id = $_POST['request_id'];


$database->delete("delete from landlord_verification where verification_id = ?", [$request_id]);

echo $request_id;