<?php
//APPLY XSD SCHEMA

$xsd = new DOMDocument();
$xsd->load('register.xsd');

$xml = new DOMDocument();
$xml->load('register.xml');

//  here you can apply the schema to validate
$is_valid_xml = $xml->schemaValidate('register.xsd'); // pass the XSD file path as a string

if (!$is_valid_xml) {
    echo '<b>Invalid XML:</b> validation failed<br>';
} else {
    echo '';
}

//DYNAMICALLY INSERT DATA TO "REGISTER.XML"

if (isset($_POST["Login"])) {
    $xml = new DomDocument("1.0");
    $xml->load('register.xml');

    $fname = $_POST["fullname"];
    $Email = $_POST["Email"];
    $password = $_POST["password"];

    // Check password length
    if (strlen($password) < 5 || strlen($password) > 8) {
        echo '<script>alert("Invalid password length")</script>';
        ;

    }

    $rootTag = $xml->getElementsByTagName("Registrations")->item(0);

    $registration = $xml->createElement("registration");

    $nameTag = $xml->createElement("fullname");
    $nameTag->appendChild($xml->createTextNode($fname));
    $EmailTag = $xml->createElement("Email");
    $EmailTag->appendChild($xml->createTextNode($Email));
    $pwdTag = $xml->createElement("password");
    $pwdTag->appendChild($xml->createTextNode($password));

    $registration->appendChild($nameTag);
    $registration->appendChild($EmailTag);
    $registration->appendChild($pwdTag);

    $rootTag->appendChild($registration);
    $xml->save('register.xml');

    echo '<script>alert("data inserted")</script>';
    ;
}
?>




<!DOCTYPE html>
<html lang="en">

<head>



    <style>
        body {
            width: 100%;
            min-height: 100vh;
            background-image: linear-gradient(rgba(0, 0, 0, .5), rgba(0, 0, 0, .5)), url(bg.jpg);
            background-position: center;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            width: 400px;
            min-height: 530px;
            background: #FFF;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, .3);
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
        }

        .form {
            width: 100%;
            height: 50px;
            margin-bottom: 25px;
        }

        .btn {
            display: block;
            width: 100%;
            padding-bottom: 15px;
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

        .input-group {
            display: block;
            width: 100%;
            padding: 15px 20px;
            text-align: center;
            border: none;
            background: #a29bfe;
            outline: none;
            border-radius: 30px;
            font-size: 1.2rem;
            height: 50%;
            cursor: pointer;
            transition: .3s;
        }

        .align-center {
            /* css animated page title*/
            text-align: center;
            text-transform: uppercase;
            color: #252839;
            #252839;
            font-size: 3vw;
            animation: textanimation 1s ease-in-out;

        }

        @keyframes textanimation {
            0% {
                letter-spacing: 20px;
            }

            100% {
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
                <h1 class="align-center"> Join Us</h1>
            </div>
            <div class="form-control">
                <label for="fullname">fullname</label>
                <input type="text" placeholder="darelpop" name="fullname" class="input-group">
            </div>

            <div class="form-control">
                <label for="email">Email</label>
                <input type="email" placeholder="a@musette-pop.com" name="Email" class="input-group">
            </div>

            <div class="form-control">
                <label for="password">password</label>
                <input type="password" placeholder="enter password" name="password" class="input-group">

            </div>

            <div class="form-control">
                <label for="password">confirm password</label>
                <input type="password" placeholder="enter password" name="confirmpassword" class="input-group">
                <span id="field"></span>
            </div>


            <div class="form-control">
                <input type="submit" name="Login" value="Register" class="btn"><br><br>
        </form>

        <div class="form-control">
            <a href="login.php">Login</a>
        </div>

    </div>
</body>

</html>