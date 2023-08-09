<?php
include('connection.php');

$name= $_POST["fullname"];
$email= $_POST["email"];
$phonenumber= $_POST["phonenumber"];
$address= $_POST["address"];

    	if(mysqli_query($conn,"INSERT INTO `delivery`VALUES ('$name','$email','$phonenumber','$address')")){
            echo "<script type='text/javascript'>alert('Details Recorded !');</script>";
             echo("<script>window.location = 'productpage.php';</script>");
                
        }else{
            echo "<script type='text/javascript'>alert('Insertion failed !');</script>";}
            echo ("<script>window.location='deliverypage.php';</script>");

            
      //AFTER HAVING SUBMITTNG DELIVERY DETAILS, IF THE DETAILS ARE SENT CORRECTLY, THEY WILL BE
     //INSERTED IN THE DATABASE
    //ELSE
   //IT WILL ALERT "INSERTION FAILED".

?>