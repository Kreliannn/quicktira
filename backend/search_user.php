<?php 

require_once('Aglobal_file.php');

$type = $_POST['type'];
$account_id = $_POST['account_id'];

$query = "select * from $type where account_id = ?";

$account = $database->get($query, [$account_id], "fetch");

if(!empty($account))
{
    echo json_encode(["type" => "success", "account" => $account]);
}
else
{
    echo json_encode(["type" => "error", "text" => "user not found"]);
}

