<?php require APPROOT . '/views/includes/header.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/nav.css">
</head>
<body>
<img class="wave" src="<?php echo URLROOT; ?>/img/wave.svg">
<div>
   <?php require APPROOT . '/views/includes/navbar.php'; ?>
</div>
<div class="container">
    <div class="img">
        <img src="<?php echo URLROOT; ?>/img/s.svg">
    </div>
    <div class="login-content">
        <form class="lform" method="POST" action="<?php echo URLROOT; ?>/users/register">
       
            <h2 class="title">Sign up</h2>
                <div class="form-field">
                <div class="input-group1">
                    <span class="error"><?php echo $data['firstname_err']; ?></span>
                    <input name="firstname" type="text" placeholder="First Name" class="input" required
                    value="<?php echo $data['firstname']; ?>">
                </div>
                <div class="input-group1">
                    <span class="error"><?php echo $data['lastname_err']; ?></span>
                    <input name="lastname" type="text" placeholder="Last Name" class="input"  required
                    value="<?php echo $data['lastname']; ?>">
                </div>
                </div>
                <div class="input-group">
                    <span class="error"><?php echo $data['username_err']; ?></span>
                    <input name="username" type="text" placeholder="NIC" class="input"  required
                    value="<?php echo $data['username']; ?>">
                </div>
                <div class="input-group">
                    <span class="error"><?php echo $data['email_err']; ?></span> 
                    <input name="email" type="email" placeholder="Email" class="input"  required
                    value="<?php echo $data['email']; ?>">
                </div>
                <div class="input-group">
                    <span class="error"><?php echo $data['password_err']; ?></span>
                    <input name="password" type="password" placeholder="Password" class="input"  required
                    value="<?php echo $data['password']; ?>">
                </div>
                <div class="input-group2">
                    <span class="error"><?php echo $data['cpassword_err']; ?></span>
                    <input name="cpassword" type="password" placeholder="Confirm Password" class="input" required
                    value="<?php echo $data['cpassword']; ?>">
                </div>
                <br>
                <br> 
                <div> 
                <input type="checkbox" name="terms" id="terms" onchange="activateButton(this)" required>  I Agree to the Terms & Conditions
                <br>   
            <input type="submit" name="submit" class="btn1" value="Register Now">
            </div> 
        </form>
    </div>
</div>
<?php require APPROOT . '/views/includes/footer.php'; ?>
