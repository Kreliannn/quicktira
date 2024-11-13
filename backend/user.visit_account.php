<?php

require_once ('Aglobal_file.php');

$visit_account_id = $_POST['visit_account_id'];

$_SESSION['visit_account_id'] = $visit_account_id;

switch ($_POST['account_type'])
{
    case 'landlord':
        echo 'user.visit_profile.landlord.php';
    break;

    case 'tenant':
        echo 'user.visit_profile.tenant.php';
    break;
}

