<?php


require('Aglobal_file.php');

$user = $_SESSION['user'];

$success = false;

$query;

switch($user['account_type'])
{
    case 'tenant':
        $query = [
            'select * from landlords where account_id = ?', 
            'select * from convo where tenant_id = ? && landlord_id = ?',
            'insert into convo (tenant_id, landlord_id) values (?, ?)'
        ];
    break;

    case 'landlord':
        $query = [
            'select * from tenants where account_id = ?', 
            'select * from convo where landlord_id = ? && tenant_id = ?',
            'insert into convo (landlord_id, tenant_id) values (?, ?)'
        ];
    break;
}


$search_id = $_POST['search_id'];

$search_user = $database->get($query[0], [$search_id], 'fetch');

if($custom_func->checkEmpty([$search_id]))
{
    die('empty');
}
else if(empty($search_user))
{
    die('user not  found');
}
else
{
    $success = true;
}


if($success)
{
    $convo = $database->get($query[1], [$user['account_id'], $search_user['account_id']], 'fetch');

    if(empty($convo))
    {
        $database->insert($query[2], [$user['account_id'], $search_user['account_id']]);
        echo 'insert database';
    }
    else
    {
        echo 'already added';
    }
}