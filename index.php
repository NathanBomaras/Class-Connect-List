<?php 

// Temporary user_id for testing if needed DELETE LATER ON POST PRODUCTION
// if (session_status() === PHP_SESSION_NONE) {
//     // Start session
//     session_start();
// }
// $_SESSION['user_id'] = '1';
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">

</head>
<body>
    <div class="container">
        <div class="content">
            <p class="title">CLASS CONNECT: LIST</p><br>
            <p class="para">A centralized checklist for students,<br>
            made by students.</p><br>
            <label class="loginMessage"></label>
        </div>

        <div class="form">
            
            <form id="loginUser">
                <label>EMAIL</label>
                <input type="email" name="email" placeholder="Example@mail.com">
                <label>PASSWORD</label>
                <input type="password" name="password" placeholder="Password">

                <label class="loginMessage"></label>

                <button class="loginbtn" type="submit" name="submit" >LOGIN</button>
                <hr>
                <button><a class="createbtn" href="user/signup.php">CREATE NEW ACCOUNT</a></button>
            </form>
        </div>
    </div>

    <!-- AJAX / jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type="text/javascript">
$("#loginUser").submit(function(e){
    e.preventDefault();
    var form = $(this);

    $.ajax({
        type: 'POST',
        url: 'user/login.process.php',
        data: form.serialize(),
        success: function(data){
            if(data == "Login Successful"){
                window.location.replace("class/no-class.php");
            }
            else{
                $(".loginMessage").html(data);
            }
        }
    });
});
</script>

</body>
</html>