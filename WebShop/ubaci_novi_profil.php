<?php session_start(); ?>
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

$db = mysqli_connect($host, $username, $password, $database);
if (mysqli_connect_errno()) {
echo "Nemoguce se spojiti na bazu...";
}

$rez_arr = mysqli_query($db, "SELECT password, ime_i_prezime FROM korisnik WHERE username='".$_SESSION['username']."'");
$rez = mysqli_fetch_array($rez_arr);

if(isset($_POST["password"]) && !empty($_POST["password"]) && isset($_POST["password_Stari"]) && !empty($_POST["password_Stari"]) ){

$password=$_POST['password'];
$password_Stari=$_POST['password_Stari'];


if($password_Stari==$rez['password'] && strlen($password)>=6){
	
mysqli_query($db, "UPDATE korisnik SET password='".$password."' WHERE username='".$_SESSION['username']."'");	
	
}

else {
			$Message = urlencode("Krivo ste unjeli password");
            header("Location:http://localhost/website/editiranje_profila.php?Message=".$Message);
            die; 
	
}

}



if(isset($_POST["Ime"]) && !empty($_POST["Ime"]) && isset($_POST["Prezime"]) && !empty($_POST["Prezime"])){
$Ime_novo=$_POST["Ime"];
$Prezime_novo=$_POST["Prezime"];

$ime_i_prezime=$Ime_novo ." " .$Prezime_novo;
mysqli_query($db, "UPDATE korisnik SET ime_i_prezime='".$ime_i_prezime."' WHERE username='".$_SESSION['username']."'");

}

else
{
if((isset($_POST["Ime"]) && !empty($_POST["Ime"]) && (!isset($_POST["Prezime"]))) || (isset($_POST["Prezime"]) && !empty($_POST["Prezime"]) && (!isset($_POST["Ime"]))) )
	{
		    $Message = urlencode("Morate unjeti puno Ime i Prezime.");
            header("Location:http://localhost/website/editiranje_profila.php?Message=".$Message);
            die; 
		
		
		}
}




if(isset($_POST["Dan"]) && !empty($_POST["Dan"]) && isset($_POST["Mjesec"]) && !empty($_POST["Mjesec"]) && isset($_POST["Godina"]) && !empty($_POST["Godina"]) ){
	
$dat_rod=$_POST["Dan"]. ". ". $_POST["Mjesec"]. " ".$_POST['Godina']. ".";
mysqli_query($db, "UPDATE korisnik SET datum_rod='".$dat_rod."' WHERE username='".$_SESSION['username']."'");


}


	
	




if(isset($_POST["Telefon"]) && !empty($_POST["Telefon"])){
$Telefon=$_POST["Telefon"];
mysqli_query($db, "UPDATE korisnik SET telefon='".$Telefon."' WHERE username='".$_SESSION['username']."'");
}


if(isset($_POST["Adresa"]) && !empty($_POST["Adresa"])){
$Adresa=$_POST["Adresa"];
mysqli_query($db, "UPDATE korisnik SET adresa='".$Adresa."' WHERE username='".$_SESSION['username']."'");
}


if(isset($_POST["Mjesto"]) && !empty($_POST["Mjesto"])){
$Mjesto=$_POST["Mjesto"];
mysqli_query($db, "UPDATE korisnik SET mjesto='".$Mjesto."' WHERE username='".$_SESSION['username']."'");
}

if(isset($_POST["Mail"]) && !empty($_POST["Mail"])){
$Mail=$_POST["Mail"];
mysqli_query($db, "UPDATE korisnik SET email='".$Mail."' WHERE username='".$_SESSION['username']."'");

}

if(isset($_POST["Spol"])){
$Spol=$_POST["Spol"];
mysqli_query($db, "UPDATE korisnik SET spol='".$Spol."' WHERE username='".$_SESSION['username']."'");
}


if (isset($_FILES["Slika"]["name"]) && ($_FILES['Slika']['size'] != 0) &&  ($_FILES['Slika']['error'] == 0)) {
$target = "images/" . $_SESSION['username'] ."/";
$target = $target . basename( $_FILES["Slika"]["name"]);

if(move_uploaded_file($_FILES["Slika"]["tmp_name"], $target))
{

mysqli_query($db, "UPDATE korisnik SET slika='".$target."' WHERE username='".$_SESSION['username']."'");
}
else {
$Message = urlencode("Slika nije spremljena!");
header("Location:http://localhost/website/editiranje_profila.php?Message=".$Message);
die; 

}


}

$time_out = 3; 
mysqli_close($db);
$url ="http://localhost/website/moj_profil.php";
echo "Bit ćete preusemjereni za par sekundi!";
header("refresh: $time_out; url=$url");

?>









</body>
</html>