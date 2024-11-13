<?php

require('Aglobal_file.php');

$feedbacks = $database->get("select * from admin_feedback", [], "fetchAll");

echo json_encode($feedbacks);