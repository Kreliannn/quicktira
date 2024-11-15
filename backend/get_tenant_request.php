<?php

require('Aglobal_file.php');

$data = $database->get("select * from tenant_applications where apply_id = ?", [$_POST['request_id']], "fetch");

echo json_encode($data) ;