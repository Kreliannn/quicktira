<?php

require('Aglobal_file.php');

$feedback_id = $_POST['message_id'];

$feedback = $database->get("select * from admin_feedback where message_id = ?", [$feedback_id], "fetchAll");

$database->update("update admin_feedback set message_type = ? where message_id = ?", ["read", $feedback_id]);

echo json_encode($feedback);