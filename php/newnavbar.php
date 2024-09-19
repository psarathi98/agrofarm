<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="wrapper">
        <aside id="sidebar" class="js-sidebar">
                    <!-- Content For Sidebar -->
                    <div class="h-100">
                        <div class="sidebar-logo">
                            <a href="index.php">Agrofarm</a>
                        </div>
                        <ul class="sidebar-nav">
                            <li class="sidebar-header">
                                Admin Elements
                            </li>
                            <li class="sidebar-item mt-4">
                                <a href="#" class="sidebar-link collapsed" data-bs-target="#pages" data-bs-toggle="collapse" aria-expanded="false">
                                    <i class="fa-solid fa-list pe-2"></i>
                                    Products
                                </a>
                                <ul id="pages" class="sidebar-dropdown list collapse" data-bs-parent="#sidebar">
                                    <li class="sidebar-item mt-4">
                                        <a href="dashboard.php" class="sidebar-link">view products</a>
                                    </li>
                                    <li class="sidebar-item mt-4">
                                        <a href="newproduct.php" class="sidebar-link">Add new product</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="sidebar-item mt-4">
                                <a href="carousel.php" class="sidebar-link" ><i class="fas fa-fw fa-chart-area pe-2"></i>
                                    carousel
                                </a>
                            
                            </li>
        
                            
                            
                        </ul>
                    </div>
                </aside>


        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom">
                    <button class="btn" id="sidebar-toggle" type="button">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="navbar-collapse navbar">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <i class="fa-regular fa-user h4"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="#" class="dropdown-item">Profile</a>
                                    <a href="#" class="dropdown-item">Setting</a>
                                    <a href="../index.php" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#logoutModal">Logout</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>

                <a href="#" class="theme-toggle">
                <i class="fa-regular fa-sun"></i>
                <i class="fa-regular fa-moon"></i>
            </a>
            
               
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="styles1.js"></script>
</body>
</html>