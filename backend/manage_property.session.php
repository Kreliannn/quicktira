<?php

require('Aglobal_file.php');

$id = $_POST['property_id'];

$_SESSION['manage_property_id'] = $id;
echo "sucess";