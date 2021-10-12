<?php require APPROOT . '/views/includes/header.php'; ?>
<?php
$controller = $_SESSION['controller'];
//$email = $_SESSION['user_email'];
switch($controller){
   case "student":
        ?>
        <?php include APPROOT.'/views/student/index.php' ?>
        <?php
        break;
        
        case "admin":  // Admin's sidebar elements
        ?>
        <?php redirect('admin/index'); ?>
        <?php
        break;

        case "lecturers":  // The Lecturer's dashboard
        ?>
        <?php //include' ?>
        <?php
        break;

        case "cm":  // Courses Manager's Dashboard
        ?>
        <?php //include ?>
        <?php
        break;

}

?>