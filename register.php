<?php 
    include('config.php');
    
    if(isset($_POST['Regbtn'])){ 
        $Name = $_POST['name'];
        $Email = $_POST['email'];
        $Pass = $_POST['pass'];
        
        $Image = $_FILES['image']['name'];
        $TempImage = $_FILES['image']['tmp_name'];
        move_uploaded_file($TempImage ,'assets/images/'.$Image);

        $Query = "INSERT INTO `users`(`userName`, `userEmail`, `userPassword`, `userImage`) 
        VALUES ('$Name','$Email','$Pass','$Image')";
        
        

        $execute = mysqli_query($db, $Query); 
        if($execute){
            echo "<script> alert('data is inserted') </script>";
            echo"<script>window.location.href='login.php'</script>";
        }else{
            echo "<script> alert('data is not inserted') </script>";
            echo"<script>window.location.href='register.php'</script>";

        }
    };
?>