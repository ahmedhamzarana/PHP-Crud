<?php 
    session_start();        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        
        .login-form {
            max-width: 400px;
            margin: auto; /* Centering horizontally */
            padding: 20px;
            border: 1px solid #ccc; /* Optional border */
            border-radius: 5px; /* Optional rounded corners */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Optional shadow */
        }
    </style>
    <title>Login Form</title>
</head>
<body>

<div class="container">
    <h2 class="mt-5 text-center">Login</h2>
    <div class="login-form">
        <form method="post">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" required name="email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password" required name="pass">
            </div>
            <input type="submit" class="btn btn-primary btn-block" value="Login" name="loginbtn">
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php 
    include('config.php');
      
    if(isset($_POST['loginbtn'])){

        $Email = $_POST['email'];
        $Pass = $_POST['pass'];

        $Query = "SELECT * FROM `users` WHERE `userEmail`='$Email' and `userPassword`='$Pass'";   
        $execute = mysqli_query($db, $Query);
        if($result=mysqli_fetch_assoc($execute))
        {
            $_SESSION['n']=$result['userName'];
            $_SESSION['p']=$result['userImage'];
            $_SESSION['email']=$result['userEmail'];
            $_SESSION['pass']=$result['userPassword'];

            echo "<script> alert('You are Logged in') </script>";
            echo"<script>window.location.href='dashboard.php'</script>";
        }else{
            echo "<script> alert('Please check Your Field') </script>";
            echo"<script>window.location.href='login.php'</script>";

        }
    };
?>