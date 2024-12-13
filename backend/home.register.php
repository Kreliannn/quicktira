<?php

require('Aglobal_file.php');

$success = false;

$firstname =  $_POST['firstname'];
$lastname =  $_POST['lastname'];
$email =  $_POST['email'];
$type =  $_POST['type'];
$contact =  $_POST['contact'];
$username =  $_POST['username'];
$password =  $_POST['password'];


if($custom_func->checkEmpty([$firstname, $lastname, $email, $type, $contact, $username, $password]))
{
    die(json_encode(['type' => 'error', 'text' => 'Empty input. Please fill out all field.']));
}
if($username == "admin")
{
    die(json_encode(['type' => 'error', 'text' => 'Username is not available']));
}
else if($_POST['terms_condition'] !== 'true')
{
    die(json_encode(['type' => 'error', 'text' => 'Read the Terms and Conditions.']));
}
else if($custom_func->checkValidEmail($email))
{
    die(json_encode(['type' => 'error', 'text' => 'Invalid email address.']));
}
else if($database->get('select * from tenants where username = ? UNION select * from landlords where username = ?', [$username, $username], "fetch"))
{
    die(json_encode(['type' => 'error', 'text' => 'Username already exists.']));
}
else if($database->get('select * from tenants where email = ? UNION select * from landlords where email = ?', [$email, $email], "fetch"))
{
    die(json_encode(['type' => 'error', 'text' => 'Email address already taken.']));
}
else if(strlen($contact) != 11) 
{
    die(json_encode(['type' => 'error', 'text' => 'Invalid contact number.']));
}
else if(strlen($password) < 8) 
{
    die(json_encode(['type' => 'error', 'text' => 'Invalid password, atleast 8 characters and above.']));
}
else
{
    $success = true;
    $fullname = $firstname . " " . $lastname;
}


if($success)
{
    $query;
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    switch($type)
    {
        case "tenant":
            $query = "insert into tenants (fullname, email, username, password, contact, account_type, profile_picture, isRenting, account_status) values (?,?,?,?,?,?,?,?, ?)";
            $database->insert($query, [$fullname, $email, $username, $hashedPassword, $contact, $type, "DEFAULT_PROFILE.png", "no", "active"]);
        break;

        case "landlord":
            $query = "insert into landlords (fullname, email, username, password, contact, account_type, profile_picture, isRenting, account_status) values (?,?,?,?,?,?,?,?, ?)";
            $database->insert($query, [$fullname, $email, $username, $hashedPassword, $contact, $type, "DEFAULT_PROFILE.png",  "no", "active"]);
            break;
    }
    
    
    die(json_encode(['type' => 'success', 'text' => 'Account created.']));
}