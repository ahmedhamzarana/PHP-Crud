<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Bootstrap Table Example</title>
</head>
<body>
    <div class="container-fluid mt-5">
        <h1 class="text-center py-2 display-5 fw-bold">Bootstrap Responsive Table</h1>
        <div class="row">
            <div class="col-lg-12">
            <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Aproval</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php include('config.php') ;
                        $Query = "SELECT * FROM `users`";
                        $execute = mysqli_query($db, $Query); 
                        foreach($execute as $row) {
                    
                    ?>
                    <tr class="text-center">
                       <td><?php echo $row['userId']; ?></td>
                       <td><?php echo $row['userName']; ?></td>
                       <td><?php echo $row['userEmail']; ?></td>
                       <td><?php echo $row['userPassword']; ?></td>
                       <td><img src="assets/images/<?php echo $row['userImage']; ?>" class="img-fluid" width="100" height="50"></td>
                       <td><?php echo $row['STATUS']; ?></td>

                       <td>
                                   " class="btn-sm btn-info btn" >Aprove</a>
                                 class="btn-sm btn-warning btn" >Not Aprove</a>
                       </td>
                       <td>
                           <a href="edit.php?id=<?php echo $row['userId'];?>" class="btn-sm btn-success btn" >Edit</a>
                           <a href="delete.php?id=<?php echo $row['userId'];?>  " class="btn-sm btn-danger btn" >Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
