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
    <?php flash('course_register_success'); ?>
   </div>
<div class="container">
    <div class="img">
        <img src="<?php echo URLROOT; ?>/img/course.svg">
    </div>
    <div class="login-content">
        <form class="lform" action="<?php echo URLROOT; ?>/courses/addcourse" method="POST">
            <h2 class="title">Add Course</h2>
            <div class="input-group">
                <span class="error"><?php echo $data['course_id_err']; ?></span>
                <input name="course_id" type="text" placeholder="Course ID" class="input"  required 
                    value="<?php echo $data['course_id']; ?>">
            </div>
            <div class="input-group">
                <span class="error"><?php echo $data['course_name_err']; ?></span>
                <input name="course_name" type="text" placeholder="Course Name" class="input"  required
                    value="<?php echo $data['course_name']; ?>">
            </div>
            <div class="input-group">
                <span class="error"><?php echo $data['duration_err']; ?></span>
                <input name="duration" type="text" placeholder="Duration" class="input"  required
                    value="<?php echo $data['duration']; ?>">
            </div>
            <div class="input-group">
                <span class="error"><?php echo $data['recomended_err1']; ?></span>
                <input name="recomended_course1" type="text" placeholder="Recomended Course 1" class="input"  
                    value="<?php echo $data['recomended_course1']; ?>">
            </div>
            <div class="input-group">
                <span class="error"><?php echo $data['recomended_err2']; ?></span>
                <input name="recomended_course2" type="text" placeholder="Recomended Course 2" class="input"  
                    value="<?php echo $data['recomended_course2']; ?>">
            </div>
            <br>
            <input name="submit" type="submit"  class="btn1" value="Add Course"><br>
        </form>
    </div>
</div>
<?php require APPROOT . '/views/includes/footer.php'; ?>
