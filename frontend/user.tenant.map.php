<?php
require_once ('../backend/Aglobal_file.php');
require("../backend/check_user_session.php");

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
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <title>Document</title>
    <link rel="icon" type="image/x-icon" href="image/website_image/logo-house1-removebg.png">
</head>
<body>
    
    <div class="row">
        <div class="col-12 col-md-2"> 
            <?php $_SESSION['user']['account_type'] == 'tenant' ? require('public_component/sidebar.tenant.php') : require('public_component/sidebar.landlord.php'); ?>
        </div>          

        <div class="col"  style='height:100dvh; overflow:auto'>
            <div class="container-fluid mt-4">
                <div id='map' class="container border" style='margin: auto; height:600px'>

                </div>
            </div>
        </div>
    </div>


    <?php require('public_component/scripts.php'); ?>
    <?php require('public_component/sidebar.jquery.php'); ?>
    <script>
      $(document).ready(function(){
            
            let map;

            $.ajax({
                url : '../backend/map_landmarks.php',
                success : (response) => {
                    let res = JSON.parse(response)
                    console.log(res)    
                    
                    map = L.map('map', { center: [ 14.322937322075674, 120.93887329101564 ],zoom: 13});

                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19
                    }).addTo(map);

                    for(property of res)
                    {   
                        let component = 
                        `
                            <form action="user.tenant.listing_view.php" method="post" >
                                <input type='hidden' name="post_id" value='${property.post_id}' >
                                <input type="submit" value="view" class='btn btn-primary'>
                            </form>
                        `
                        L.marker([ property.latitude,  property.longitude]).addTo(map)
                        .bindPopup(component)
                    }

                }                
            })


            $("#location").change((event)=>{
                let location = event.target.value

                switch(location)
                {
                    case "San Mariano":
                        map.setView([14.326762777973173 , 120.97749710083009], 16)
                    break;

                    case "San Lorenzo Ruiz":
                        map.setView([14.310296221512072 ,  120.95964431762697], 16)
                    break;

                    case "H2":
                        map.setView([14.330588168640638 ,  120.9578847885132], 16)  
                    break;

                    case "San Manuel":
                        map.setView([14.335868763771476 , 120.951726436615], 16)  
                    break;

                    case "Santa Cristina":
                        map.setView([14.322521507722268, 120.96955776214601], 16)  
                    break;

                    case "Poblacion":
                        map.setView([14.326887520002135, 120.93595504760744], 16)  
                    break;
                }
            })

        })
    </script>
</body>
</html>