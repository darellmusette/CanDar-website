
<?php
// Define database parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "candar sports tech";
// Create connection object
$dbconn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($dbconn->connect_error) {
  die("Connection failed: " . $dbconn->connect_error);
}else{
// echo"Connected successfully";

}
?>