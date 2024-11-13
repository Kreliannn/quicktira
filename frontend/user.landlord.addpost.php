<?php
    require_once('../backend/Aglobal_file.php');

    $query = 'select * from post_property join landlords on post_property.landlord_id = landlords.account_id where landlords.account_id = ?';

    $property_data = $database->get($query, [$_SESSION['user']['account_id']], 'fetchAll');
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
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
</head>
<body>
    <!--alert-->
    <?php require('public_component/alert_success.php'); ?>
    <?php require('public_component/alert_error.php'); ?>
    
    <div class="row">
        <div class="col-12 col-md-2">  
            <?php $_SESSION['user']['account_type'] == 'tenant' ? require('public_component/sidebar.tenant.php') : require('public_component/sidebar.landlord.php'); ?>
        </div>          

        <div class="col">
            <div class="container mt-3">
                <div class="container mt-3">
                    <h4 class="mb-3 text-center">Add New Listing</h4>
                    <form action="#" method="POST" enctype="multipart/form-data" id='addPostForm' class="mx-auto" style="max-width: 700px;">
                        <div class="row g-2">
                            <div class="col-md-12 mb-2">
                                <label for="title" class="form-label small">Title</label>
                                <input type="text" class="form-control form-control-sm rounded-0" id="title" name="title" required>
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="image" class="form-label small">Main Image</label>
                                <input type="file" class="form-control form-control-sm rounded-0" id="image" name="image" accept="image/*">
                            </div>
                        </div>
                        <div id="mainImgContainer" class="mb-2"></div>
                        <div class="mb-2">
                            <label for="images" class="form-label small">Additional Images</label>
                            <input type="file" class="form-control form-control-sm rounded-0" id="images" name="images[]" multiple accept="image/*">
                        </div>
                        <div id="imgContainer" class="mb-2"></div>
                        <div class="mb-2">
                            <label for="address" class="form-label small">Address</label>
                            <input type='text'class="form-control form-control-sm rounded-0" id="address" name="address" required>
                        </div>
                        <div class="row g-2">
                            <div class="col-md-4 mb-2">
                                <label for="price" class="form-label small">Price</label>
                                <input type="number" class="form-control form-control-sm rounded-0" id="price" name="price" step="0.01" required>
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="location" class="form-label small">Location</label>
                                <select class="form-select form-select-sm rounded-0" id="location" name="location" required>
                                    <option value=""> select barangay </option>
                                    <option value="San Lorenzo Ruiz">San Lorenzo Ruiz</option>
                                    <option value="H2">H2</option>
                                    <option value="San Mariano">San Mariano</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="sqr_meter" class="form-label small">Square Meters</label>
                                <input type="number" class="form-control form-control-sm rounded-0" id="sqr_meter" name="sqr_meter" step="0.01" required>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col-md-6 mb-2">
                                <label for="room_count" class="form-label small">Room Count</label>
                                <input type="number" class="form-control form-control-sm rounded-0" id="room_count" name="room_count" min="1" value="1" required>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="bathroom_count" class="form-label small">Bathroom Count</label>
                                <input type="number" class="form-control form-control-sm rounded-0" id="bathroom_count" name="bathroom_count" min="1" value="1" required>
                            </div>
                        </div>
                        <div id='map' class="container border" style='height:400px'>
                            
                        </div>
                        <div class="mb-2">
                            <label for="description" class="form-label small">Description</label>
                            <textarea class="form-control form-control-sm rounded-0" id="description" name="description" rows="2" required></textarea>
                        </div>
                        <div>
                            <input type="hidden" id='latitude' name='latitude'>
                            <input type="hidden" id='longitude' name='longitude'>
                        </div>
                        <div class="">
                            <button id='btn-addPost' class="btn btn-primary btn-sm rounded-0 container">Submit</button>
                        </div>                     
                    </form>
                    <br><br>
                </div>
            </div>
        </div>
    </div>

    <?php require('public_component/scripts.php'); ?>
    <?php require('public_component/sweetAlert.php'); ?>
    <?php require('public_component/sidebar.jquery.php'); ?>

<script>

    $(document).ready(() => {

        let map = L.map('map', { center: [ 14.322937322075674, 120.93887329101564 ],zoom: 13});

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19
        }).addTo(map);

        let landmark = L.marker([0, 0]);

        map.addEventListener('click', (event) => {
            let latitude = event.latlng.lat;
            let longitude = event.latlng.lng;

            landmark.remove()

            landmark = L.marker([latitude, longitude]).addTo(map)
            
            $("#latitude").val(latitude)
            $("#longitude").val(longitude)

        });

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
            }
        })


        $('#image').change((e) => {
            var file = e.target.files[0];
            var reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function(e) {
                $('#mainImgContainer').append('<img src="' + e.target.result + '" style="width: 100px; height: 100px; margin-right: 10px; margin-bottom: 10px;">');
            };
        })
        
        $('#images').change((e) => {

            var files = e.target.files;
            
            $('#imgContainer').empty();

            Array.from(files).forEach((file) => {

                var reader = new FileReader();

                reader.readAsDataURL(file);

                reader.onload = function(e) {
                    $('#imgContainer').append('<img src="' + e.target.result + '" style="width: 100px; height: 100px; margin-right: 10px; margin-bottom: 10px;">');
                };
            });
        });


        $('#btn-addPost').click((e)=> {
            e.preventDefault();

            let myFormData = new FormData($('#addPostForm')[0]);

            $.ajax({
                url: '../backend/landlord.add_post.php',
                method: 'POST',
                data: myFormData,
                contentType: false,
                processData: false,
                success: (response) => {
                    console.log(response)
                    let res = JSON.parse(response)
                    switch(res.type)
                    {
                        case 'success':
                            alertNormal("success", "post uploaded successfuly", () => {
                                window.location.reload();
                            });
                        break;

                        case 'error':
                            alertError(res.text)
                        break;
                    }                 
                },
            });
          
        })

        $('a').click((event) => {

            event.preventDefault();

            const inputs = [
                $('#title').val(),
                $('#price').val(),
                $('#description').val(),
                $('#sqr_meter').val(),
                $('#address').val()
            ];

            let confirms = false;

            inputs.forEach(input => {
                if (input !== '') {
                    confirms = true;
                }
            });

            if (confirms) {
                let text = "You have entered some information. Are you sure you want to leave this page?";
                alertConfirm(text, () => {
                    window.location.href = event.target.href;
                });
            } else {
                window.location.href = event.target.href;
            }
        });

    });

</script>


</body>
</html>