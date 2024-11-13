<?php

require_once('Aglobal_file.php');

$report_account_id = $_POST['report_account_id'];
$report_account_fullname = $_POST['report_account_fullname'];
$post_id = $_POST['post_id'];
$report_message = $_POST['report_message'];
$report_reason = $_POST['report_reason'];
$sender_fullname = $_POST['sender_fullname'];

$query = "insert into admin_report(report_account_id, report_account_fullname, post_id, report_message, report_reason, sender_fullname, report_type) values (?,?,?,?,?,?,?)";
$database->insert($query, [$report_account_id, $report_account_fullname, $post_id, $report_message, $report_reason, $sender_fullname, "unread"]);
echo "success";