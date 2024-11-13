<?php

require('Aglobal_file.php');

$report_id = $_POST['report_id'];

$report = $database->get("select * from admin_report where report_id = ?", [$report_id], "fetchAll");

$database->update("update admin_feedback set message_type = ? where message_id = ?", ["read", $report_id]);

echo json_encode($report);