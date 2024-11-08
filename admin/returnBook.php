<?php
// Database connection (replace with your own credentials)
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'eLibrary';

$mysqli = new mysqli($host, $user, $password, $database);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Initialize message variable
$message = '';

// Handle the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data and sanitize it
    $registrationNo = $mysqli->real_escape_string($_POST['registrationNo']);
    $isbn = $mysqli->real_escape_string($_POST['isbn']);

    // Check if the student is registered
    $studentQuery = "SELECT * FROM students WHERE registration_number = '$registrationNo'";
    $studentResult = $mysqli->query($studentQuery);

    if ($studentResult->num_rows == 0) {
        $message = 'Student not registered.';
    } else {
        // Check if the book is borrowed by the student
        $borrowQuery = "SELECT * FROM borrowed_books WHERE registration_number = '$registrationNo' AND isbn = '$isbn'";
        $borrowResult = $mysqli->query($borrowQuery);

        if ($borrowResult->num_rows == 0) {
            $message = 'This book has not been borrowed by this student.';
        } else {
            // Return the book (increase the quantity)
            $bookQuery = "SELECT * FROM books WHERE isbn = '$isbn'";
            $bookResult = $mysqli->query($bookQuery);
            $bookData = $bookResult->fetch_assoc();
            $newQuantity = $bookData['quantity'] + 1;

            $updateQuery = "UPDATE books SET quantity = $newQuantity WHERE isbn = '$isbn'";
            if ($mysqli->query($updateQuery)) {
                // Delete the record from borrowed_books table
                $deleteQuery = "DELETE FROM borrowed_books WHERE registration_number = '$registrationNo' AND isbn = '$isbn'";
                $mysqli->query($deleteQuery);

                $message = 'Book returned successfully.';
            } else {
                $message = 'Error returning the book.';
            }
        }
    }
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Return Book</title>
    <link rel="stylesheet" href="nav.css">
    <style>

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #f0f4f8, #d9e2ec);
            color: #333;
            display: flex;
            flex-direction: column;
        }

        .navbar {
            background-color: #2c3e50;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            color: #ecf0f1;
            font-size: 24px;
            font-weight: bold;
            text-decoration: none;
        }

        .nav-links {
            list-style: none;
            display: flex;
        }

        .nav-link {
            padding: 10px 15px;
            color: #ecf0f1;
            text-decoration: none;
            border-radius: 5px;
            margin-left: 10px;
            font-size: 18px;
            transition: background-color 0.3s;
        }

        .nav-link:hover {
            background-color: #34495e;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            margin-top: 40px;
            font-size: 36px;
            font-weight: 600;
            display: inline-block;
            width: calc(100% - 80px); 
        }

        .back-btn {
            background-color: #3498db;
            color: white;
            padding: 8px 16px;
            font-size: 14px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s, transform 0.3s;
            display: inline-block;
            vertical-align: top;
        }

        .back-btn:hover {
            background-color: #2980b9;
            transform: translateY(-2px);
        }

        .form-container {
            width: 50%;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
        }

        label {
            font-size: 18px;
            margin-bottom: 10px;
            color: #2c3e50;
        }

        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0 20px 0;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        button[type="submit"] {
            background-color: #3498db;
            color: white;
            padding: 12px 30px;
            font-size: 18px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #2980b9;
            transform: translateY(-2px);
        }


        #message {
            color: red;
            font-size: 18px;
            text-align: center;
            margin-top: 20px;
        }

        footer {
            text-align: center;
            margin-top: auto;
            padding: 12px;
            background-color: #2c3e50;
            color: #fff;
        }

        @media (max-width: 768px) {
            .form-container {
                width: 80%;
                padding: 15px;
            }

            h1 {
                font-size: 28px;
            }
        }
    </style>
</head>
<body>

    <div class="navbar">
        <a href="#" class="navbar-brand">Library Admin</a>
        <ul class="nav-links">
            <li><a href="adminLogin.php" class="nav-link">Admin</a></li>
            <li><a href="index.php" class="nav-link">Student</a></li>
            <li><a href="showBook.php" class="nav-link">Show Books</a></li>
            <li><a href="#" class="nav-link">About Us</a></li>
            <li><a href="#" class="nav-link">Contact</a></li>
        </ul>
    </div>


    <h1>Return Book <a href="adminDashboard.php" class="back-btn">Back </a></h1>

 
    <div class="form-container">
        <form action="returnBook.php" method="POST">
            <label for="registrationNo">Registration No:</label>
            <input type="text" id="registrationNo" name="registrationNo" required>

            <label for="isbn">ISBN:</label>
            <input type="text" id="isbn" name="isbn" required>

            <button type="submit">Return Book</button>
        </form>

        <?php if ($message) : ?>
            <p id="message"><?php echo $message; ?></p>
        <?php endif; ?>
    </div>

    <footer>
        <p>&copy; 2024 Library Management System | Developer Kunal Sah</p>
    </footer>

</body>
</html>
