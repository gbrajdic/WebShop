
<?php
			session_start();
			if(!empty($_SESSION['username'])){
			$_SESSION=array();
			session_destroy();
			header("Location:http://localhost/website/prijava.php");
			} 
			


?>
