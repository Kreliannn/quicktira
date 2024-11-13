<?php

require('Aglobal_file.php');

$fullname = $_POST['fullname'];
$message = $_POST['message'];
$email = $_POST['email'];

if($custom_func->checkEmpty([$fullname, $message, $email ]))
{
    die(json_encode(['type' => 'error', 'text' => 'empty input, Please fill out all field.']));
}

$query = "insert into admin_feedback(message, sender_fullname, sender_email) values (?,?,?)";
$database->insert($query, [$message, $fullname,  $email ]);

echo(json_encode(['type' => 'success', 'text' => 'message sent succesfully']));