<?php 

require_once('Aglobal_file.php');

$landlord_id = $_POST['landlord_id'];
$landlord_name = $_POST['landlord_name'];


$file = $_FILES['verification_img'];
$file_name = $file['name'];
$file_tmp = $file['tmp_name'];

$success = false;
$query;


if($custom_func->checkValidImg($file['type']))
{
    die(json_encode(['type' => 'error', 'text' => 'ERROR : invalid file type.']));
}
else
{
    $success = true;
}


if($success)
{
    $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
    $new_file_name = uniqid() . '.' . $file_extension;
    move_uploaded_file($file_tmp , '../frontend/image/landlord_verification_image/' . $new_file_name);
    $query = "insert into landlord_verification(landlord_id, landlord_name, verification_image) values(?,?,?)";
    $database->insert($query, [$landlord_id, $landlord_name, $new_file_name]);
}

die(json_encode(['type' => 'success', 'text' => "request sent, please wait for admin aproval"]));