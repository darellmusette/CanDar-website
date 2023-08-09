<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$db = 'candar sports tech';

$conn = mysqli_connect($servername, $username, $password, $db);
if(!$conn){
    echo mysqli_connect_error();
}

//THIS IS THE CONNECTION TO THE SERVER AND DATABASE 
// AND WILL BE INCLUDED INTO MY PHP PAGES : include'connection.php'

?>