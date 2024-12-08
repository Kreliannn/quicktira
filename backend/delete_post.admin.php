<?php

require('Aglobal_file.php');

$property = $database->get("select * from post_property where post_id = ?", [$_POST['post_id']] , "fetch");

if($property['post_status'] == "banned" )
{
    $database->delete("update post_property set post_status = 'active' where post_id = ?", [$_POST['post_id']]);
}
else
{
    $database->delete("update post_property set post_status = 'banned' where post_id = ?", [$_POST['post_id']]);
}





echo "success";