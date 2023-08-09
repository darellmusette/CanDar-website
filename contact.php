<?php
session_start();
if(!isset($_SESSION['fullname'])){
	header('Location:login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-80">
	<title>Contact us</title>

	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="mystyle.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

	<link rel="stylesheet" href="style.css">
</head>
<body>	
<section class="first">
		<div class="container">
			

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
						<a href="deliverypage.php">Services</a>
						
				<ul>
				
					<li>
						<a href="deliverypage.php">Delivery</a>
					</li>

				</ul>
				</ul>
					

			</nav>

			
		</div>

	<div class="contact-info">

		<div class="box">
			<i class="box-icon far fa-envelope"></i>
			<p>DarellMusette23@gmail.com</p>
		</div>
		
		<div class="box">
			<i class="box-icon fas fa-phone"></i>
			<p>57488193</p>
		</div>
		
		<div class="box">
			<i class="box-icon fa-solid fa-location-dot"></i></i>
			<p>Mauritius</p>
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
	</nav>

</section>
</body>
</html>