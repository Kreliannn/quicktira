<?php

require('Aglobal_file.php');

$title = $_POST['title'];
$price = $_POST['price'];
$address = $_POST['address'];
$description = $_POST['description'];
$location = $_POST['location'];
$room_count = $_POST['room_count'];
$bathroom_count = $_POST['bathroom_count'];
$sqr_meter = $_POST['sqr_meter'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

$image = $_FILES['image'];
$images = $_FILES['images'];

$success = false;

if($custom_func->checkEmpty([$title, $price, $description, $location, $room_count, $bathroom_count, $sqr_meter, $image, $images,$address, $latitude]))
{ 
    die(json_encode(['type' => 'error', 'text' => 'empty input, please fill out all field.']));
}
else if($custom_func->checkValidImg($image['type']))
{
    die(json_encode(['type' => 'error', 'text' => 'not valid image']));
}
else if($custom_func->checkValidMultipleImg($images['type']))
{
    die(json_encode(['type' => 'error', 'text' => 'not valid images']));
}
else if($price <= 0)
{
    die(json_encode(['type' => 'error', 'text' => 'price must be greater than 0']));
}
else if($sqr_meter <= 0)    
{
    die(json_encode(['type' => 'error', 'text' => 'sqr meter must be greater than 0']));
}
else if($room_count < 0)
{
    die(json_encode(['type' => 'error', 'text' => 'room count must be greater than or equal to 0']));
}
else if($bathroom_count < 0)
{
    die(json_encode(['type' => 'error', 'text' => 'bathroom count must be greater than or equal to 0']));
}
else
{
    $success = true;
}



if($success)
{
    $imageNames = $custom_func->uploadPropertyImageToFolderAndReturnName($image, $images);

    $createdAt = date('m/d/y');

    $query = "INSERT INTO post_property (landlord_id, post_title, post_images, post_price, post_description, post_location, room_count, bathroom_count, sqr_meters, post_created_at, address, post_status, latitude, longitude) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?,?,?)";
    $database->insert($query, [$_SESSION['user']['account_id'], $title, $imageNames[0], $price, $description, $location, $room_count, $bathroom_count, $sqr_meter, $createdAt, $address,"active", $latitude, $longitude]);

    $post = $database->get('select post_id from post_property where landlord_id = ? and post_title = ? and post_images = ? and post_price = ? and post_description = ? and post_location = ? and room_count = ? and bathroom_count = ? and sqr_meters = ?', [$_SESSION['user']['account_id'], $title, $imageNames[0], $price, $description, $location, $room_count, $bathroom_count, $sqr_meter], 'fetch');

    foreach($imageNames[1] as $imageName)
    {
        $database->insert('insert into property_post_pictures (post_id, image_name) values (?, ?)', [$post['post_id'], $imageName]);
    }
    

    die(json_encode(['type' => 'success', 'text' => 'Do you want to upload this post?']));
}