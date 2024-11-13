<?php
    require_once ('../backend/Aglobal_file.php');
    $property = $database->get('select * from post_property join landlords on post_property.landlord_id = landlords.account_id where post_id = ?', [$_POST['post_id']], 'fetch');
    $property_images = $database->get('select * from property_post_pictures where post_id = ?', [$_POST['post_id']], 'fetchAll');

  
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>

    <?php require('public_component/navbar.php'); ?>

    <br><br>

    <div class="row mt-4">
        <div class="col-12">
            <a href="landing_page.php" class="btn btn-primary">Back to Landing Page</a>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <!-- User Information -->
                <div class="card mb-4 shadow-sm">
                    <div class="card-body text-center">
                        <img src="image/profile_image/<?= $property['profile_picture'] ?>" alt="User Profile" class="rounded-circle img-fluid mb-3" style="width: 150px; height: 150px; object-fit: cover;">
                        <h4 class="mb-2"><?= $property['fullname'] ?></h4>
                        <p class="text-muted">User ID: <?= $property['account_id'] ?></p>
                    </div>
                </div>
                
                <!-- Property Details -->
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <img src="image/post_property_image/<?= $property['post_images'] ?>" alt="Property" class="card-img-top img-fluid mb-3" style="height: 300px; object-fit: cover;">
                        <h3 class="card-title mb-3"><?= $property['post_title'] ?></h3>
                        <h5 class="text-primary mb-3">$<?= number_format($property['post_price'], 2) ?></h5>
                        
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span><i class="fas fa-bed me-2"></i>Rooms</span>
                                <span class="badge bg-primary rounded-pill"><?= $property['room_count'] ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span><i class="fas fa-bath me-2"></i>Bathrooms</span>
                                <span class="badge bg-primary rounded-pill"><?= $property['bathroom_count'] ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span><i class="fas fa-vector-square me-2"></i>Area</span>
                                <span class="badge bg-primary rounded-pill"><?= $property['sqr_meters'] ?> m²</span>
                            </li>
                        </ul>
                    </div>
                </div>
               
            </div>
            
            <div class="col-md-8">
                <!-- Property Images Carousel -->
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Property Gallery</h4>
                        <div id="propertyImageCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <?php foreach ($property_images as $index => $image): ?>
                                    <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                                        <img src="image/post_property_image/<?= $image['image_name'] ?>" alt="Property Image" class="d-block w-100 img-fluid" style="height: 500px; object-fit: cover;">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#propertyImageCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#propertyImageCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <div class="container mt-4">
                            <div class="">
                                <div class="">
                                    <h4 class="e mb-3">Description</h4>
                                    <p class=""><?= nl2br(htmlspecialchars($property['post_description'])) ?></p>
                                </div>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require('public_component/contact.php'); ?>

    <!-- Bootstrap JS -->
    <?php require('public_component/scripts.php'); ?>
    <?php require('public_component/contact_script.php'); ?>
    <?php require('public_component/sidebar.jquery.php'); ?>
</body>
</html>