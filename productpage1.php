<?php
session_start();
if (!isset($_SESSION['fullname'])) { //CHECK IF SESSION IS SET
    header('Location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">



    <link rel="stylesheet" href="style.css">
    <!--MAINLY FOR ORDER DETAILS TABLE-->
    <script src="js/bootstrap.bundle.min.js"></script>
    <!--Ajx-->
    <script src="js/jquery-3.5.1.min.js"></script>

    <Script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

    <Script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


    <!--NAVBAR STARTS-->

    <section class="first">

        <nav>
            <div class="logo">
                <h3>CanDar SportsTech</h3>
            </div>

            <ul>
                <li>
                    <a class="active" href="homepage.php">Home</a>
                </li>

                <li>
                    <a href="productpage1.php">Products</a>
                </li>

                <li>
                    <a href="About.html">About</a>
                </li>

                <li>
                    <a href="contact.php">Contact</a>
                </li>

                <li>
                    <a href="logout.php">Logout</a> <!--Provide the ability to logout-->

                </li>

            </ul>
            </ul>


        </nav>


    </section>
    <!--NAVBAR ENDS-->

    <!--SEARCH BUTTON-->
    <form method="POST">
        <section>
            <div class="search-box">
                <input class="search-txt" type="text" name="productName" placeholder="Type to search"
                    id="productName" />
                <a class="search-btn" onclick="searchProduct()" href="#"><i class="fa-solid fa-magnifying-glass"></i>
                </a><br /><br />
                <div id="productInfo"></div><br /><br />
            </div>


        </section>
    </form>


    <!--END OF SEARCH BUTTON-->




</head>

<body>


    <div class="product-list">
        <div>
            <h1 class="align-center"> OUR PRODUCTS</h1>
        </div>
        <?php

        $xml = new DOMDocument();
        $xml->load('productpage.xml');

        //  here you can apply the schema to validate
        $is_valid_xml = $xml->schemaValidate('productpage.xsd'); // path to xsd file
        
        if (!$is_valid_xml) {
            echo '<b>Invalid XML:</b> validation failed<br>';
        } else {
            echo '';
        }

        $xsl = new DOMDocument;
        $xsl->load('productpage .xsl');

        $proc = new XSLTProcessor();
        $proc->importStyleSheet($xsl);

        echo $proc->transformToXML($xml);

        ?>
    </div>

    <br />
    <br />
    <!--ORDER DETAILS PART-->
    <?php



    // Initialize the cart and order details arrays if they don't exist
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    if (!isset($_SESSION['order_details'])) {
        $_SESSION['order_details'] = array();
    }

    // Check if the form was submitted to add a product to the cart
    if (isset($_POST['add_to_cart'])) {

        // Get the product details from the form
        $product_name = $_POST['hidden_name'];
        $product_price = $_POST['hidden_price'];

        // Check if the product already exists in the cart
        $exists = false;
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['name'] == $product_name) {
                $_SESSION['cart'][$key]['quantity']++;
                $exists = true;
            }
        }

        // If the product doesn't exist in the cart, add it
        if (!$exists) {
            $item_array = array(
                'name' => $product_name,
                'price' => $product_price,
                'quantity' => 1,
            );
            array_push($_SESSION['cart'], $item_array);
        }
    }

    // Check if the remove item form was submitted
    if (isset($_POST['remove_item'])) {

        // Get the product name from the form
        $product_name = $_POST['remove_item_name'];

        // Loop through the cart and remove the item with the matching name
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['name'] == $product_name) {
                unset($_SESSION['cart'][$key]);
                break;
            }
        }

        // Reset the session array keys
        $_SESSION['cart'] = array_values($_SESSION['cart']);
    }

    ?>


    <div style="clear:both"></div>
    <br />
    <h3 style="align-text" :center>Order Details</h3>
    <div class="table-responsive">
        <!-- Display the cart items in a table -->
        <table class="table table-bordered">
            <tr id="order-list">
                <th width="40%">Item Name</th>
                <th width="20%">Price</th>
                <th width="15%">Quantity</th>
                <th width="15%">Total</th>
                <th width="5%">Action</th>
            </tr>
            <?php foreach ($_SESSION['cart'] as $item) { ?>
                <tr>
                    <td>
                        <?php echo $item['name']; ?>
                    </td>
                    <td>
                        <?php echo $item['price']; ?>
                    </td>
                    <td>
                        <?php echo $item['quantity']; ?>
                    </td>
                    <td>
                        <?php echo $item['price'] * $item['quantity']; ?>
                    </td>
                    <td>
                        <form method="POST" action="">
                            <input type="hidden" name="remove_item_name" value="<?php echo $item['name']; ?>">
                            <input type="submit" name="remove_item" value="Remove">
                        </form>
                    </td>
                </tr>
            <?php } ?>
            <tr>
                <td colspan="3" align="right">Total</td>
                <td align="right">
                    <?php
                    $total = 0;
                    foreach ($_SESSION['cart'] as $item) {
                        $total += $item['price'] * $item['quantity'];
                    }
                    echo '$' . $total;
                    ?>
                </td>
                <td></td>
            </tr>
        </table>





        <script> //AJAX to search an XML document for products and navigate to new page with details about product searched.
            event.preventDefault();
            function searchProduct() {
                var productName = document.getElementById("productName").value;
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        var xmlDoc = this.responseXML;
                        var products = xmlDoc.getElementsByTagName("product");
                        var foundProduct = false;
                        for (var i = 0; i < products.length; i++) {
                            var name = products[i].getElementsByTagName("name")[0].textContent;
                            if (name.toLowerCase().includes(productName.toLowerCase())) {
                                var imageElement = products[i].getElementsByTagName("image")[0];
                                var image = imageElement.textContent;
                                if (imageElement.hasAttribute("src")) {
                                    image = imageElement.getAttribute("src");
                                }
                                var price = products[i].getElementsByTagName("price")[0].textContent;
                                foundProduct = true;
                                // Navigate to new page with query parameters
                                window.location.href =
                                    "productDetails.html?name=" +
                                    encodeURIComponent(name) +
                                    "&price=" +
                                    encodeURIComponent(price) +
                                    "&image=" +
                                    encodeURIComponent(image);
                                break;
                            }
                        }
                        if (!foundProduct) {
                            document.getElementById("productInfo").innerHTML = "Product not found.";
                        }
                    }
                };
                xhttp.open("GET", "productpage.xml", true);
                xhttp.send();
            }
        </script>

</body>

</html>