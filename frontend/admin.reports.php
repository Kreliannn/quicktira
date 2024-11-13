


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
        <div class="col-12 col-md-2 border"> 
            <?php  require('public_component/sidebar.admin.php') ?>
        </div>          

        <div class="col">
           <div class="row mt-5 gap-2 container ms-2" style="height: 80vh;">
               <div class="col border shadow m-0 p-0" id="feedback_container">
                   
               </div>
           </div>
        </div>
    </div>/scripts.php'); ?>s       $(document).ready(()=>{
            $.ajax({backend/feedback_get.php",
                method : "post",
                success : (response) => {
                    let feedbacks = JSON.parse(response)
 
                    for(i = 0; i < feedbacks.length; i++)
                    {                  }                   })
        })
    </script>
</html>