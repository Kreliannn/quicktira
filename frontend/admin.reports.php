<?php

require_once ('../backend/Aglobal_file.php');

$total_tenant = count($database->get("select * from tenants",[],"fetchAll"));
$total_landlords = count($database->get("select * from landlords",[],"fetchAll"));
$total_users = $total_tenant + $total_landlords;

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

        <div class="col">
            <div class="row container  gap-2 shadow ms-3 mt-3" style='height : 90dvh'>
                <div class="col border">
                    <h2 class='text-center p-2'>Feedback</h2>
                    <div class="container border overflow-auto" style='height:85%' id='feedback_container'>
                        
                    </div>
                </div>

                <div class="col border">
                    <div class="alert alert-danger" >
                        This is a success alert—check it out!
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
  
            $.ajax({
                url: "../backend/feedback_get.php",
                success: (response) => {
                    let notif = JSON.parse(response);
                    for (let i = 0; i < notif.length; i++) {
                        let notif_info = [notif[i].sender_email, notif[i].sender_fullnamem, notif[i].message]
                        let component = `
                        <button class="feedback alert ${notif[i].message_type === 'unread' ? "alert-success" : "alert-dark"} m-0 text-start" style='width : 100%' value=${notif[i].message_id}>
                            from ${notif[i].sender_fullname}
                        </button>
                        `;
                        $("#feedback_container").append(component);
                    }

                    $(".feedback").click((event) => {
                        let id = event.target.value
                        $.ajax({
                            url : "../backend/feedback_info.php",
                            method : "post",
                            data : { message_id : id},
                            success : (response) => {
                                console.log(response)
                                let feedback_information = JSON.parse(response)
                                component = `
                                    <div id='pop_up' class="border bg-light shadow p-5" style=" z-index: 9999; position: absolute; top: 45%; left: 60%; transform: translate(-50%, -50%);  height:70%; width :70%; font-size: 1.5em;">
                                        <h2 class="text-center mb-4">Feedback Notification</h2>
                                        <p class="mb-3">from ${feedback_information[0].sender_fullname}</p>
                                        <p class="mb-3">${feedback_information[0].message}</p>
                                        <p class="mb-3">sender email : ${feedback_information[0].sender_email}</p>
                                        <button id='close' type="button" class="btn btn-primary" style="position: absolute; top: 10px; right: 10px;">x</button>
                                    </div>                                
                                `

                                $("body").append(component)

                                $("#close").click(() => {
                                    $("#pop_up").remove()
                                })
                            }
                        })
                    })
                }
            });

            

        })
    </script>
</html>