<?php
    require_once('../backend/Aglobal_file.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{
            margin:0;
            padding:0;
        }
    </style>
</head>
<body>
   
    <div class="container mt-5">
        <div class="row align-items-center">
            <div class="col-md-4 text-center d-flex align-items-center justify-content-center">
                <img id='profile_picture' src="image/profile_image/<?=$_SESSION['user']['profile_picture']?>" alt="Profile Picture" class="img-fluid rounded-circle" style="width: 200px; height: 200px; object-fit: cover; border: 5px solid #A5B68D;">
            </div>
            <div class="col-md-8">
                <div class="card shadow-sm" style="background-color: #ffffff; border: 1px solid #a5b68d;">
                    <div class="card-body">
                        <h2 class="card-title h4 mb-3" style="color: #4c583a;"><?=$_SESSION['user']['fullname']?></h2>
                        <p class="card-text" style="color: #626f47;"><strong>Account ID:</strong> <?=$_SESSION['user']['account_id']?></p>
                        <p class="card-text" style="color: #626f47;"><strong>Account Type:</strong> <?=$_SESSION['user']['account_type']?></p>
                        <p class="card-text" style="color: #626f47;"><strong>Email:</strong> <?=$_SESSION['user']['email']?></p>
                        <p class="card-text" style="color: #626f47;"><strong>Contact:</strong> <?=$_SESSION['user']['contact']?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <br><br><br>
    <div class="container mt-3">
        <h3 class="mb-4" style="color: #4c583a; border-bottom: 2px solid #A5B68D; padding-bottom: 10px;">Upload Profile Picture</h3>
        <form action="" method="post" enctype="multipart/form-data" id='upload' class="bg-light p-4 rounded shadow-sm">
            <div class="mb-3">
                <label for="fileUpload" class="form-label fw-bold">Choose a new profile picture</label>
                <input type="file" class="form-control" id="fileUpload" name="fileUpload" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary" id='upload_btn' style="background-color: #626F47; border: none;">Upload Picture</button>
        </form>
    </div>
    
    <br><br>

    <div class="container mt-3">
        <h3 class="mb-4" style="color: #4c583a; border-bottom: 2px solid #A5B68D; padding-bottom: 10px;">Change Password</h3>
        <form id="changePasswordForm" class="bg-light p-4 rounded shadow-sm">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="currentUsername" class="form-label fw-bold">Current Username</label>
                    <input type="text" class="form-control" id="currentUsername" name="currentUsername" required>
                </div>
                <div class="col-md-6">
                    <label for="currentPassword" class="form-label fw-bold">Current Password</label>
                    <input type="password" class="form-control" id="currentPassword" name="currentPassword" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="newUsername" class="form-label fw-bold">New Username</label>
                    <input type="text" class="form-control" id="newUsername" name="newUsername" required>
                </div>
                <div class="col-md-6">
                    <label for="newPassword" class="form-label fw-bold">New Password</label>
                    <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" id='changePass_btn' style="background-color: #626F47; border: none;">Change Password</button>
        </form>
    </div>

    <br><br>

    <div class="d-flex justify-content-center">
        <a href="landing_page.php" class='btn btn-danger me-2'> Logout </a>
        <a href="messenger.php" class='btn btn-primary'> Messenger </a>
    </div>
        
    <br><br><br><br>

    

    <script>
        $(document).ready(()=>{

            $('#upload').submit(function(e){
                e.preventDefault();
                let formData = new FormData(this);
                $.ajax({
                    url: '../backend/profile.user.upload_file.php',
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response){
                        let res = JSON.parse(response)

                        switch(res.type)
                        {
                            case 'success':
                                $('#profile_picture').attr('src', 'image/profile_image/' + res.file_name)
                            break;

                            case 'error':
                                alert(res.text)
                            break;
                        }
                        
                        
                    },
                });
            });

            $('#changePass_btn').click((e)=>{
                e.preventDefault();
                $.ajax({
                    url : '../backend/profile.user.change_pass.php',
                    method : 'post',
                    data : {
                        current_username : $('#currentUsername').val(),
                        current_password : $('#currentPassword').val(),
                        new_username : $('#newUsername').val(),
                        new_password : $('#newPassword').val(),
                    },
                    success : (response) => {
                        let res = JSON.parse(response)
                        alert(res.text)
                    }
                })
            })

                    
            
        })
    </script>
</body>
</html>