<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>


<?php


if(empty($_SESSION['LoggedIn']) || empty($_SESSION['username']))  {
 
     
	header("Location:http://localhost/website/prijava.php"); // redirects 
die;
}


$database = "Internet_oglasnik";
$host = "127.0.0.1";
$username = "root";
$password = "";


$db = mysqli_connect($host, $username, $password, $database);
if (mysqli_connect_errno()) {
echo "Nemoguce se spojiti na bazu...";
}


if(isset($_POST["gumb"]) && !empty($_POST["gumb"])){
$id_oglasa= $_POST["gumb"];
}
if(isset($_POST["bid"]) && !empty($_POST["bid"])){
$trenutna_cijena_bida= floatval($_POST["bid"]);
}

$username=$_SESSION['username'];
$dt = new DateTime();
$sad=$dt->format('Y-m-d H:i:s');

$rez = mysqli_query($db, "UPDATE bida SET username='".$username."', trenutna_cijena_bida='".$trenutna_cijena_bida."', dat_i_vrijeme_bida='".$sad."' WHERE id_oglasa='".$id_oglasa."'");

if(!$rez){echo "Došlo je do greške!";}

else {
$url ="http://localhost/website/aukcije.php";
$time_out = 5; 
mysqli_close($db);
echo "Uspješno ste bidali oglas, bit ćete preusemjereni za 5 sekundi!";
header("refresh: $time_out; url=$url");
	
}


?>



</body>
</html>