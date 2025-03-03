<?php
    session_start();
   
    session_cache_expire();
    session_destroy();
    session_unset();

    echo "<script>alert('You Are Logout');</script>";
    echo "<script>window.location.href='login.php';</script>";
?>