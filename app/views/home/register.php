<?php ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign Up - BREVIS</title>
    <link rel="stylesheet" type="text/css" href="../../../public/css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<img class="wave" src="../../../public/img/wave.svg">
<div class="container">
    <div class="img">
        <img src="../../../public/img/s.svg">
    </div>
    <div class="login-content">
        <form class="lform" method="POST" action="../../../app/models/home/loginModel.php">
        <?php //include('errors.php'); ?>     
        <img src="../../../public/img/stu.svg">
            <h2 class="title">Sign up</h2>
                <div class="form-field">
                <div class="input-group1">
                    <input name="firstname" type="text" placeholder="First Name" class="input" required>
                </div>
                <div class="input-group1">
                    <input name="lastname" type="text" placeholder="Last Name" class="input"  required>
                </div>
                </div>
                <div class="input-group">
                    <input name="username" type="text" placeholder="NIC" class="input"  required>
                </div>
                <div class="input-group">
                    <input name="email" type="email" placeholder="Email" class="input"  required>
                </div>
                <div class="input-group">
                    <input name="password" type="password" placeholder="Password" class="input"  required>
                </div>
                <div class="input-group">
                    <input name="cpassword" type="password" placeholder="Confirm Password" class="input"  required>
                </div>
                <br> 
                <input type="checkbox" name="terms" id="terms" onchange="activateButton(this)">  I Agree to the Terms & Conditions
                <br>   
            <input name="reg_user" type="submit"  class="btn1" value="Register Now">
        </form>
    </div>
</div>
<script type="text/javascript" src="../../../public/js/login.js"></script>
</body>
</html>


