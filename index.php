<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eLibrary";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);


$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $registrationNo = $_POST['registrationNo'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM students WHERE registration_number = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $registrationNo);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $student = $result->fetch_assoc();
        if (password_verify($password, $student['password'])) {
            $_SESSION['student_id'] = $student['id'];
            header("Location: student/studentDashboard.php");
            exit();
        } else {
            $error_message = "Invalid password.";
        }
    } else {
        $error_message = "No student found with this registration number.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
    <link rel="stylesheet" href='./assets/css/index.css'>
</head>
<body>

    <div class="navbar">
        <a href="#" class="navbar-brand"><img src="https://img.icons8.com/ios-filled/50/000000/library.png" id=logo alt="eLibrary">Library</a>
        <ul class="nav-links">
            <li><a href="./admin/adminLogin.php" class="nav-link">Admin</a></li>
            <li><a href="./" class="nav-link">Student</a></li>
            <li><a href="./showBook.php" class="nav-link">Show Books</a></li>
            <li><a href="#" class="nav-link">About Us</a></li>
            <li><a href="#" class="nav-link">Contact</a></li>
        </ul>
    </div>

    <div class="container">
        
        <div class="login-page">
            <h2>Login</h2>

                <?php if (!empty($error_message)): ?>
                    <p id="error"><?php echo $error_message; ?></p>
                <?php endif; ?>
            <form action="index.php" method="POST">
                <label for="registrationNo">Registration No:</label>
                <input type="text" id="registrationNo" name="registrationNo" required><br><br>
                
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required><br><br>
                
                

                <button type="submit">Login</button>
            </form>
            <p class="register-message">If you have not membership, please click to <a href="#">Register</a></p>
        </div>

        <div class="library-info">
            <h2>Library Information</h2>
            <p><strong>Opening Hours:</strong> Monday - Friday: 8:00 AM - 11:00 PM</p>
            <p><strong>Closing Days:</strong> Saturday, Sunday</p>
            <p><strong>Contact:</strong> lpu@library.com</p>
            <p><strong>Address:</strong> Lovely Professional University, Phagwara, India</p>
        </div>
    </div>

 
    <footer>
        <p>&copy; 2024 Admin Dashboard. All rights reserved. Developer Kunal Sah</p>
    </footer>
</body>
</html>
