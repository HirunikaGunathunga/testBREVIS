<?php require APPROOT . '/views/includes/header.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/nav.css">
</head>
<body>
<div>
   <?php require APPROOT . '/views/includes/navbar.php'; ?>
</div>
<img class="wave" src="<?php echo URLROOT; ?>/img/wave.svg">
<div>
    <?php flash('register_success'); ?>
</div>
<div class="container">
    <div class="img">
        <img src="<?php echo URLROOT; ?>/img/teacher.svg">
    </div>
    <div class="login-content">
        <form class="lform" action="<?php echo URLROOT; ?>/lecturers/addLecturer" method="POST" >
            <h2 class="title">Add Lecturer</h2>
            <div class="form-field">
                <div class="input-group1">
                    <input name="firstname" type="text" placeholder="First Name" class="input" required
                    value="<?php echo $data['firstname']; ?>">
                </div>
                <div class="input-group1">
                    <input name="lastname" type="text" placeholder="Last Name" class="input"  required
                    value="<?php echo $data['lastname']; ?>">
                </div>
            </div>
            <div class="input-group">
                <span class="error"><?php echo $data['nic_err']; ?></span>
                <input name="nic" type="text" placeholder="NIC Number" class="input"  required
                value="<?php echo $data['nic']; ?>">
            </div>
            <div class="input-group">
                <input name="birthday" type="date" placeholder="Birth day" class="input"  required
                value="<?php echo $data['birthday']; ?>">
            </div>
            <div class="input-group">
                <input name="homeaddress" type="text" placeholder="Home Address" class="input"  required
                value="<?php echo $data['homeaddress']; ?>">
            </div>

            <div class="input-group">
                <input name="occupation" type="text" placeholder="Occupation" class="input"  required
                value="<?php echo $data['occupation']; ?>">
            </div>
            <div class="input-group">
                <input name="workaddress" type="text" placeholder="Work Address" class="input"  required
                value="<?php echo $data['workaddress']; ?>">
            </div>
            <div class="input-group">
                <input name="email" type="email" placeholder="Email" class="input"  required
                value="<?php echo $data['email']; ?>">
            </div>

            <div class="form-field">
                <div class="input-group1">
                    <input name="contact" type="text" placeholder="Contact Number" class="input" required
                    value="<?php echo $data['contact']; ?>">
                </div>
            </div>
            <div class="input-group">
            <span class="error"><?php echo $data['password_err']; ?></span>
                <input name="password" type="password" placeholder="Password" class="input"  required>
            </div>
            <br>
            <input name="submit" type="submit"  class="btn1" value="Add Lecturer"><br>
        </form>
    </div>
</div>
<?php require APPROOT . '/views/includes/footer.php'; ?>
