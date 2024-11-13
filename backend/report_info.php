<?php

require('Aglobal_file.php');

$report_id = $_POST['report_id'];

$report = $database->get("select * from admin_report where report_id = ?", [$report_id], "fetchAll");

$database->update("update admin_report set report_type = ? where report_id = ?", ["read", $report_id]);

echo json_encode($report);