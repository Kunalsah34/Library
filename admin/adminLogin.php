<?php
session_start();

// Include database connection file
include '../db.php'; // Adjust the path based on your directory structure

// Hardcoded admin credentials (for example)
$adminUsername = "admin"; // Replace with your admin username
$adminPassword = "123"; // Replace with your admin password

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check credentials
    if ($username === $adminUsername && $password === $adminPassword) {
        // Set session variable to indicate the admin is logged in
        $_SESSION['admin_logged_in'] = true;

        // Redirect to the admin dashboard
        header("Location: adminDashboard.php");
        exit();
    } else {
        // Set an error message if login fails
        $errorMessage = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Library Management</title>
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="../assets/css/adminLogin.css">
    
</head>

<body>

    <div class="navbar">
        <a href="#" class="navbar-brand"><img src="https://img.icons8.com/ios-filled/50/000000/library.png" alt="eLibrary">Library</a>
        <ul class="nav-links">
            <li><a href="./adminLogin.php" class="nav-link">Admin</a></li>
            <li><a href="../" class="nav-link">Student</a></li>
            <li><a href="../showBook.php" class="nav-link">Show Books</a></li>
            <li><a href="#" class="nav-link">About Us</a></li>
            <li><a href="#" class="nav-link">Contact</a></li>
        </ul>
    </div>

    <div class="login-container">
        <h1>Admin Login</h1>

        

        <div class="login-form">
            <form action="adminLogin.php" method="POST">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <input type="submit" value="Login">
            </form>

            <?php
                if (isset($errorMessage)) {
                    echo "<p class='error-message'>$errorMessage</p>";
                }
            ?>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Library Management System. All rights reserved. Developed by Kunal Sah</p>
    </footer>

</body>
</html>
