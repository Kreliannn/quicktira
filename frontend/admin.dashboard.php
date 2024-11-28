<?php

require_once ('../backend/Aglobal_file.php');

$total_tenant = count($database->get("select * from tenants",[],"fetchAll"));
$total_landlords = count($database->get("select * from landlords",[],"fetchAll"));
$total_users = $total_tenant + $total_landlords;

$active_post = count($database->get("select * from post_property where post_status = 'active'",[],"fetchAll"));
$inactive_post = count($database->get("select * from post_property where post_status = 'inactive'",[],"fetchAll"));
$total_post = count($database->get("select * from post_property",[],"fetchAll"));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Tailwind CSS -->
    <title>Document</title>
</head>
<body>
    
    <div class="row">
        <div class="col-12 col-md-2"> 
            <?php  require('public_component/sidebar.admin.php')  ?>
        </div>          

        <div class="col"  style='height:100dvh; overflow:auto'>
            <div class="row mt-3">
        <div class="col-md-6 ">
                    <div class="card" style="height: 200px;">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 24px;">Total Users</h5>
                            <p class="card-text" style="font-size: 24px; font-weight: bold;"><strong><?=$total_users?></strong></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card" style="height: 200px;">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 24px;">Total Tenants</h5>
                            <p class="card-text" style="font-size: 24px; font-weight: bold;"><strong><?=$total_tenant?></strong></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="card" style="height: 200px;">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 24px;">Total Landlords</h5>
                            <p class="card-text" style="font-size: 24px; font-weight: bold;"><strong><?=$total_landlords?></strong></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card" style="height: 200px;">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 24px;">Total Posts</h5>
                            <p class="card-text" style="font-size: 24px; font-weight: bold;"><strong><?=$total_post?></strong></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="card" style="height: 200px;">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 24px;">Active Posts</h5>
                            <p class="card-text" style="font-size: 24px; font-weight: bold;"><strong><?=$active_post?></strong></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card" style="height: 200px;">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 24px;">Inactive Posts</h5>
                            <p class="card-text" style="font-size: 24px; font-weight: bold;"><strong><?=$inactive_post?></strong></p>
                        </div>
                    </div>
                </div>
            </div>
    </div>


    <?php require('public_component/scripts.php'); ?>
    <?php require('public_component/sidebar.jquery.php'); ?>
</body>
    <script>
        $(document).ready(()=>{
            
        })
    </script>
</html>