<?php
//require_once('dbconn.php');
//require_once('nusoap.php');

$server=new nusoap_server();
//global $dbconn;

function fetchProducts(){
    include 'dbconn.php';
    
    if ($dbconn->connect_error) {
        die("Connection failed: " . $dbconn->connect_error);
      }
      
      $sql = "SELECT ProductName,ProductPrice,productImage FROM product";
      $result = $dbconn->query($sql);
      
      if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
          echo "Name: " . $row["ProductName"]. " - Price: " . $row["ProductPrice"]. " - Image: " . $row["productImage"]. "<br>";
        }
      } else {
        echo "0 results";
      }
      $dbconn->close();
      



//change
    //$stmt=$dbconn->prepare($sql);
    //$stmt->bindParam(':isbn',$result);

    //$stmt->execute();
    //$data=$stmt->fetch(PDO::FETCH_ASSOC);
    //return json_encode($data);

    //$dbconn=null;
//End change

}
//fetchProducts();
//$server->configureWSDL('productServer','urn:product');
//$server->register('fetchProducts',
//array('name'=>'xsd:string'),
//array('price'=>'xsd:string'),
//array('image'=>'xsd:string'),
//'urn:book#fetchProducts'

//);

//$server->service(file_get_contents("php://input"));
?>


