<?php
// Database connection
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

// Ensure the student is logged in
if (!isset($_SESSION['student_id'])) {
    header("Location: studentLogin.php");
    exit();
}

$student_id = $_SESSION['student_id'];

// Fetch borrowed books
$sql = "SELECT books.title, books.author, borrowed_books.issue_date, borrowed_books.due_date, borrowed_books.return_date
        FROM borrowed_books
        INNER JOIN books ON borrowed_books.book_id = books.id
        WHERE borrowed_books.student_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $student_id);
$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrowed Books</title>
    <link rel="stylesheet" href="nav.css">
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f4f8;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Navbar */
        .navbar {
            background-color: #2c3e50;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        .navbar-brand {
            color: #ecf0f1;
            font-size: 24px;
            font-weight: bold;
            text-decoration: none;
        }

        .back-btn {
            background-color: #e74c3c;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 18px;
        }

        .back-btn:hover {
            background-color: #c0392b;
        }

        /* Main content */
        main {
            padding: 40px 20px;
            background-color: #fff;
            border-radius: 8px;
            width: 90%;
            max-width: 900px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            margin-left: auto;
            margin-right: auto;
            margin-top: 100px;
        }

        h1 {
            text-align: center;
            font-size: 28px;
            color: #2c3e50;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #2c3e50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .message {
            text-align: center;
            color: red;
            margin-top: 20px;
        }

        /* Footer */
        footer {
            background-color: #2c3e50;
            color: #fff;
            padding: 12px;
            text-align: center;
            margin-top: auto; /* Push footer to the bottom */
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            main {
                padding: 20px;
                width: 90%;
            }

            .navbar-brand {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>

    <div class="navbar">
        <a href="#" class="navbar-brand">eLibrary</a>
        
    </div>

    <main>
        <h1>Borrowed Books
            <a href="studentDashboard.php" class="back-btn" style="font-size: 16px;">Back</a>
        </h1>

        <?php if ($result->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Issue Date</th>
                        <th>Due Date</th>
                        <th>Return Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['author']; ?></td>
                            <td><?php echo $row['issue_date']; ?></td>
                            <td><?php echo $row['due_date']; ?></td>
                            <td><?php echo $row['return_date'] ? $row['return_date'] : 'Not Returned Yet'; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="message">No books borrowed.</div>
        <?php endif; ?>
    </main>

    <footer>
        <p>&copy; 2024 Library Management System. Developer Kunal Sah</p>
    </footer>

</body>
</html>

<?php
$conn->close();
?>
