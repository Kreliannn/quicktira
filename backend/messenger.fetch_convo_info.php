<?php

require('Aglobal_file.php');


$user = $_SESSION['user'];

$receiver_info;

switch($user['account_type'])
{
    case 'tenant':
        $query = 'select landlords.fullname, landlords.profile_picture   from convo join landlords on convo.landlord_id = landlords.account_id where convo_id = ?';
        $receiver_info = $database->get($query, [$_SESSION['convo_id']], 'fetch');
    break;

    case 'landlord':
        $query = 'select tenants.fullname, tenants.profile_picture from convo join tenants on convo.tenant_id = tenants.account_id where convo_id = ?';
        $receiver_info = $database->get($query, [$_SESSION['convo_id']], 'fetch');
    break;
}




echo json_encode($receiver_info);