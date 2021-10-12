<?php require APPROOT . '/views/includes/header.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/nav.css">
</head>
<body>
<div>
   <?php require APPROOT . '/views/includes/navbar.php'; ?>
</div>
<img class="wave" src="<?php echo URLROOT; ?>/img/wave.svg">
<div class="container">
        <div class="img">
            <img src="<?php echo URLROOT; ?>/img/c_update.svg">
        </div>
    <div class="login-content1">
        <form class="lform" action="<?php echo URLROOT; ?>/courses/updatecourse/<?php echo $data['course_id']; ?>" method="POST">
            <h2 class="title">Update Course</h2>
            <h3 class="title"><?php echo $data['course_id']; ?> - <?php echo $data['course_name']; ?></h3><br>
            <div class="input-group3">
            <br>
                <div class="namebox">
                <h3>Course Name</h3>
                <span class="error"><?php echo $data['course_name_err']; ?></span>
                <input name="course_name" type="text" placeholder="Course Name" class="input"  required
                    value="<?php echo $data['course_name']; ?>">
                    </div>
            </div>
            <div class="input-group3">
            <br>
                <div class="namebox">
                <h3>Duration</h3>
                <span class="error"><?php echo $data['duration_err']; ?></span>
                <input name="duration" type="text" placeholder="Duration" class="input"  required
                    value="<?php echo $data['duration']; ?>">
                </div>
            </div>
            <div class="input-group3">
            <br>
                <div class="namebox">
                <h3>Recomended Course 1</h3>
                <span class="error"><?php echo $data['recomended_err1']; ?></span>
                <input name="recomended_course1" type="text" placeholder="Recomended Course 1" class="input"  
                    value="<?php echo $data['recomended_course1']; ?>">
                </div>
            </div>
            <div class="input-group3">
            <br>
                <div class="namebox">
                <h3>Recomended Course</h3>
                <span class="error"><?php echo $data['recomended_err2']; ?></span>
                <input name="recomended_course2" type="text" placeholder="Recomended Course 2" class="input"  
                    value="<?php echo $data['recomended_course2']; ?>">
                </div>
            </div>
            <br>
            <input name="submit" type="submit"  class="btn1" value="Update Course">
            </form>
            
    </div>
</div>
<?php require APPROOT . '/views/includes/footer.php'; ?>
