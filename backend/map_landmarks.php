<?php

require('Aglobal_file.php');

$property_data = $database->get('select post_id, latitude, longitude from post_property', [], 'fetchAll');

echo json_encode($property_data);