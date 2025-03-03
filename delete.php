<?php

include 'config.php'; 


$userid = $_GET['id'];


$Query = "DELETE FROM `users` WHERE `userId` = $userid"; 

$execute = mysqli_query($db, $Query); 

if ($execute) {
    echo "<script>alert('Data is Deleted');</script>";
    echo "<script>window.location.href='view.php';</script>";
} else {
    echo "<script>alert('Data is not Deleted');</script>";
    echo "<script>window.location.href='view.php';</script>";
}

?>

