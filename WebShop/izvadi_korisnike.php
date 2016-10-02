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

$rez = mysqli_query($db, "SELECT username, mjesto, email FROM korisnik");
$broj=0;
echo "<caption>Registrirani korisnici:</caption>";

echo "<tr><th style=\"border:0 none;\">&nbsp</th><th style=\"border:0 none;\">Korisničko ime</th><th style=\"border:0 none;\">Mjesto</th><th style=\"border:0 none;\">E-mail</th><tr>";
while($row = mysqli_fetch_array($rez)) {
$broj=$broj+1;
echo "<tr><td style=\"border:0 none;\">".$broj ."." ."</td><td style=\"border:0 none;\">" .$row['username']."</td><td style=\"border:0 none;\">" . $row['mjesto'] . "</td><td style=\"border:0 none;\">" . $row['email'] . "</td></tr>";
	
}

mysqli_close($db);


?>

</body>
</html>