<?php
    require_once('../backend/Aglobal_file.php');

    $post_id = $_SESSION['manage_property_id'];

    $data = $database->get("select * from taken_property where post_id =?", [$post_id], "fetch");

    $tenant_info =  $database->get("select * from tenants where account_id =?", [  $data['tenant_id'] ], "fetch");

    $property_info =  $database->get("select * from post_property where post_id =?", [  $post_id ], "fetch");

    if(empty($data["deadline"]))
    {
        $currentDate = new DateTime();  
        $deadline = new DateTime($data['move_in_date']);
        $deadline->modify('+30 days');

        $interval = $currentDate->diff($deadline);

        $days_left = $interval->days;
        $showDeadline = $deadline->format('Y-m-d');
        $today = $currentDate->format('Y-m-d');
    }
    else
    {
        $currentDate = new DateTime();
        $deadline = new DateTime($data["deadline"]);

        if($currentDate >= $deadline)
        {
            $deadline->modify('+30 days');
            $database->update("update taken_property set deadline = ?", [$deadline->format('Y-m-d')]);
        }

        $interval = $currentDate->diff($deadline);

        $days_left = $interval->days;
        $showDeadline = $data["deadline"];
        $today = $currentDate->format('Y-m-d');
    }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    
    <div class="row">
        <div class="col-12 col-md-2">  
            <?php require('public_component/sidebar.landlord.php'); ?>
        </div>          

        <div class="col">
            <div class="row">
                <div class="col-md-6">
                    <div class="property-info">
                        <h2>Property Details</h2>
                        <img src="image/post_property_image/<?=$property_info['post_images']?>" class="mb-3" alt="Property Image" style="width: 60%; height: auto;">
                        <p><strong>Address:</strong> <?=$property_info['address']?></p>
                        <p><strong>Price:</strong> <?=$property_info['post_price']?></p>
                        <p> date : <?=$today?></p>
                        <p> deadline : <?=$showDeadline?></p>
                        <p> days left :  <?=$days_left?></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="tenant-info">
                        <h2>Tenant Information</h2>
                        <img src="image/profile_image/<?=$tenant_info['profile_picture']?>" class="mb-3" alt="Tenant Profile Image" style="width: 20%; height: auto;">
                        <p><strong>Name:</strong> <?=$tenant_info['fullname']?></p>
                        <p><strong>Email:</strong> <?=$tenant_info['email']?></p>
                        <p><strong>Contact:</strong> <?=$tenant_info['contact']?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require('public_component/scripts.php'); ?>
    <?php require('public_component/sweetAlert.php'); ?>
    <?php require('public_component/sidebar.jquery.php'); ?>

    <script>
        
    </script>
</body>
</html>