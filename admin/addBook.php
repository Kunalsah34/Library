<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'eLibrary';

$mysqli = new mysqli($host, $user, $password, $database);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $isbn = $mysqli->real_escape_string($_POST['isbn']);
    $title = $mysqli->real_escape_string($_POST['title']);
    $author = $mysqli->real_escape_string($_POST['author']);
    $quantity = (int)$_POST['quantity'];


    $query = "INSERT INTO books (isbn, title, author, quantity) VALUES ('$isbn', '$title', '$author', '$quantity')";

    if ($mysqli->query($query)) {

        header("Location: addBookSuccess.php");
        exit;
    } else {
        echo "Error: " . $mysqli->error;
    }
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>
    <link rel="stylesheet" href="../assets/css/addBook.css">
</head>
<body>


    <div class="navbar">
        <a href="./adminDashboard.php" class="navbar-brand">Library Admin</a>
        <ul class="nav-links">
            <li><a href="adminLogin.php" class="nav-link">Admin</a></li>
            <li><a href="index.php" class="nav-link">Student</a></li>
            <li><a href="showBook.php" class="nav-link">Show Books</a></li>
            <li><a href="#" class="nav-link">About Us</a></li>
            <li><a href="#" class="nav-link">Contact</a></li>
        </ul>
    </div>

    <h1>Add Book</h1>

    <div class="form-container">
        <form action="addBook.php" method="POST">
            <label for="isbn">ISBN:</label>
            <input type="text" id="isbn" name="isbn" required>

            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>

            <label for="author">Author:</label>
            <input type="text" id="author" name="author" required>

            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" required>

            <button type="submit">Add Book</button>
        </form>
    </div>

    <footer>
        <p>&copy; 2024 Library Management System | Developer Kunal Sah</p>
    </footer>

</body>
</html>
