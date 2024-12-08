<?php
require_once('Aglobal_file.php');

$tenant_fullname = $_POST['tenant_fullname'];
$contact_phone = $_POST['contact_phone'];
$contact_email = $_POST['contact_email'];
$num_occupants = $_POST['num_occupants'];
$move_in_date = $_POST['move_in_date'];
$employment_work = $_POST['employment_work'];
$post_id = $_POST['post_id'];
$landlord_id = $_POST['landlord_id'];
$tenant_id = $_POST['tenant_id'];



if($custom_func->checkEmpty([$move_in_date] ))
{
    die("empty");
}
else if(strtotime($move_in_date) < strtotime(date('Y-m-d')))
{
    die("invalid date");
}



$query = "INSERT INTO tenant_applications (post_id, landlord_id, tenant_id, tenant_fullname, contact_phone, contact_email, num_occupants, move_in_date, employment_work) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$database->insert($query, [$post_id, $landlord_id, $tenant_id, $tenant_fullname, $contact_phone, $contact_email, $num_occupants, $move_in_date, $employment_work]);

echo "success";