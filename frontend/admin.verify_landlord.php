<?php
require_once ('../backend/Aglobal_file.php');

$request = $database->get("select * from landlord_verification", [], "fetchAll");


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
    <title>Document</title>
    <link rel="icon" type="image/x-icon" href="image/website_image/logo-house1-removebg.png">
</head>
<body>
    
    <div class="row">
        <div class="col-12 col-md-2"> 
        <?php  require('public_component/sidebar.admin.php')  ?>
        </div>          

        <div class="col"  style='height:100dvh; overflow:auto'>
            <h1 class='text-center'>  landlord request </h1>
            <div class=' border shadow container ' style='height:600px'>
                <?php foreach($request as $req): ?>
                    <button class='landlord_request container-fluid p-3' value="<?=$req['verification_id']?>"> request from <?=$req['landlord_name']?>  </button>
                <?php endforeach ?>
            </div>
        </div>
    </div>


    <?php require('public_component/scripts.php'); ?>
    <?php require('public_component/sidebar.jquery.php'); ?>
    <script>
        $(document).ready(()=>{
            let request_id;
            $(".landlord_request").click((event)=>{
                        let id = event.target.value
                        request_id = id;
                        $.ajax({
                            url : "../backend/landlord_verification_info.php",
                            method : "post",
                            data : { id : id},
                            success : (response) => {
                                console.log(response)
                                let req_info = JSON.parse(response)
                                component = `
                                    <div id='pop_up' class="border bg-light shadow p-5" style=" z-index: 9999; position: absolute; top: 45%; left: 60%; transform: translate(-50%, -50%);  height:80%; width :70%; font-size: 1.5em;">
                                        <h1> name: ${req_info.landlord_name} </h1>
                                        <img style='height:300px;' src="image/landlord_verification_image/${req_info.verification_image}">

                                        <button id='close' type="button" class="btn btn-primary" style="position: absolute; top: 10px; right: 10px;">x</button>
                                        <br>
                                        <br>
                                        <button class='btn btn-success' value='${req_info.landlord_id}' id='approve'> approve </button>
                                        <button class='btn btn-danger' value='${req_info.landlord_id}' id='decline'> decline </button>
                                    </div>                                
                                `

                                $("body").append(component)

                                $("#close").click(() => {
                                    $("#pop_up").remove()
                                })



                                $("#approve").click((event)=>{
                                        let landlord_id = event.target.value;
                                        $.ajax({
                                            url : "../backend/landlord_set_verified.php",
                                            method : "post",
                                            data : {
                                                landlord_id  : landlord_id,
                                                request_id : request_id
                                            },
                                            success : (response) => {
                                                window.location.reload()
                                            }
                                        })
                                })

                                $("#decline").click((event)=>{
                                        let landlord_id = event.target.value;
                                        $.ajax({
                                            url : "../backend/landlord_decline_verified.php",
                                            method : "post",
                                            data : {
                                                request_id : request_id
                                            },
                                            success : (response) => {
                                                window.location.reload()
                                            }
                                        })
                                })



                            }
                        })
            })
        })
    </script>
</body>
</html>