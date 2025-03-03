<?php
$db=mysqli_connect("localhost","root","","lawyer");
if(!$db) {
    echo"<script>alert('database is not connected')</script>";
}
?>