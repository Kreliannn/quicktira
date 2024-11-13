<script>

    $(document).ready(()=>{
        
        $("#contact_btn").click(()=>{
            $.ajax({
                url : "../backend/footer.contact_send_message.php",
                method : "post",
                data : {
                    fullname : $("#first_name").val() + " " +  $("#last_name").val(),
                    email :  $("#email").val(),
                    message :  $("#message").val() 
                },
                success : (response) => {
                    console.log(response)
                    let res = JSON.parse(response)
                    alert(res.type)
                }               
            })
        })


    })

</script>