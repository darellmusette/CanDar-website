<?php
require_once('nusoap.php');

$server=new nusoap_server();

function fetchProducts(){
    include 'dbconn.php';
    
    if ($dbconn->connect_error) {
        die("Connection failed: " . $dbconn->connect_error);
      }
      
      $sql = "SELECT ProductName,ProductPrice,productImage FROM product";
      $result = $dbconn->query($sql);
      
      if ($result->num_rows > 0) {
        // Output data of each row
        // while($row = $result->fetch_assoc()) {
        //   echo "Name: " . $row["ProductName"]. " - Price: " . $row["ProductPrice"]. " - Image: " . $row["productImage"]. "<br>";
        // }
        return json_encode($result);
      } else {
        echo "0 results";
      }
      $dbconn->close();

}

//fetchProducts();

$server->configureWSDL('fetchProducts', 'urn:products');
$server->register('fetchProducts',
array(), //parameter
array('data' => 'xsd:string'), //output
'urn:products', //namespace
'urn:products#fetchProducts' //soapaction
);
$server->service(file_get_contents("php://input"));
?>


