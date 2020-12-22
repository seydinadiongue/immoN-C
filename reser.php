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
 <script src="jquery-3.4.1.min.js"></script>
 <link rel="stylesheet" href="admine.css" />
</head>
<body  >

		<?php
		$con=new PDO("mysql:host=127.0.0.1;dbname=immo","root","");
			
			if(isset($_POST["id"]))
			{
				$id=$_POST["id"];
				$a=$_POST["et"];
				$c=$_POST["image"];
				$r='update bien set etat="indisponible" where idBien='.$id.'';
				$req=$con->exec($r);
				 
				 $req=$con->prepare('insert into location (idBien,image) values (?,?)');
				 $req->execute(array($_POST["id"],$_POST["image"]));
				 
				$r='update reservation set etat="valider" where idReservation='.$a.'';
				$req=$con->exec($r);
				header("location:reservation1.php"); 
			}
				
		?>
</body>
</html>
	