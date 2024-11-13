<?php

require('Aglobal_file.php');


$account_type = $_POST['account_type'];
$account_id = $_POST['account_id'];

$query;

switch($account_type)
{
    case "tenant":
        $query = "delete from tenants where account_id = ?";
    break;

    case "landlord":
        $query = "delete from landlords where account_id = ?";
    break;
}

$database->delete($query, [$account_id]);