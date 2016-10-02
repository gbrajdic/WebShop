<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php

$database = "Internet_oglasnik";
$host = "127.0.0.1";
$username = "root";
$password = "";
session_start();

			
		$db = mysqli_connect($host, $username, $password, $database);
		if (mysqli_connect_errno()) {
	    echo "Nemoguce se spojiti na bazu...";
		}


if(isset($_POST["usern"]) && !empty($_POST["usern"])){
$usern=$_POST["usern"];
}

if(isset($_POST["passw"]) && !empty($_POST["passw"])){
$passw=$_POST["passw"];
}

$checklogin = mysqli_query($db, "SELECT * FROM korisnik WHERE username = '".$usern."' AND password = '".$passw."'");  
if(mysqli_num_rows($checklogin) == 1)
{
 $_SESSION['username']=$usern;
 $_SESSION['LoggedIn'] = 1;	
 header("Location:http://localhost/website/shop.php");
}

else
{
 			$Msg = urlencode("Neispravan login, pokušajte ponovo!");
            header("Location:http://localhost/website/prijava.php?Msg=".$Msg);
            die;	
}

mysqli_close($db);








?>




</body>
</html>