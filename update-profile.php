<?php
session_start();
include "db_conn.php";

if (isset($_SESSION['id']) && isset($_POST['name']) && isset($_POST['uname']) && isset($_POST['email']) && isset($_POST['bday'])) {
    $user_id = $_SESSION['id'];
    $name = $_POST['name'];
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $bday = $_POST['bday'];

    $sql = "UPDATE users SET name='$name', user_name='$uname', email='$email', birthday='$bday' WHERE id=$user_id";
    $result = mysqli_query($con, $sql);

    if ($result) {
        // Redirect to home page after successful update
        header("Location: home.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }
} else {
    // Redirect to edit profile page if session or POST data is not set
    header("Location: edit-profile.php");
    exit();
}
?>
