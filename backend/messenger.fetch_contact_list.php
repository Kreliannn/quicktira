<?php

require('Aglobal_file.php');


$user = $_SESSION['user'];

$convo_list;

switch($user['account_type'])
{
    case 'tenant':
        $query = 'select convo.convo_id, landlords.fullname, landlords.profile_picture   from convo join landlords on convo.landlord_id = landlords.account_id where convo.tenant_id = ?';
        $convo_list = $database->get($query, [$user['account_id']], 'fetchAll');
    break;

    case 'landlord':
        $query = 'select convo.convo_id, tenants.fullname, tenants.profile_picture from convo join tenants on convo.tenant_id = tenants.account_id where landlord_id = ?';
        $convo_list = $database->get($query, [$user['account_id']], 'fetchAll');
    break;
}




echo json_encode($convo_list);
