<?php
session_start();

$xml = simplexml_load_file('register.xml');

if (isset($_POST['Login'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['Email'];
    $password = $_POST['password'];

    $userFound = false;

    foreach ($xml->registration as $registration) {
        if (trim($registration->fullname) == $fullname && trim($registration->Email) == $email && trim($registration->password) == $password) {
            // User found, set session variable and redirect to homepage
            $_SESSION['fullname'] = $fullname;
            header('Location: homepage.php');
            exit();
        }
    }

    // User not found, redirect to login page
    echo "<script>alert('User not found!');</script>";
    header('Location: register.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
       body {
    width: 100%;
    min-height: 100vh;
    background-image: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)), url(bg.jpg);
    background-position: center;
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
}
.container {
    width: 400px;
    min-height: 490px;
    background: #FFF;
    border-radius: 5px;
    box-shadow: 0 0 5px rgba(0,0,0,.3);
    padding: 40px 30px;
}
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
.container .form-control {
    color: #111;
    font-weight: 500;
    font-size: 1.1rem;
    text-align: center;
    margin-bottom: 20px;
    display: block;
    text-transform: capitalize;
}
.form  {
    width: 100%;
    height: 50px;
    margin-bottom: 25px;
}
.btn {
    display: block;
    width: 100%;
    padding-bottom:15px;
    padding: 15px 20px;
    text-align: center;
    border: none;
    background: #a29bfe;
    outline: none;
    border-radius: 30px;
    font-size: 1.2rem;
    color: #FFF;
    cursor: pointer;
}
.input-group  {
    display: block;
    width: 100%;
    padding: 15px 20px;
    text-align: center;
    border: none;
    background: #a29bfe;
    outline: none;
    border-radius: 30px;
    font-size: 1.2rem;
    
    cursor: pointer;
    transition: .3s;
}

.align-center{						 /* css animated page title*/
	text-align: center;
	text-transform: uppercase;
	color: #252839;#252839;
	font-size: 3vw;
	animation: textanimation 1s ease-in-out;
	
}

@keyframes textanimation{
	0%{
		letter-spacing: 20px;
	}

	100%{
		letter-spacing: 1px;
	}
}
								/*css end animated page title*/
    </style>
    

</head>

<body>

<div class="container">
<form id="form" class="form" action="" method="POST">

<div>
	<h1 class="align-center"> Login<br> form</h1>
</div>    

<div class="form-control">
    <label for="fullname">fullname</label >
    <input type="text" id="fullname" placeholder="darel pop" name = "fullname" class="input-group"  >
</div>

<div class="form-control">
    <label for="email">Email</label>
    <input type="email" id="email" placeholder="a@musette-pop.com" name="Email" class="input-group" >
</div>

<div class="form-control">
    <label for="phonenumber">password</label>
    <input type="password" id="password"  placeholder="enter password"  name="password" class="input-group">
</div>

<div class="form-control">
    <button type="submit"  name="Login" class="btn">Login</button><br><br>
</form>
<div class="form-control">
    <a href="register.php">Register Here</a>
</div> 

</div>   


<body>
</html>


