<?php

require('Aglobal_file.php');

$apply_id = $_POST['apply_id'];

$database->delete("delete from tenant_applications where apply_id = ?", [$apply_id]);

echo "success";