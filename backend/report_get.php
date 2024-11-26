<?php 

require('Aglobal_file.php');

$reports = $database->get("select * from admin_report order by report_id desc", [], "fetchAll");

echo json_encode($reports);