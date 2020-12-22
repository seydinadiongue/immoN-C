<?php
session_start();

if($_SESSION['login']==NULL)
	header("Location:connexion.php");
?>
<!doctype html>
<html>
<head>
 <meta charset="utf-8">
 <title>Accueil agent</title>
 <link rel="stylesheet" href="admine.css" />
</head>
<body  id="body">

	<?php
			$con=new PDO("mysql:host=127.0.0.1;dbname=immo","root","");
			
			if(isset($_POST["loc"]))
			{
				$a='delete from location where idLoc='.$_POST["loc"].'';
				$rek=$con->exec($a);
				
				$b='update bien set etat="disponible" where idBien='.$_POST["bien"].'';
				$rek=$con->exec($b);
				header("location:location1.php");
			}
				
	?>
</body>
</html>