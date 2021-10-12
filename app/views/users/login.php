<?php require APPROOT . '/views/includes/header.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/nav.css">
</head>
<body>
<img class="wave" src="<?php echo URLROOT; ?>/img/wave.svg">
<div>
   <?php require APPROOT . '/views/includes/navbar.php'; ?>
</div>
<div>
   <?php flash('register_success'); ?>
</div>
<div class="container">
    <div class="img">
        <img src="<?php echo URLROOT; ?>/img/bg.svg">
    </div>
    <div class="login-content">
        <form id="form" action="<?php echo URLROOT; ?>/users/login" method="POST">
            <img src="<?php echo URLROOT; ?>/img/avatar.svg">
            <h2 class="title">Login</h2>
            <div class="input-div one">
                <div class="i">
                    <i class="fas fa-user"></i>
                </div>
                <div class="div">
                    <h5>Username</h5>
                    <span class="error"><?php echo $data['username_err']; ?></span>
                    <input name="username" type="text" class="input"  value="<?php echo $data['username']; ?>" required>
                </div>
            </div>
            <div class="input-div pass">
                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>
                <div class="div">
                    <h5>Password</h5>
                    <span class="error"><?php echo $data['password_err']; ?></span>
                    <input name="password" type="password" class="input" value="<?php echo $data['password']; ?>" required>
                </div>
            </div>
            <a href="#">Forgot Password?</a>
            <a href="<?php echo URLROOT;?>/users/register">Doesn't have an account?</a>
            <input name="login_user" type="submit" class="btn" value="Login">
        </form>
    </div>
</div>
<?php require APPROOT . '/views/includes/footer.php'; ?>
