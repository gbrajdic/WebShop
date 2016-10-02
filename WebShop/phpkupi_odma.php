<?php session_start();?>
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


if(isset($_POST["gumb1"]) && !empty($_POST["gumb1"])){
$id_oglasa= $_POST["gumb1"];
}
$cijena_kupovine_Arr = mysqli_query($db, "SELECT zelj_cijena FROM oglas WHERE id_oglasa='".$id_oglasa."'");
$cijena_kupovine=mysqli_fetch_array($cijena_kupovine_Arr);

$username=$_SESSION['username'];
$dt = new DateTime();
$sad=$dt->format('Y-m-d H:i:s');

 mysqli_query($db, "UPDATE bida SET username='".$username."', trenutna_cijena_bida='".$cijena_kupovine['zelj_cijena']."', dat_i_vrijeme_bida='".$sad."' WHERE id_oglasa='".$id_oglasa."'");

mysqli_query($db, "UPDATE oglas SET vrijeme_zavrs=vrijeme_postav WHERE id_oglasa='".$id_oglasa."'");


$url ="http://localhost/website/aukcije.php";
$time_out = 5; 
mysqli_close($db);
echo "Uspješno ste kupili oglas, bit ćete preusemjereni za 5 sekundi!";
header("refresh: $time_out; url=$url");
	



?>






</body>
</html>