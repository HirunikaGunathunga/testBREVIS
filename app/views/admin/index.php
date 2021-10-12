<?php require APPROOT . '/views/includes/header.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/nav.css">
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/a.css">
</head>
<div>
   <?php require APPROOT . '/views/includes/navbar.php'; ?>
</div>
<?php flash('delete_message'); ?><?php flash('course_update_success'); ?>
<div class="d">
</div>
<body>   
<div class="con">
    <div class="tab">
      <button class="tablinks" onmouseover="openCity(event, 'Students')"><i class="fas fa-user-graduate fa-3x"></i><div class="e"><h5>Students</h5></div></button>
      <button class="tablinks" onmouseover="openCity(event, 'Courses')"><i class="fas fa-book-open fa-3x"></i><div class="e"><h5>Courses</h5></div></button>
      <button class="tablinks" onmouseover="openCity(event, 'Lecturers')"><i class="fas fa-chalkboard-teacher fa-3x"></i><div class="e"><h5>Lecturers</h5></div></button>
      <button class="tablinks" onmouseover="openCity(event, 'Batches')"><i class="fas fa-users fa-3x"></i><div class="e"><h5>Batches</h5></div></button>
    </div>

    <div id="Students" class="tabcontent">
        <div>
            <li class="btn-a">
            <a href="<?php echo URLROOT; ?>/courses/addcourse"><h3>Add Student</h3></a>
            </li>
        </div>
    </div>

    <div id="Courses" class="tabcontent">
      <div>
        <div class="cover">
            <div class="ab">
                <li class="btn-a">
                    <a href="<?php echo URLROOT; ?>/courses/addcourse"><h3>Add Course</h3></a>
                </li>
            </div>
            <div class="ab1">
                <div class="search-container">
                    <form action="<?php echo URLROOT; ?>/courses/searchcourse" method="POST">
                    <input type="text" placeholder="Search by Course ID.." name="search" required>
                    <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
          
                <?php foreach($data['courses'] as $course) : ?>
                    <div class="card-frame">
                        <div class="card">
                            <div class="book">
                            <a href="<?php echo URLROOT; ?>/courses/viewcourse/<?php echo $course->course_id; ?>" >
                            <img src="<?php echo URLROOT; ?>/img/book.svg">
                            </a>
                            </div>
                            <div>
                                <h4> <?php echo $course->course_name; ?> : <?php echo $course->course_id; ?></h4>
                            </div>
                        </div>
                        <div>
                            <div class="btn-a1">
                            <a href="<?php echo URLROOT; ?>/courses/updatecourse/<?php echo $course->course_id; ?>"><h4>Update</h4></a>
                            </div>
                            <div class="btn-a2">
                            <a href="<?php echo URLROOT; ?>/courses/deletecourse/<?php echo $course->course_id; ?>"><h4>Delete</h4></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?> 
      </div>
    </div>

    <div id="Lecturers" class="tabcontent">
        <div>
            <div class="cover">
            <div class="ab">
                <li class="btn-a">
                    <a href="<?php echo URLROOT; ?>/courses/addcourse"><h3>Add Lecturer</h3></a>
                </li>
            </div>
            <div class="ab1">
                <div class="search-container">
                    <form action="<?php echo URLROOT; ?>/courses/searchcourse" method="POST">
                    <input type="text" placeholder="Search by Lecturer ID.." name="search" required>
                    <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
          
                <?php foreach($data['courses'] as $course) : ?>
                    <div class="card-frame">
                        <div class="card">
                            <div class="book">
                            <a href="<?php echo URLROOT; ?>/courses/viewcourse/<?php echo $course->course_id; ?>" >
                            <div class="lec"><img src="<?php echo URLROOT; ?>/img/lec.png"></div>
                            </a>
                            </div>
                            <div>
                            <br><h4> <?php echo $course->course_name; ?> : <?php echo $course->course_id; ?></h4>
                            </div>
                        </div>
                        <div>
                            <div class="btn-a1">
                            <a href="<?php echo URLROOT; ?>/courses/updatecourse/<?php echo $course->course_id; ?>"><h4>Update</h4></a>
                            </div>
                            <div class="btn-a2">
                            <a href="<?php echo URLROOT; ?>/courses/deletecourse/<?php echo $course->course_id; ?>"><h4>Delete</h4></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
        </div>
    </div>

    <div id="Batches" class="tabcontent">
        <div>
            <li class="btn-a">
            <a href="<?php echo URLROOT; ?>/courses/addcourse"><h3>Add Batch</h3></a>
            </li>
        </div>
    </div>
</div>

<div class="c">
    <div class="announcement">
        <div class="con1">
          <div class="ahead">
          <h4>Announcements</h4>
          </div>
        </div>
        <div class="abody">
        </div>
    </div>
</div>


<div class="clearfix"></div>

<?php require APPROOT . '/views/includes/footer.php'; ?>
