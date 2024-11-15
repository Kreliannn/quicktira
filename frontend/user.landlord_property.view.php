<?php
    require_once('../backend/Aglobal_file.php');


    $post_id = $_SESSION['manage_property_id'];

    $query = 'select * from post_property where post_id = ?';

    $property_data = $database->get($query, [ $post_id ], 'fetch');

    $request = $database->get("select * from  tenant_applications where post_id = ?", [ $post_id ], 'fetchAll');

    $likes = count($database->get("select * from  like_react where post_id = ?", [ $post_id ], 'fetchAll'));
    $favorite= count($database->get("select * from  favorite where post_id = ?", [ $post_id ], 'fetchAll'));
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

        <div class="col" id='container'>

        <div class="row ">
            <?php require('public_component/property_view.no_tenant.php'); ?>
        </div>

        </div>
    </div>

    <?php require('public_component/scripts.php'); ?>
    <?php require('public_component/sweetAlert.php'); ?>
    <?php require('public_component/sidebar.jquery.php'); ?>

    <script>
        $(document).ready(()=>{
           $(".req").click((event) => {
                $.ajax({
                    url: "../backend/get_tenant_request.php",
                    method : "post",
                    data : {
                        request_id : event.target.value
                    },
                    success: (response) => {
                        let request_data = JSON.parse(response);
                        let popupContent = `
                            <div class="card" id='popUp'style="position: fixed; z-index: 9999; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 350px; height: 600px;">
                                <div class="card-header">
                                    <h5 class="card-title ">Request Details</h5>
                                </div>
                                <div class="card-body">
                                    <p><strong>Tenant Fullname:</strong> ${request_data.tenant_fullname}</p>
                                    <p><strong>Contact Phone:</strong> ${request_data.contact_phone}</p>
                                    <p><strong>Contact Email:</strong> ${request_data.contact_email}</p>
                                    <p><strong>Number of Occupants:</strong> ${request_data.num_occupants}</p>
                                    <p><strong>Move In Date:</strong> ${request_data.move_in_date}</p>
                                    <p><strong>Employment/Work:</strong> ${request_data.employment_work}</p>
                                </div>
                                <div class="card-footer">
                                    <button type="button" class="btn btn-success" style="width: 100px; height: 50px;">Approve</button>
                                    <button type="button" class="btn btn-danger" style="width: 100px; height: 50px;">Reject</button>
                                    <button type="button"id='close_req' class="btn btn-dark" style="width: 100px; height: 50px;">Close</button>
                                </div>
                            </div>
                        `;

                        $("#container").append(popupContent)   
                        
                        $("#close_req").click(()=>{
                            $("#popUp").remove();
                        })

                        
                        
                    }
                })
            })
        })
    </script>
</body>
</html>