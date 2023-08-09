<?php
session_start();
if(!isset($_SESSION['fullname'])){
	header('Location:login.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">

	<title>Delivery page</title>

	<!--<script src="websiteCourseWork.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<style>

.btn{
    
    width: 100%;
	height:-20%;
    padding-bottom:5px;
    padding: 10px 24px;
    text-align: center;
    border: none;
    background: #a29bfe;
    outline: none;
    border-radius: 50px;
    font-size: 16px;
    color: #FFF;
    cursor: pointer;
	margin-top:20px;
	margin:10px;
	float:center;
	
}
#submitButton{
	border-radius: 50px;
}

.btn:hover{
	box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}


</style>



<script type="text/javascript">
function ajax(){ //AJAX HERE
	try{
		requestbox= new XMLHttpRequest();
	} catch(e) {alert("your browser does not support Ajax");}
	var fullname=document.form.fullname.value; //RETRIEVE VALUE
	var url="deliverypage.html";
	requestbox.open("POST",url,true);requestbox.onreadystatechange=displayResult(); //SET CALLBACK FUNCTION
	requestbox.setRequestHeader("content-type","application/x-www-form-urlencoded");
	xmlHttp.send("fullname="+fullname);

}

function displayResult(){
	if(requestbox.readystate==4)&&(requestbox.status==200){
		document.getElementById('result').innerHTML=requestbox.responseText;
	}
}

</script>
   
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
	
	<meta name="viewport" content="width=device-width,initial-scale=1.0">

<style>

*@import url('https://fonts.googleapis.com/css?family=Muli&display=swap');
@import url('https://fonts.googleapis.com/css?family=Open+Sans:400,500&display=swap');

*{
	box-sizing: border-box;
}

body {
	background-color: #9b59b6;
	font-family: 'Open Sans', sans-serif;
	align-items: center;
	justify-content: center;
	margin: 0;
	padding: 0;
	
	}

.container {
	background-color: #fff;
	border-radius: 5px;
	box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
	overflow: hidden;
	width: 400px;
	max-width: 100%;
	justify-content: center;
	margin-left: 500px;
	padding: 50px;/*increase container*/
	margin-bottom: -400px; /*it removes space between the container and footer*/

}

.header {
	border-bottom: 1px solid #f0f0f0;
	background-color: #f7f7f7;
	padding: 20px 40px;
}

.header h2 {
	margin: 0;
}

.form {
	padding: 30px 40px;

}

.form-control {
	margin-bottom: 10px;
	padding-bottom: 20px;
	position: relative; /*shrink without it*/
}

.form-control label {
	display: inline-block;
	margin-bottom: 30px;
}

.form-control input {
	border: 2px solid #f0f0f0;
	border-radius: 4px;
	display: block;
	font-family: inherit;
	font-size: 14px;
	padding: 10px;
	width: 100%;
}


span{
	color: red;
	font-size: 10px;
}

/*FOOTER*/
.footer{
	margin-top: 500px;
	align-items: center;
	justify-content: center;
	
}
.inner-footer{
	margin: 0;
	padding: 0;
	background-color: #272727;
}

.social-links{
	display: flex;
}

.social-links ul{
	padding: 10px;
	display: flex;
	width: 300px;
	height: 30px;
	margin: auto;
}

.social-items{
	list-style: none;
}

.social-items a{
	padding: 15px 20px;
	font-size: 35px;
	color: #6cccc6;
	transition: all .25s;
}

.social-items a:hover{
	color: white;
}

.quick-links{
	display: flex;
	width: 560px;
	height: 70px;
	margin: auto;
}

.quick-links ul{
	display: flex;
	padding: 33px;
	margin-left: 68px;
}

.quick-items{
	list-style: none;
}

.quick-items a{
	text-decoration: none;
	padding: 0px 10px;
	font-size: 20px;
	color: white;
	transition: all .25s;
}

.outer-footer{
	padding: 10px;
	text-align: center;
	color: white;
	font-size: 18px;
	background-color: #3f3f3f;
}

.quick-items a:hover{
	color: #6cccc6;
}
/*FOOTER*/

</style>

</body>

</html>


</head>

<body>


<div class="container">
	<div class="header">
		<h2>Delivery</h2>
	</div>

	<form name ="form" id="form" class="form" action="function.php" method="POST">  <!--FORM-->

		<div class="form-control">
			<label for="fullname">fullname</label >
			<input type="text" placeholder="darelpop" name = "fullname" id="fullname">
			<span id="errorInFullName"></span>
		</div>

		<div class="form-control">
			<label for="email">Email</label>
			<input type="email" placeholder="a@musette-pop.com" id="email" name="email">
			<span id="errorInEmail"></span>
		</div>

		<div class="form-control">
			<label for="phonenumber">Phonenumber</label>
			<input type="tel" placeholder="enter phonenumber" id="phonenumber" name="phonenumber"  required>
			<span id="errorInNumber"></span>
		</div>

		<div class="form-control">
			<label for="address">Address</label>
			<input type="text" placeholder="enter Address" id="address" name="address" required>
			<span id="errorInAddress"></span>
		</div>

		
	    <div class="form-control">
			<button id="submitButton" class="btn">Submit</button><br><br>
			
		</div>
		
	</form>  
	
</div>


	
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

</body>
</html>

 
                                                     
			



