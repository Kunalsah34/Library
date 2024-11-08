<?php



// $servername = "localhost"; // Your database server
// $username = "root"; // Your database username
// $password = ""; // Your database password
// $dbname = "eLibrary"; // Your database name

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }




// db.php - Database connection

$servername = "localhost";
$username = "root";  // Update as per your MySQL credentials
$password = "";      // Leave empty for default XAMPP setup
$dbname = "eLibrary"; // The name of your database

// Create connection
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}






// $host = "localhost";
// $db_name = "eLibrary";
// $username = "root"; // Change as per your MySQL setup
// $password = ''; // Change as per your MySQL setup

// try {
//     $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch (PDOException $e) {
//     echo "Connection failed: " . $e->getMessage();
// }


// $con = mysqli_connect($host, $user, $password, $db_name);  


//     if(mysqli_connect_errno()) {  
//         die("Failed to connect with MySQL: ". mysqli_connect_error());  
//     }


?>
