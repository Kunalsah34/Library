<?php
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    // If not logged in, redirect to the login page
    header("Location: adminLogin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href='../assets/css/adminDashboard.css'>
</head>
<body>

    <div class="navbar">
        <a href="./adminDashboard.php" class="navbar-brand"><img src="https://img.icons8.com/ios-filled/50/000000/library.png" alt="eLibrary"></a>
        <ul class="nav-links">
            <li><a href='../showBook.php' class="nav-link">Show Books</a></li>
            <!-- <li><a href='../showBook.php' class="nav-link">Show Books</a></li> -->

            <li><a href="adminLogin.php" class="nav-link" id="logout">Logout</a></li>
            
        </ul>
    </div>


    <h1>Welcome to the Admin Dashboard</h1>

    <div class="dashboard-container">
        <div class="section">
            <h2>Manage Students</h2>
            <p>Here you can add, update, or delete student records.</p>
            <a href="registerStudent.php"><button>Register New Student</button></a>
        </div>

        <div class="section">
            <h2>Manage Books</h2>
            <p>Here you can add new books to the library.</p>
            <a href="addBook.php"><button>Add New Book</button></a>
        </div>

        <div class="section">
            <h2>Issue/Return Books</h2>
            <p>Here you can issue and return books to/from students.</p>
            <a href="borrowBook.php"><button>Issue Book</button></a>
            <a href="returnBook.php"><button>Return Book</button></a>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Library Management System | Developer Kunal Sah</p>
    </footer>

</body>
</html>
