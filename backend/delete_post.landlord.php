<?php

require('Aglobal_file.php');

$database->delete("update post_property set post_status = 'remove' where post_id = ?", [$_POST['post_id']]);

echo "success";