<?php

require('Aglobal_file.php');

$database->delete("delete from post_property where post_id = ?", [$_POST['post_id']]);

echo "success";