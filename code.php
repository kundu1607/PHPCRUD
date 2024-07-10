<?php
session_start();
include 'dbconn.php';

// insert data

if (isset($_POST['save-data'])) {

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $course = mysqli_real_escape_string($con, $_POST['course']);

    $qry = " INSERT  INTO student (name,email,phone,course) value ('$name','$email','$phone','$course')";
    $qry_run = mysqli_query($con, $qry);

    if ($qry_run) {
        $_SESSION['message'] = 'student data saved succesfully';
        header("Location: index.php");
        exit(0);
    } else {
        $_SESSION['message'] = 'student data not saved ';
        exit(0);
    }

}


// update data

if (isset($_POST['update-data'])) {


    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $course = mysqli_real_escape_string($con, $_POST['course']);

    $qry = "UPDATE student SET name='$name', email='$email', phone='$phone', course='$course' WHERE id='$student_id'";
    $qry_run = mysqli_query($con, $qry);

    if ($qry_run) {
        $_SESSION['message'] = 'student data update succesfully';
        exit(0);
    } else {
        $_SESSION['message'] = 'student data not update ';
        exit(0);
    }
}


// delect 

$del_id = $_GET['id'];

$qry = "DELETE FROM `student` WHERE id='$del_id'";
$qry_run = mysqli_query($con, $qry);
if ($qry_run) {
    // echo "data delect succesfully";
    header("Location: index.php");
} else {
    echo "no data delect";
}


?>