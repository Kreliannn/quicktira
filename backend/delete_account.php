<?php

require('Aglobal_file.php');


$account_type = $_POST['account_type'];
$account_id = $_POST['account_id'];
$account_status = $_POST['account_status'];


$query;



switch($account_type)
{
    case "tenant":
        if($account_status == "banned")
        {
            $query = "update tenants  set account_status = 'active' where account_id = ?";
        }
        else
        {
            $query = "update tenants  set account_status = 'banned' where account_id = ?";
        }
    break;

    case "landlord":
        if($account_status == "banned")
        {
            $query = "update landlords  set account_status = 'active' where account_id = ?";
        }
        else
        {
            $query = "update landlords  set account_status = 'banned' where account_id = ?";
        }
    break;
}

$database->delete($query, [$account_id]);

echo "<script> window.history.back() </script>";