<?php
$host = 'localhost'; // Your database host
$user = 'root'; // Your database username (default for XAMPP)
$password = ''; // Your database password (leave empty for XAMPP default)
$dbname = 'sims'; // Your database name

// Create connection
$con = mysqli_connect($host, $user, $password, $dbname);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<?php
$host = 'localhost'; // Your database host
$user = 'root'; // Your database username
$password = ''; // Your database password
$dbname = 'sims'; // Your database name

// Create connection
$con = mysqli_connect($host, $user, $password, $dbname);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>


<?php
$servername = "localhost";
$username = "root";  // Default for XAMPP
$password = "";      // Default password in XAMPP
$database = "sims";

// Create connection
$con = new mysqli($servername, $username, $password, $database);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>
