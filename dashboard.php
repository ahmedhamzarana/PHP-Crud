<?php
    session_start();
    if (isset($_SESSION["email"]) && $_SESSION["pass"]){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Bootstrap Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            height: 100vh;
        }
        .sidebar {
            min-height: 100vh;
            background-color: #343a40;
            color: white;
        }
        .sidebar a {
            color: white;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .profile-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }
        .toggle-btn{
            display: none;
        }
        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                top: 0;
                left: -250px; /* Hide sidebar */
                transition: left 0.3s ease;
                z-index: 1000;
            }
            .sidebar.active {
                left: 0; /* Show sidebar */
            }
            .toggle-btn {
                
                position: absolute;
                top: 15px;
                left: 15px;
            }
        }
    </style>
</head>
<body>

    <div class="sidebar p-3">
        <h2>Dashboard</h2>
        <nav class="nav flex-column">
            <a class="nav-link" href="#">Dashboard Home</a>
            <a class="nav-link" href="#">Reports</a>
            <a class="nav-link" href="#">Analytics</a>
            <a class="nav-link" href="#">Settings</a>
            <a class="nav-link" href="#">Help/Support</a>
        </nav>
    </div>

    <div class="flex-grow-1 p-3">
        <button class="btn btn-primary toggle-btn" id="toggleSidebar">☰</button>
        <div class="d-flex justify-content-between align-items-center mt-3">
            <h1>Welcome to Your Dashboard</h1>
            <div class="d-flex align-items-center">
                <img src="assets/images/<?php echo $_SESSION['p']; ?>" alt="Profile Image" class="profile-img">
                <span class="ml-2"><?php echo $_SESSION['n']; ?></span>
                <a href="logout.php" class="btn btn-sm btn-danger ml-3">logout</a>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Sales Overview</h5>
                        <p class="card-text">Here you can view your sales data.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">User Engagement</h5>
                        <p class="card-text">Track user engagement metrics here.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Recent Activity</h5>
                        <p class="card-text">See the latest activity in your account.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Analytics Graph</h5>
                        <p class="card-text">Visual representation of your data.</p>
                    </div>
                </div>
            </div>
        </div>

        <footer class="mt-4 text-center">
            <p>Privacy Policy | Terms of Service</p>
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        const toggleSidebar = document.getElementById('toggleSidebar');
        const sidebar = document.querySelector('.sidebar');

        toggleSidebar.addEventListener('click', () => {
            sidebar.classList.toggle('active');
        });
    </script>
</body>
</html>
<?php
    }else{
        echo"<script>window.location.href='login.php'</script>";
    }
?>