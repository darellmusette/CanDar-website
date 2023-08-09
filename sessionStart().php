<?php

session_start();
if(isset($_SESSION['fullname'])){

	header('Location:homepage.php');
}
else{
    header('Location:login.php');
}    

?>