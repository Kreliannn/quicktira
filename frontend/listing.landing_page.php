<?php
require_once ('../backend/Aglobal_file.php');

$property_data = $database->get('select * from post_property join landlords on post_property.landlord_id = landlords.account_id where post_status = "active" order by post_id desc ', [], 'fetchAll');

require("../backend/filter_property.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
    <link rel="icon" type="image/x-icon" href="image/website_image/logo-house1-removebg.png">
</head>
<body>

    <?php require('public_component/navbar.php'); ?>
    <br>
    <div class="row mb-4 mt-5">
        <div class="ms-2 col-12 mt-3">
            <form action="" method="post" class="d-flex justify-content-center">
                <input type="text" name="search_id" class="form-control me-2" placeholder="Search...">
                <button type="submit" class="btn btn-primary"  name='search_btn'>Search</button>
            </form>
        </div>
    </div>
    
    <div class="container-fluid border p-4 rounded shadow">
                <form action="" method="post" class="row g-3">
                    <div class="col-md-4 mb-2">
                        <label for="min_price" class="form-label">Minimum Price</label>
                        <input type="number" class="form-control" id="min_price" name="min_price" placeholder="Minimum Price">
                    </div>
                    <div class="col-md-4 mb-2">
                        <label for="max_price" class="form-label">Maximum Price</label>
                        <input type="number" class="form-control" id="max_price" name="max_price" placeholder="Maximum Price">
                    </div>
                    <div class="col-md-4 mb-2">
                        <label for="location" class="form-label">Location</label>
                        <select class="form-select" id="location" name="location">
                            <option value="">Select Location</option>
                            <option value="San Lorenzo Ruiz">San Lorenzo Ruiz</option>
                            <option value="H2">H2</option>
                            <option value="San Mariano">San Mariano</option>
                            <option value="San Manuel">San Manuel</option>
                            <option value="Santa Cristina">Santa Cristina</option>
                            <option value="Poblacion">Poblacion</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-2">
                        <label for="max_room_count" class="form-label">Room Count</label>
                        <input type="number" class="form-control" id="room_count" name="room_count" placeholder="Room Count">
                    </div>
                    <div class="col-md-4 mb-2">
                        <label for="max_bathroom_count" class="form-label">bathroom Count</label>
                        <input type="number" class="form-control" id="bathroom_count" name="bathroom_count" placeholder="bathroom Count">
                    </div>
                    <div class="col-md-4 mb-2">
                        <button type="submit" class="btn btn-primary w-100 mt-4" name='filter_btn'>Filter</button>
                    </div>
                </form>
            </div>

            <div class="row">
                <?php require('public_component/listing.display.landing_page.php'); ?>
            </div>
        

    <?php require('public_component/contact.php'); ?>

    <!-- Bootstrap JS -->
    <?php require('public_component/scripts.php'); ?>
    <?php require('public_component/contact_script.php'); ?>
    <?php require('public_component/sidebar.jquery.php'); ?>
</body>
</html>