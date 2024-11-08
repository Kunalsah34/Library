<?php
session_start();

// Check if the user is logged in; if not, redirect to login page
if (!isset($_SESSION['student_id'])) {
    header("Location: studentDashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="nav.css">

    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #d7e1ec, #f5f7fa);
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .navbar {
            background-color: #2c3e50;
            overflow: hidden;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .navbar-brand {
            color: #ecf0f1;
            text-decoration: none;
            font-size: 24px;
            display: flex;
            align-items: center;
        }

        .navbar-brand img {
            height: 40px;
            width: auto;
            margin-right: 10px;
        }

        .nav-links {
            list-style-type: none;
            display: flex;
            align-items: center;
        }

        .nav-link {
            color: #ecf0f1;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s;
            font-size: 18px;
        }

        .nav-link:hover {
            background-color: #34495e;
        }

        .logout-button {
            color: #fff;
            background-color: #e74c3c;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 18px;
            margin-left: 15px;
            transition: background-color 0.3s;
        }

        .logout-button:hover {
            background-color: #c0392b;
        }

        h1 {
            text-align: center;
            font-size: 32px;
            color: #2c3e50;
            margin-top: 30px;
            font-weight: bold;
        }

        .section {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            background-color: #fff;
            padding: 25px;
            margin: 25px auto;
            width: 80%;
            max-width: 700px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .section h2 {
            color: #2980b9;
            font-size: 28px;
            margin-bottom: 15px;
            font-weight: 600;
        }

        .section p {
            font-size: 16px;
            color: #7f8c8d;
            margin-bottom: 20px;
            text-align: center;
        }

        button {
            padding: 12px 25px;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 18px;
            font-weight: 600;
            transition: background-color 0.3s, transform 0.3s;
            box-shadow: 0 4px 8px rgba(52, 152, 219, 0.3);
        }

        button:hover {
            background-color: #2980b9;
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(52, 152, 219, 0.4);
        }

        footer {
            background-color: #2c3e50;
            color: #ecf0f1;
            padding: 15px;
            text-align: center;
            position: relative;
            margin-top: 140px;
            bottom: 0px;
            width: 100%;
            box-shadow: 0 -4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

    <div class="navbar">
        <a href="#" class="navbar-brand"><img src="https://img.icons8.com/ios-filled/50/000000/library.png" alt="eLibrary">Library</a>
        <ul class="nav-links">
            <li><a href="../admin/adminLogin.php" class="nav-link">Admin</a></li>
            <li><a href="studentDashboard.php" class="nav-link">Student</a></li>
            <li><a href="../showBook.php" class="nav-link">Show Books</a></li>
            <li><a href="#" class="nav-link">About Us</a></li>
            <li><a href="#" class="nav-link">Contact</a></li>
            <li><a href="logout.php" class="logout-button">Logout</a></li>
        </ul>
    </div>

    <h1>Welcome to the Student Dashboard</h1>

    <section id="show-books" class="section">
        <h2>Browse Our Library</h2>
        <p>Discover and explore books available in our library collection.</p>
        <button onclick="location.href='../showBook.php'">Show Books</button>
    </section>
    <section id="show-books" class="section">
        <h2>Browse Your Borrowed Books</h2>
        <p>Discover and explore books available in your collection.</p>
        <button onclick="location.href='./borrowedBooks.php'">Show Books</button>
    </section>

    <footer>
        <p>&copy; 2024 Library Management System. All rights reserved. Developed by Kunal Sah</p>
    </footer>

</body>
</html>
