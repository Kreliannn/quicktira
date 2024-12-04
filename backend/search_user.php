<?php 

require_once('Aglobal_file.php');

$type = $_POST['type'];
$username = $_POST['username'];

$query = "select * from $type where username = ?";

$account = $database->get($query, [$username], "fetch");

if(!empty($account))
{
    echo json_encode(["type" => "success", "account" => $account]);
}
else
{
    echo json_encode(["type" => "error", "text" => "user not found"]);
}

