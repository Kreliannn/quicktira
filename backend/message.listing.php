<?php

require('Aglobal_file.php');

$user_id = $_SESSION['user']['account_id'];
$landlord_id = $_POST['landlord_id'];

$convo = $database->get('select * from convo where tenant_id = ? && landlord_id = ?', [$user_id, $landlord_id], 'fetch');

if(empty($convo))
{
    $database->insert('insert into convo (tenant_id, landlord_id) values (?, ?)', [$user_id, $landlord_id]);
    $convo_id = $database->get('select convo_id from convo where tenant_id = ? && landlord_id = ?', [$user_id, $landlord_id], 'fetch');
    $_SESSION['convo_id'] = $convo_id['convo_id'];
}
else
{
    $_SESSION['convo_id'] = $convo['convo_id'];
}