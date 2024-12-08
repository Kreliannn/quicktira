<?php

require_once ('../backend/Aglobal_file.php');
require("../backend/check_user_session.php");

$all_tenant = $database->get("select *  from tenants",[],"fetchAll");
$all_landlords = $database->get("select * from landlords",[],"fetchAll");


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
    <link rel="icon" type="image/x-icon" href="image/website_image/logo-house1-removebg.png">
</head>
<body>
    
    <div class="row">
        <div class="col-12 col-md-2"> 
            <?php  require('public_component/sidebar.admin.php')  ?>
        </div>          

        <div class="col ms-4"  style='height:100dvh; overflow:auto'>
        <div class="row">

            <div class="col-md-6 mt-4">
                <div class="container" style="height: 90vh; border: 1px solid #ddd; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                    <h2 class="text-center">Tenant</h2>
                    <div class="container border m-0 p-0 overflow-auto" style="height: 75%;" id='tenant_container'>

                    <?php foreach ($all_tenant as $tenant): ?>
                        <div class="container-fluid border d-flex justify-content-between align-items-center" style="height: 70px;">
                            <div class="d-flex align-items-center">
                                <img src="image/profile_image/<?php echo htmlspecialchars($tenant['profile_picture']); ?>" alt="Profile Picture" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                                <span class="ms-2"><?php echo htmlspecialchars($tenant['fullname']); ?></span>
                                <span class="ms-2"> @<?php echo htmlspecialchars($tenant['username']); ?></span>
                            </div>
                            <button class="delete_account btn btn-danger " value="<?=htmlspecialchars($tenant['account_id'])?>">Delete</button>
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
                                <img src="image/profile_image/<?php echo htmlspecialchars($landlords['profile_picture']); ?>" alt="Profile Picture" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                                <span class="ms-2"><?php echo htmlspecialchars($landlords['fullname']); ?></span>
                                <span class="ms-2"> @<?php echo htmlspecialchars($landlords['username']); ?></span>
                            </div>
                            <button class="btn btn-danger delete_account_landlord" id='' value='<?=htmlspecialchars($landlords['account_id'])?>'>Delete</button>
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
                        username : $("#input_tenant").val()
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
                                            <span class="ms-2"> @${res.account.username}</span>
                                        </div>
                                        <button class="btn btn-danger delete_account"  id='landlord_delete_id' value=${res.account.account_id}>Delete</button>
                                    </div>
                                `
                                $("#tenant_container").html(component)
                                $("#landlord_delete_id").click((event)=>{
            
                                    $.ajax({
                                    url : "../backend/delete_account.php",
                                    method : "post",
                                    data : {
                                        account_type : "tenant",
                                        account_id : event.target.value
                                    },
                                    success : (response) => {
                                        window.location.reload()
                                    }
                                    })
                                })
                            break;

                            case "error":
                                
                            break;
                        }
                    }
                })
            })


            $(".delete_account").click((event)=>{
                $.ajax({
                    url : "../backend/delete_account.php",
                    method : "post",
                    data : {
                        account_type : "tenant",
                        account_id : event.target.value
                    },
                    success : (response) => {
                        window.location.reload()
                    }
                })
            })



            $("#landlord_search").click(()=>{
                $.ajax({
                    url : "../backend/search_user.php",
                    method : "post",
                    data : {
                        type : "landlords",
                        username : $("#input_landlord").val()
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
                                            <span class="ms-2">  @${res.account.username}</span>
                                        </div>
                                        <button class="btn btn-danger" id='landlord_delete_id' value='${res.account.account_id}'>Delete</button>
                                    </div>
                                `
                                $("#landord_container").html(component)
                                $("#landlord_delete_id").click((event)=>{
            
                                    $.ajax({
                                    url : "../backend/delete_account.php",
                                    method : "post",
                                    data : {
                                        account_type : "landlord",
                                        account_id : event.target.value
                                    },
                                    success : (response) => {
                                        window.location.reload()
                                    }
                                    })
                                })
                            break;

                            case "error":
                                
                            break;
                        }
                    }
                })
            })


            $(".delete_account_landlord").click((event)=>{
            
                $.ajax({
                    url : "../backend/delete_account.php",
                    method : "post",
                    data : {
                        account_type : "landlord",
                        account_id : event.target.value
                    },
                    success : (response) => {
                        window.location.reload()
                    }
                })
            })

        })
    </script>
</body>
</html>