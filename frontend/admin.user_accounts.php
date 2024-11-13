<?php

require_once ('../backend/Aglobal_file.php');

$all_tenant = $database->get("select account_id, fullname, profile_picture from tenants",[],"fetchAll");
$all_landlords = $database->get("select account_id, fullname, profile_picture from landlords",[],"fetchAll");


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

        <div class="col ms-4">
        <div class="row">

            <div class="col-md-6 mt-4">
                <div class="container" style="height: 90vh; border: 1px solid #ddd; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                    <h2 class="text-center">Tenant</h2>
                    <div class="container border m-0 p-0 overflow-auto" style="height: 75%;" id='tenant_container'>

                    <?php foreach ($all_tenant as $tenant): ?>
                        <div class="container-fluid border d-flex justify-content-between align-items-center" style="height: 70px;">
                            <div class="d-flex align-items-center">
                                <img src="image/profile_image/<?php echo $tenant['profile_picture']; ?>" alt="Profile Picture" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                                <span class="ms-2"><?php echo $tenant['fullname']; ?></span>
                                <span class="ms-2"> id: <?php echo $tenant['account_id']; ?></span>
                            </div>
                            <button class="btn btn-danger">Delete</button>
                        </div>
                    <?php endforeach; ?>

                    </div>

                    <div class="row mt-3">
                        <div class="col-9">
                            <input type="text" class="form-control form-control-lg" id='input_tenant'>
                        </div>
                        <div class="col">
                            <button class="btn btn-primary btn-lg" id='tenant_search'>Search</button>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-6 mt-4">
                <div class="container" style="height: 90vh; border: 1px solid #ddd; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                    <h2 class="text-center">Landlord</h2>
                    <div class="container border m-0 p-0 overflow-auto" style="height: 75%;"  id='landord_container'>

                    <?php foreach ($all_landlords as $landlords): ?>
                        <div class="container-fluid border d-flex justify-content-between align-items-center" style="height: 70px;">
                            <div class="d-flex align-items-center">
                                <img src="image/profile_image/<?php echo $landlords['profile_picture']; ?>" alt="Profile Picture" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                                <span class="ms-2"><?php echo $landlords['fullname']; ?></span>
                                <span class="ms-2"> id: <?php echo $landlords['account_id']; ?></span>
                            </div>
                            <button class="btn btn-danger">Delete</button>
                        </div>
                    <?php endforeach; ?>

                    </div>

                    <div class="row mt-3">
                        <div class="col-9">
                            <input type="text" class="form-control form-control-lg" id='input_landlord'>
                        </div>
                        <div class="col">
                            <button class="btn btn-primary btn-lg" id='landlord_search'>Search</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        </div>
    </div>


    <?php require('public_component/scripts.php'); ?>
    <?php require('public_component/sidebar.jquery.php'); ?>
    <script>
        $(document).ready(()=>{
            $("#tenant_search").click(()=>{
                $.ajax({
                    url : "../backend/search_user.php",
                    method : "post",
                    data : {
                        type : "tenants",
                        account_id : $("#input_tenant").val()
                    },
                    success : (response) => {
                        console.log(response)
                        let res = JSON.parse(response);
                        switch(res.type)
                        {
                            case "success":
                                $("#tenant_container").empty();
                                let component = 
                                `
                                    <div class="container-fluid border d-flex justify-content-between align-items-center" style="height: 70px;">
                                        <div class="d-flex align-items-center">
                                            <img src="image/profile_image/${res.account.profile_picture}" alt="Profile Picture" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                                            <span class="ms-2">${res.account.fullname}</span>
                                            <span class="ms-2"> id: ${res.account.account_id}</span>
                                        </div>
                                        <button class="btn btn-danger">Delete</button>
                                    </div>
                                `
                                $("#tenant_container").html(component)
                            break;

                            case "error":
                                
                            break;
                        }
                    }
                })
            })

            $("#landlord_search").click(()=>{
                $.ajax({
                    url : "../backend/search_user.php",
                    method : "post",
                    data : {
                        type : "landlords",
                        account_id : $("#input_landlord").val()
                    },
                    success : (response) => {
                        let res = JSON.parse(response);
                        switch(res.type)
                        {
                            case "success":
                                $("#landord_container").empty();
                                let component = 
                                `
                                    <div class="container-fluid border d-flex justify-content-between align-items-center" style="height: 70px;">
                                        <div class="d-flex align-items-center">
                                            <img src="image/profile_image/${res.account.profile_picture}" alt="Profile Picture" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                                            <span class="ms-2">${res.account.fullname}</span>
                                            <span class="ms-2"> id: ${res.account.account_id}</span>
                                        </div>
                                        <button class="btn btn-danger">Delete</button>
                                    </div>
                                `
                                $("#landord_container").html(component)
                            break;

                            case "error":
                                
                            break;
                        }
                    }
                })
            })
        })
    </script>
</body>
</html>