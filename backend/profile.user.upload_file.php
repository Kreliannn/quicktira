<?php 

require_once('Aglobal_file.php');

$file = $_FILES['fileUpload'];
$file_name = $file['name'];
$file_tmp = $file['tmp_name'];

$success = false;
$query;


switch($_SESSION['user']['account_type'])
{
    case 'tenant':
        $query = 'update tenants set profile_picture = ? where account_id = ?';
    break;

    case 'landlord':
        $query = 'update landlords set profile_picture = ? where account_id = ?';
    break;
}

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
    move_uploaded_file($file_tmp , '../frontend/image/profile_image/' . $new_file_name);
    $database->update($query, [$new_file_name, $_SESSION['user']['account_id']]);
    $database->update_session();
    die(json_encode(['type' => 'success', 'file_name' => $new_file_name]));
}
