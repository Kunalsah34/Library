<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eLibrary";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT isbn, title, author, quantity FROM books";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System - Show Books</title>
    <link rel="stylesheet" href="./assets/css/showBook.css">

    
</head>

<body>

    <div class="navbar">
        <a href="#" class="navbar-brand"><img src="https://img.icons8.com/ios-filled/50/000000/library.png" alt="eLibrary">Library</a>
        <ul class="nav-links">
            <li><a href="./admin/adminLogin.php" class="nav-link">Admin</a></li>
            <li><a href="./" class="nav-link">Student</a></li>
            <li><a href="./showBook.php" class="nav-link">Show Books</a></li>
            <li><a href="#" class="nav-link">About Us</a></li>
            <li><a href="#" class="nav-link">Contact</a></li>
        </ul>
    </div>

    <div class="body1">
        <h1>Library Books
            <button class="back-button" onclick="history.back()">Back</button>
        </h1>
        <table>
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>ISBN</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    $index = 1;
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$index}</td>
                                <td>{$row['isbn']}</td>
                                <td>{$row['title']}</td>
                                <td>{$row['author']}</td>
                                <td>{$row['quantity']}</td>
                              </tr>";
                        $index++;
                    }
                } else {
                    echo "<tr><td colspan='5'>No books found</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <footer>
        <p>&copy; 2024 Library Management System. All rights reserved. Developed by Kunal Sah</p>
    </footer>

</body>
</html>
