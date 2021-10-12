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
        <img src="<?php echo URLROOT; ?>/img/c_view.svg">
    </div>
    <div class="login-content">
    <form class="lform1">
            <h2 class="title"><?php echo $data['course']->course_id; ?> - <?php echo $data['course']->course_name; ?></h2>
            <div class="input-group3">
                <br>
                <div class="namebox">
                <h3>Course ID</h3>
                <input  value="<?php echo $data['course']->course_id; ?>">
                <br>
                </div>
            </div>
            <br><br>
            <div class="input-group3">
                <br>
                <div class="namebox">
                <h3>Course Name</h3>
                <input  value="<?php echo $data['course']->course_name; ?>">
                <br>
                </div>
            </div>
            <br><br>
            <div class="input-group3">
                <br>
                <div class="namebox">
                <h3>Duration</h3>
                <input  value="<?php echo $data['course']->duration; ?>">
                <br>
                </div>               
            </div>
            <br><br>
            <div class="input-group3">
                <br>
                <div class="namebox">
                <h3>Recomended Courses</h3>
                <?php foreach($data['recomended'] as $recomended) : ?>
                <input  value="<?php echo $recomended->recomended_course; ?>">
                <br>
                </div>
                <?php endforeach; ?> 
            </div>
        </form>
    </div>
</div>
<?php require APPROOT . '/views/includes/footer.php'; ?>
