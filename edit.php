<?php
include('config.php');
$userid = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .form-container {
            max-width: 900px;
            width: 100%;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2 class="text-center text-dark mb-4">Update Form</h2>

        <?php 
        $Query = "SELECT * FROM `users` WHERE `userId`=$userid"; 
        $execute = mysqli_query($db, $Query);
        
        foreach($execute as $row){
        ?>
        <form method="post" action="" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" required value="<?php echo $row['userName']; ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" required value="<?php echo $row['userEmail']; ?>">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="pass" required value="<?php echo $row['userPassword']; ?>">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="image" class="form-label">Profile Image</label>
                    <input type="file" class="form-control" name="image" required>
                </div>
                <div class="col-12 text-center">
                    <input type="submit" class="btn btn-primary" value="Update" name="updbtn">
                </div>
            </div>
        </form>
        <?php
        } 
        ?>
    </div>

<?php     
if(isset($_POST['updbtn'])){ 
    $Name = $_POST['name'];
    $Email = $_POST['email'];
    $Pass = $_POST['pass'];
    $Image = $_FILES['image']['name'];
    $TempImage = $_FILES['image']['tmp_name'];
    
    move_uploaded_file($TempImage, 'assets/images/'.$Image);

    $uery = "UPDATE `users` SET `userName`='$Name', `userEmail`='$Email', `userPassword`='$Pass', `userImage`='$Image' WHERE `userId` = $userid";
    
    $xecute = mysqli_query($db, $uery);
    if($xecute){
        echo "<script>alert('Data is updated');</script>";
        echo "<script>window.location.href='register.html';</script>";
    } else {
        echo "<script>alert('Data is not updated);</script>";
    }
}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>