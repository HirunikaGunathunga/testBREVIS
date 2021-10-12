<?php require APPROOT . '/views/includes/header.php'; ?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/nav.css">
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/a.css">
</head>
<body class="stu-body">
<?php require APPROOT . '/views/includes/navbar.php'; ?>
<br>
        <div class="rect"></div>
        <div id="container-4">
            <img src="<?php echo URLROOT; ?>/img/propic.svg" alt="Avatar" class="propic">
            <div class="stu-details">
                <ul>
                    <li>Name</li>
                    <li>Detail 1</li>
                    <li>Detail 2</li>
                </ul>
            </div>
        </div>
        <div id="student">
            <fieldset>
                <legend> COURSE</legend>
                <div id="container-1">
                    <h2 class="course-h"><i class="fas fa-book-reader"></i> Your Courses</h2>
                    <div class="box-1">
                        <button onclick="ShowAndHide()" class="stu-course" id="st"> Course 1</button>
                        <button onclick="ShowAndHide()" class="stu-course"> Course 2</button>
                    </div>
                    <br>
                    <h2 class="course-h"><i class="fas fa-rocket"></i> Recommended Courses</h2>
                    <div class="box-2">
                        <a href="http://www.w3schools.com" class="stu-course">New Course</a>
                    </div>
                </div>
            </fieldset>
            <div id="container-2">
                <div class="box-3">Attendance</div>
                <div class="box-3">Course Modules</div>
                <div class="box-3">Assignment Grades</div>
                <div class="box-3">Contact</div>
            </div>
            <div id="container-3">
               <div class="calender"></div>
                <div class="certificates">Certificates</div>
                <div class="certificates">Batch Transfer</div>
                <div class="fab fa-facebook-messenger"></div>
            </div>
        </div>
        <footer class="stu-footer">
            <img src="<?php echo URLROOT; ?>/img/wave.svg" class="wave-1">
            <div class="footer-content"><i class="fas fa-copyright"></i> GROUP CS23 of UCSC 2nd Year Group Project</div>
        </footer>
<?php require APPROOT . '/views/includes/footer.php'; 