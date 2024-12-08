<?php

require('Aglobal_file.php');

$post_id = $_POST['post_id'];
$tenant_fullname = $_POST['tenant_fullname'];
$contact_phone = $_POST['contact_phone'];
$contact_email = $_POST['contact_email'];
$num_occupants = $_POST['num_occupants'];
$move_in_date = $_POST['move_in_date'];
$tenant_id = $_POST['tenant_id'];
$landlord_id = $_POST['landlord_id'];

$query = "insert into taken_property(post_id, landlord_id, tenant_id, num_occupants, move_in_date) values (?, ?, ?, ?, ?)";

$database->insert($query, [$post_id, $landlord_id, $tenant_id, $num_occupants, $move_in_date]);

$database->update("update post_property set post_status = ? where post_id = ?",["inactive", $post_id]);
$database->update("update tenants set isRenting = ? where account_id = ?",["yes", $tenant_id]);

$database->delete("delete from tenant_applications where tenant_id = ?", [$tenant_id]);
$database->delete("delete from tenant_applications where post_id = ?", [$post_id]);

echo "success";