<?php

require_once('Aglobal_file.php');

$tenant_id = $_POST['tenant_id'];
$taken_property_id = $_POST['taken_property_id'];
$post_property_id = $_POST['post_property_id'];


$database->delete("delete from taken_property where property_id = ?", [$taken_property_id]);
$database->update("update tenants set isRenting = ? where account_id = ?", [ "no",$tenant_id]);
$database->update("update post_property set post_status = ? where post_id = ?", ["active", $post_property_id]);    

echo "success" ;
