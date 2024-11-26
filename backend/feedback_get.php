<?php

require('Aglobal_file.php');

$feedbacks = $database->get("select * from admin_feedback order by message_id desc", [], "fetchAll");

echo json_encode($feedbacks);