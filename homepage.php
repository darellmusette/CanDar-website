<?php
session_start();
if (!isset($_SESSION['fullname'])) {
	header('Location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">

	<title>Home page</title>
	<link rel="stylesheet" href="homestyle.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>

	<nav class="navbar">
		<div class="logo">
			<h3>CanDar SportsTech</h3>
		</div>
		<ul>
			<li><a href="homepage.html">Home</a></li>

			<li><a href="productpage1.php">Products</a></li>

			<li><a href="About.html">About</a></li>

			<li><a href="contact.php">Contact</a></li>

			<li><a href="deliverypage.php">Services</a>
				<ul>

					<li><a href="deliverypage.php">Delivery</a></li>
				</ul>
		</ul>


	</nav>

	<div class="center">
		<h3>Welcome to CanDar Sports Tech
			<?php echo $_SESSION['fullname']; ?>
		</h3>

		<h4>Choose Quality</h4>

		<div class="buttons">

			<button onclick="window.location.href='logout.php'">logout</button>
			<button class="btn" onclick="window.location.href='productpage1.php'">Order Now</button>
		</div>
	</div>

	<!---footer--->
	<footer class="footer">
		<div class="inner-footer">
			<div class="social-links">
				<ul>
					<li class="social-items"><a href="www.facebook.com"><i class="fab fa-facebook"></i></a></li>

					<li class="social-items"><a href="www.twitter.com"><i class="fa-brands fa-twitter"></i></a></li>

					<li class="social-items"><a href="www.instagram.com"><i class="fa-brands fa-instagram"></i></a></li>
				</ul>
			</div>

			<div class="quick-links">
				<ul>
					<li class="quick-items"><a href="homepage.php">Home</a></li>
					<li class="quick-items"><a href="About.html">About</a></li>
					<li class="quick-items"><a href="contact.php">Contact</a></li>
					<li class="quick-items"><a href="deliverypage.php">Services</a></li>
				</ul>
			</div>
		</div>

		<div class="outer-footer">
			copyright &copy;Sports Pro. All Rights Reserved
		</div>

	</footer>
</body>

</html>