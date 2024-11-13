<?php
    require_once('../backend/Aglobal_file.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messenger</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .hover-effect:hover {
            background-color: #E8F3E8;
            cursor: pointer;
        }
        body {
            background-color: #F5F8F5;
        }
        .list-group-item {
            border-color: #7C9070;
        }
    </style>
</head>
<body>

    <input type="hidden" id='user' value='<?=json_encode($_SESSION['user'])?>'>

    <div class="row">
        <div class="col-12 col-md-2">
            <?php $_SESSION['user']['account_type'] == 'tenant' ? require('public_component/sidebar.tenant.php') : require('public_component/sidebar.landlord.php'); ?>
        </div>          

        <div class="col">
            <div class="container mt-5">
                <h2 class="mb-4 text-center" style="color: #4A5D23;">Conversations</h2>
                <div class="row mb-4">
                    <div class="col-md-8 mx-auto">
                        <div class="input-group">
                            <input type="text" class="form-control" id="searchBar" placeholder="Search conversations..." style="border-color: #7C9070;">
                            <button class="btn btn-success" type="button" id='btn_search' style="background-color: #7C9070; border-color: #7C9070;">Search</button>
                        </div>
                    </div>
                </div>
                <ul class="list-group shadow" id='contactList' style="border-color: #7C9070;">
                    
                 
                </ul>
            </div>
        </div>
    </div>

    <?php require('public_component/scripts.php'); ?>
    <?php require('public_component/sidebar.jquery.php'); ?>

    <script type="module">
        import { initializeApp } from "https://www.gstatic.com/firebasejs/10.14.1/firebase-app.js";
        import { getFirestore, collection, addDoc, onSnapshot, query, where, orderBy, limit, getDocs} from "https://www.gstatic.com/firebasejs/10.14.1/firebase-firestore.js";

        const firebaseConfig = {
            apiKey: "AIzaSyClpggSiin_WXHwlc0AM-jUiwZK_4DENHs",
            authDomain: "test-c6a7a.firebaseapp.com",
            projectId: "test-c6a7a",
            storageBucket: "test-c6a7a.appspot.com",
            messagingSenderId: "236410288126",
            appId: "1:236410288126:web:ff00bd9636ad60e20772af"
        };

        const app = initializeApp(firebaseConfig);

        const db = getFirestore(app);       

        let messages = collection(db, 'quicktira');

        let user = JSON.parse($('#user').val());


        $(document).ready(()=>{

            fetchContactList();

            $('#btn_search').click((e)=>{
                e.preventDefault();
                $.ajax({
                    url : '../backend/messenger.search_id.php',
                    method : 'post',
                    data : { search_id : $('#searchBar').val()},
                    success : (response) => {
                        alert(response)
                        $('#contactList').empty();
                        fetchContactList();
                    }
                })
            })

        })


        function fetchContactList()
        {
            $.ajax({
                url : '../backend/messenger.fetch_contact_list.php',
                success : (response) => {
                    let res = JSON.parse(response)
                    console.log(res)
                    res.forEach((contact) => {
                        
                        let lastMessage;

                        let q = query(messages, where('convo_id', '==', Number(contact.convo_id)), orderBy('createdAt', 'desc'), limit(1));

                        getDocs(q).then((res) => {
                            let message = res.docs[0].data();
                            lastMessage = (message.sender == user.fullname)?  "" : message.text; 
                        }).then(() => {

                            function notifMessage()
                            {
                                return `<p style='color: #4A5D4A;'> ${lastMessage} </p>`;
                            }

                            let component = `
                            <form method='post' action='../backend/messenger.visit_convo.php' class="list-group-item d-flex justify-content-between align-items-center hover-effect" style="background-color: #F0F4F0; border-color: #7C9070;">
                                <input type="hidden" value="${contact.convo_id}" name="convo_id">
                                <div class="d-flex align-items-center">
                                    <img src="image/profile_image/${contact.profile_picture}" class="rounded-circle me-3" alt="Profile Picture" style="width: 40px; height: 40px; border: 2px solid #7C9070;">
                                    <div>
                                        <b style="color: #4A5D4A;">${contact.fullname}</b>
                                        ${lastMessage ? notifMessage() : "" } 
                                    </div>
                                </div>
                                <input type='submit' class="btn" value='Message' style="background-color: #7C9070; color: white; border: none;">
                            </form>
                            `;
                            $('#contactList').append(component);
                        });
                   
                        
                    })
                
                }
            })
        }
    </script>


</body>
</html>