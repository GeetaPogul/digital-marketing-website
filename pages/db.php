
<?php
$host = "localhost"; 
$user = "root";      // default WAMP/XAMPP user
$pass = "";          // default WAMP/XAMPP password is empty
$dbname = "digital_marketing";

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>

