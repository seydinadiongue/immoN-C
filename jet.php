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
<section id='span'>
<a class="app"  href="admin.php"> Retour</a>
<a class="app"  href="index.php"> Accueil</a>
<a class="app" href="connexion.php"> Se déconnecter</a>
		<h1 id='h11'>Agence FREE immobilier</h1>
		
</section>
<header>
	
<img id ='b' src  ="icon4.png"/>

<img id ='b' src  ="icon4.png"/>
<img id ='b' src  ="index.4jpg.jpg"/>
<img id ='b' src  ="icon4.png"/>
<img id ='b' src  ="icon4.png"/>

	</header>

		<section id='span'>
        <a  class="gf" href="reservation.php" >Réservations </a>
		<a class="gf" href="location.php" >location </a>
		<a  class="gf" href="bien.php" > Biens</a>
		<a class="gf" href="agent.php" > Gestion Agents</a>
		<a class="gf" href="client.php" > Gestion Clients</a>
		<a class="gf" href="ajouter.php"> Ajout de bien </a>
		</section>
	
	
	
	<?php
			$con=new PDO("mysql:host=127.0.0.1;dbname=immo","root","");
			if(isset($_POST["etat"]))
			{
				$id=$_POST["etat"];
				$r='delete from reservation where idReservation='.$id.'';
				$req=$con->exec($r);
				header("location:reservation.php");
			}
			
			
		?>
</body>
</html>
	
