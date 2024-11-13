<?php 

require('Aglobal_file.php');

$reports = $database->get("select * from admin_report", [], "fetchAll");

echo json_encode($reports);