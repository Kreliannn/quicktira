<?php

require('Aglobal_file.php');

$username = $_POST['username'];
$password = $_POST['password'];

$success = false;

$tenant = $database->get('select * from tenants where username = ? ', [$username], 'fetch');
$landlord = $database->get('select * from landlords where username = ? ', [$username], 'fetch');


if($custom_func->checkEmpty([$username, $password]))
{
    die('empty input, Please fill out all field.');
}
else if($username == "admin" && $password == "123")
{
    $_SESSION['user'] = "admin";
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
        if(!password_verify($password, $tenant['password']))
        {
            die("Incorrect password");
        }

        if($tenant['account_status'] == "banned")
        {
            die('Your account is banned. Please contact the admin if it was a mistake');
        }

        $_SESSION['user'] = $tenant;
        die('success');
    }
    else if($landlord)
    {   
        if($landlord['account_status'] == "banned")
        {
            die('your account is banned.');
        }

        $_SESSION['user'] = $landlord;
        die('success');
    }
}
