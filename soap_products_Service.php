<?php
$servername = 'localhost'; // DATABASE CONNECTION
$username = 'root';
$password = '';
$db = 'candar sports tech'; // Adjust the database name

$conn = mysqli_connect($servername, $username, $password, $db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

require_once("nusoap.php");

// Create a new SOAP server
$server = new soap_server();
$namespace = "http://localhost/products_soap_service";
$server->configureWSDL("ProductService", $namespace);
$server->wsdl->schemaTargetNamespace = $namespace;

// Complex type definition for Product
$server->wsdl->addComplexType(
    "Product",
    "complexType",
    "struct",
    "all",
    "",
    array(
        "id" => array("name" => "id", "type" => "xsd:int"),
        "name" => array("name" => "name", "type" => "xsd:string"),
        "price" => array("name" => "price", "type" => "xsd:float"),
        "image" => array("name" => "image", "type" => "xsd:string")
    )
);

// Register fetchProducts function
$server->register(
    "fetchProducts",
    array(),
    array("return" => "tns:Product[]"),
    $namespace,
    $namespace . "#fetchProducts",
    "rpc",
    "encoded",
    "Fetches a list of products with images"
);

// Fetch products function
function fetchProducts()
{
    global $conn; // Use the global $conn variable

    $query = "SELECT ProductID, ProductName, ProductPrice, productImage FROM product"; // QUERY
    $result = $conn->query($query);

    $products = array();
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }

    return $products;
}

// Process SOAP request
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
?>






