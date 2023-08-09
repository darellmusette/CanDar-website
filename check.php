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
					<a href="productpage.php">Products</a>
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
	<form method="post">
		<section>
			<div class="search-box">
				<input class="search-txt" type="text" name="productName" placeholder="Type to search" id="productName">
				<a class="search-btn" href="#"><i class="fa-solid fa-magnifying-glass"></i>
				</a>
				<div id="productlist"></div>
			</div>


		</section>
	</form>
	<!--END OF SEARCH BUTTON-->




</head>

<body>


	<section class="product-list">
		<div>
			<h1 class="align-center"> OUR PRODUCTS</h1>
		</div>

		<div class="card">

			<?php

			$xml = new DOMDocument();
			$xml->load('productpage.xml');

			//  here you can apply the schema to validate
			$is_valid_xml = $xml->schemaValidate('productpage.xsd'); // path to xsd file
			
			if (!$is_valid_xml) {
				echo '<b>Invalid XML:</b> validation failed<br>';
			} else {
				echo '<b>Valid XML:</b> validation passed<br>';
			}

			$xsl = new DOMDocument;
			$xsl->load('productpage.xsl');

			$proc = new XSLTProcessor();
			$proc->importStyleSheet($xsl);

			echo $proc->transformToXML($xml);

			?>
		</div>



		<div style="clear:both"></div>
		<br />
		<h3 style="align-text" :center>Order Details</h3>
		<div class="table-responsive">
			<table class="table table-bordered">
				<tr>
					<th width="40%">Item Name</th> <!--DETAILS OF ORDER-->

					<th width="20%">Price</th>
					<th width="15%">Total</th>
					<th width="5%">Action</th>
				</tr>


</body>

</html>