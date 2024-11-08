<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Success</title>
    
    <style>

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            text-align: center;
            padding: 50px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 500px;
            animation: fadeIn 1s ease-in-out;
        }

        h1 {
            color: #4CAF50;
            font-size: 36px;
            margin-bottom: 30px;
            text-transform: uppercase;
        }

        p {
            font-size: 18px;
            color: #333;
            margin-bottom: 20px;
            line-height: 1.6;
        }

        a {
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            padding: 10px 25px;
            border-radius: 30px;
            font-size: 18px;
            transition: background-color 0.3s, transform 0.3s;
        }

        a:hover {
            background-color: #0056b3;
            transform: scale(1.1);
        }

        a:focus {
            outline: none;
        }

        /* Add animation to fade in */
        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1.5;
                transform: translateY(0);
            }
        }

        /* Add responsive styling */
        @media (max-width: 768px) {
            .container {
                padding: 30px;
            }

            h1 {
                font-size: 28px;
            }

            p {
                font-size: 16px;
            }

            a {
                font-size: 16px;
                padding: 8px 20px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Student Successfully Registered!</h1>
        <p>Your registration has been completed successfully.</p>
        <p>Click <a href="registerStudent.php">here</a> to go back to the registration page.</p>
        <p>Click <a href="adminDashboard.php">here</a> to go to the admin dashboard.</p>
    </div>

</body>
</html>






