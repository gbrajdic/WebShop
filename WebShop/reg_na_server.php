<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
</head>

<body>

<?php

//baza



        $database = "Internet_oglasnik";
		$host = "127.0.0.1";
		$username = "root";
		$password = "";


// provjerava ima li baze i tablice i kreira ako nema
			$link = mysqli_connect($host, $username, $password);
			if (!mysqli_select_db($link, $database)) {
				$createQuery = 'CREATE DATABASE '. $database; 
				mysqli_query($link, $createQuery);
			}
			mysqli_select_db($link, $database);
			
			$createQuery = "CREATE TABLE IF NOT EXISTS korisnik 
							(
							username VARCHAR(255) NOT NULL,
							PRIMARY KEY(username),
							password VARCHAR(255),
							ime_i_prezime VARCHAR(255),
							adresa VARCHAR(255),
							mjesto VARCHAR(255),
							telefon VARCHAR(255),
							email VARCHAR(255),
							datum_rod VARCHAR(255),
							spol VARCHAR(255),
							slika VARCHAR(255)
							)";				
							
							
							
			mysqli_query($link, $createQuery);
			
			$createQuery1 = "CREATE TABLE IF NOT EXISTS oglas 
							(
							id_oglasa VARCHAR(255) NOT NULL,
							PRIMARY KEY(id_oglasa),
							username VARCHAR(255),
							kategorija VARCHAR(255),
							pod_kat VARCHAR(255),
							naslov VARCHAR(255),
							opis VARCHAR(255),
							zelj_cijena DECIMAL(15,2),
							poc_cijena DECIMAL(15,2),
							vrijeme_postav DATETIME,
							vrijeme_zavrs DATETIME,
							slika_prva VARCHAR(255)
							)";
							
			mysqli_query($link, $createQuery1);
			
			$createQuery2 = "CREATE TABLE IF NOT EXISTS bida
						    (
							id_oglasa VARCHAR(255) NOT NULL,
							PRIMARY KEY(id_oglasa),
							username VARCHAR(255),
							trenutna_cijena_bida DECIMAL(15,2),
							dat_i_vrijeme_bida DATETIME		   	
						    )";
							
			mysqli_query($link, $createQuery2);

		// ostatak
		$db = mysqli_connect($host, $username, $password, $database);
		if (mysqli_connect_errno()) {
	    echo "Nemoguce se spojiti na bazu...";
		}


if(isset($_POST["username"]) && !empty($_POST["username"])){
$user=$_POST["username"];

}

if(isset($_POST["password"]) && !empty($_POST["password"])){
$pass=$_POST["password"];

}

if(isset($_POST["Ime"]) && !empty($_POST["Ime"])){
$Ime=$_POST["Ime"];

}

if(isset($_POST["Prezime"]) && !empty($_POST["Prezime"])){
$Prezime=$_POST["Prezime"];

}

if(isset($_POST["Dan"]) && !empty($_POST["Dan"])){
$Dan=$_POST["Dan"];

}

if(isset($_POST["Mjesec"]) && !empty($_POST["Mjesec"])){
$Mjesec=$_POST["Mjesec"];

}

if(isset($_POST["Godina"]) && !empty($_POST["Godina"])){
$Godina=$_POST["Godina"];

}

if(isset($_POST["Telefon"]) && !empty($_POST["Telefon"])){
$Telefon=$_POST["Telefon"];

}
else {$Telefon="Nema informacije";}

if(isset($_POST["Adresa"]) && !empty($_POST["Adresa"])){
$Adresa=$_POST["Adresa"];

}
else {$Adresa="Nema informacije";}

if(isset($_POST["Mjesto"]) && !empty($_POST["Mjesto"])){
$Mjesto=$_POST["Mjesto"];

}

if(isset($_POST["Mail"]) && !empty($_POST["Mail"])){
$Mail=$_POST["Mail"];

}

if(isset($_POST["Spol"])){
$Spol=$_POST["Spol"];

}
		
		
$query1 = "SELECT * FROM korisnik";
		
		$rez = mysqli_query($db, $query1);
		$flag=0;
		while($row = mysqli_fetch_array($rez)) {
 		
		
		if (strcmp($row['username'],$user)==0) {
			$flag=1; 
			
			$Message = urlencode("Korisničko ime već postoji!");
            header("Location:http://localhost/website/registracija.php?Message=".$Message);
            die; 
		
		}
		
		}
		
		
	
if (!$flag){		
			
$ime_i_prez=$Ime." ". $Prezime;
$dat_rod=$Dan. ". ". $Mjesec. " ".$Godina. ".";



if (isset($_FILES["Slika"]["name"]) && ($_FILES['Slika']['size'] != 0) &&  ($_FILES['Slika']['error'] == 0)) {

if(!is_dir("images")){mkdir("images",0777);}


$target = "images/" . $user ."/";
mkdir($target, 0777);
$target = $target . basename( $_FILES["Slika"]["name"]);




if(move_uploaded_file($_FILES["Slika"]["tmp_name"], $target))
{
//Tells you if its all ok

}
else {

//Gives and error if its not
echo "Greška, slika nije snimljena. Vratite se nazad i pokušajte ponovo. <br>";
}



}

else {
	
	
	
	if (!is_dir("images")) {mkdir("images",0777);}
	
	mkdir("images/". $user . "/", 0777);
	copy("default.png", "images/". $user . "/default.png"); 
	$target="images/". $user . "/default.png"; 
	
	
	}



$query = "INSERT INTO korisnik VALUES ('".$user."', '".$pass."', '".$ime_i_prez."', '".$Adresa."', '".$Mjesto."', '".$Telefon."', '".$Mail."', '".$dat_rod."', '".$Spol."','".$target."' )";

$val=mysqli_query($db, $query);



}
mysqli_query($db,"DELETE FROM korisnik WHERE username=''");
if (file_exists("images/default.png")){unlink("images/default.png");}

if(!$val){echo "Došlo je do greške!";}
else {
$url ="http://localhost/website/prijava.php";
$time_out = 3; 

echo "Uspješno ste se registrirali, bit ćete preusemjereni za par sekundi za prijavu!";
header("refresh: $time_out; url=$url");
}


mysqli_close($db);


?>


</body>
</html>