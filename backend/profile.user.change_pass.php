<?php 

require('Aglobal_file.php');

$user = $_SESSION['user'];

$current_username = $_POST['current_username'];
$current_password = $_POST['current_password'];

$new_username = $_POST['new_username'];
$new_password = $_POST['new_password'];



if($custom_func->checkEmpty([$current_username, $current_password, $new_username, $new_password]))
{
    die(json_encode(['type' => 'error', 'text' => 'empty input, please fill out all field.']));  
}
else if($current_username != $user['username'] || !password_verify($current_password, $user['password']))
{
    die(json_encode(['type' => 'error', 'text' => 'incorrect username or password.']));
}
else
{
   $success = true;
}

if($success)
{   
    $query;
    switch($user["account_type"])
    {
        case "tenant":
            $query = 'update tenants set username = ?, password = ? where account_id = ?';
        break;

        case "landlord":
            $query = 'update landlords set username = ?, password = ? where account_id = ?';
        break;
    }
    
    $database->update($query, [$new_username,  password_hash($new_password, PASSWORD_DEFAULT), $user['account_id']] );
    $database->update_session();
    die(json_encode(['type' => 'success', 'text' => 'username and password changed.']));
}