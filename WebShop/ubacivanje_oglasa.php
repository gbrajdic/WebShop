
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


if(isset($_POST["select"]) && !empty($_POST["select"])){
$kategorija=$_POST["select"];
}


if($kategorija=="OSTALO") {$podkategorija="Nema je";}

if(isset($_POST["she"]) && !empty($_POST["she"])){
$podkategorija=$_POST["she"];
}

if(isset($_POST["he"]) && !empty($_POST["he"])){

$podkategorija=$_POST["he"];



}

if(isset($_POST["multim"]) && !empty($_POST["multim"])){
$podkategorija=$_POST["multim"];
}

if(isset($_POST["sve_za_kucu"]) && !empty($_POST["sve_za_kucu"])){
$podkategorija=$_POST["sve_za_kucu"];
}

if(isset($_POST["voz"]) && !empty($_POST["voz"])){
$podkategorija=$_POST["voz"];
}

if(isset($_POST["pets"]) && !empty($_POST["pets"])){
$podkategorija=$_POST["pets"];
}

if($kategorija=="OSTALO") {$podkategorija="Nema podkategorije";}



if(isset($_POST["ime_ogl"]) && !empty($_POST["ime_ogl"])){
$ime_oglasa=$_POST["ime_ogl"];
}



if(isset($_POST["zelj_cijena"]) && !empty($_POST["zelj_cijena"])){

if((strpos($_POST["zelj_cijena"],',') !== false) || (strpos($_POST["zelj_cijena"],'.') !== false) ){	
list($prvi, $drugi) = split('[.,]', $_POST["zelj_cijena"]);
$cijena=$prvi . "." . $drugi;
$zelj_cijena=floatval($cijena);
}
else {
$zelj_cijena=floatval($_POST["zelj_cijena"]);
}

}




if(isset($_POST["pocetna_cijena"]) && !empty($_POST["pocetna_cijena"])){

if((strpos($_POST["pocetna_cijena"],',') !== false) || (strpos($_POST["pocetna_cijena"],'.') !== false) ){	
list($prvi1, $drugi1) = split('[.,]', $_POST["pocetna_cijena"]);
$cijena1=$prvi1 . "." . $drugi1;
$pocetna_cijena=floatval($cijena1);
}
else {
$pocetna_cijena=floatval($_POST["pocetna_cijena"]);
}

}






if(isset($_POST["opis"]) && !empty($_POST["opis"])){
$opis=$_POST["opis"];
}
else $opis="Nema opisa";

$dt = new DateTime();
$sad=$dt->format('Y-m-d H:i:s');

$dt->modify('+2 week');


$activation = md5(uniqid(rand(), true));




if (isset($_FILES["slicica"]["name"]) && ($_FILES['slicica']['size'] != 0) &&  ($_FILES['slicica']['error'] == 0)) {


$target = "images/" . $_SESSION['username'] ."/" . $activation ."/";
mkdir($target, 0777);
$target = $target . basename( $_FILES["slicica"]["name"]);




if(move_uploaded_file($_FILES["slicica"]["tmp_name"], $target))
{
//Tells you if its all ok

}
else {

//Gives and error if its not
echo "Greška, slika nije snimljena. <br>";
}

}


$query = "INSERT INTO oglas VALUES ('".$activation."', '".$_SESSION['username']."', '".$kategorija."', '".$podkategorija."', '".$ime_oglasa."', '".$opis."', '$zelj_cijena','$pocetna_cijena' ,'".$sad."','".$dt->format('Y-m-d H:i:s')."','".$target."' )";


mysqli_query($db, $query);



$query2="INSERT INTO bida VALUES ('".$activation."', '".$_SESSION['username']."','$pocetna_cijena' ,'".$sad."')";


$val=mysqli_query($db, $query2);




mysqli_query($db,"DELETE FROM oglas WHERE username=''");
mysqli_query($db,"DELETE FROM bida WHERE username=''");
mysqli_close($db);

if(!$val){echo "Došlo je do greške!";}
else {
$url ="http://localhost/website/shop.php";
$time_out = 3; 

echo "Uspješno ste postavili oglas, bit ćete preusemjereni za par sekundi!";
header("refresh: $time_out; url=$url");
}
?>


</body>
</html>