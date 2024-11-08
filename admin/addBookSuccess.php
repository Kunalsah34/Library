<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Added Successfully</title>
    <link rel="stylesheet" href="../assets/css/addBook.css">
    <style>
        body {
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 500px;
            width: 90%;
            text-align: center;
            padding: 40px 30px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color:#3498db;
            font-size: 24px;
            margin-bottom: 20px;
        }

        p {
            color: #333;
            font-size: 16px;
            margin-bottom: 30px;
            line-height: 1.5;
        }

        .button-container {
            display: flex;
            justify-content: space-around;
        }

        a.button {
            text-decoration: none;
            color: white;
            background-color: #3498db;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        a.button:hover {
            background-color: #2980b9;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Book Added Successfully!</h1>
    <p>The book has been successfully added to the library collection. You can continue adding books or return to the dashboard.</p>
    <div class="button-container">
        <a href="addBook.php" class="button">Add Another Book</a>
        <a href="adminDashboard.php" class="button">Dashboard</a>
    </div>
</div>

</body>
</html>
