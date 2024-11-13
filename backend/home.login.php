<?php

require('Aglobal_file.php');

$username = $_POST['username'];
$password = $_POST['password'];

$success = false;

$tenant = $database->get('select * from tenants where username = ? && password = ?', [$username, $password], 'fetch');
$landlord = $database->get('select * from landlords where username = ? && password = ?', [$username, $password], 'fetch');

if($custom_func->checkEmpty([$username, $password]))
{
    die('empty input, Please fill out all field.');
}
else if($username == "admin" && $password == "123")
{
    die("admin");
}
else if(empty($tenant) && empty($landlord))
{
    die('User does not exist...');
}
else
{
    $success = true;
}


if($success)
{
    if($tenant)
    {
        $_SESSION['user'] = $tenant;
        die('success');
    }
    else if($landlord)
    {
        $_SESSION['user'] = $landlord;
        die('success');
    }
}
