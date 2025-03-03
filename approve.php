<?php

include 'config.php'; 


$userid = $_GET['id'];


$Query = "UPDATE `users` SET `STATUS`=1 WHERE `userId`=$userid "; 

$execute = mysqli_query($db, $Query); 

if ($execute) {
    echo "<script>alert('You are Aprooved');</script>";
    echo "<script>window.location.href='view.php';</script>";
} else {
    echo "<script>alert('You are not Aprooved');</script>";
    echo "<script>window.location.href='view.php';</script>";
}

?>
