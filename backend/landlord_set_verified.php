<?php
require_once('Aglobal_file.php');


$landlord_id = $_POST['landlord_id'];
$request_id = $_POST['request_id'];

$database->update("update landlords set isRenting = 'yes' where account_id = ?", [$landlord_id]);

$database->delete("delete from landlord_verification where verification_id = ?", [$request_id]);

echo $request_id;