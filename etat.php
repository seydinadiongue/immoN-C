<!doctype html>
<html>
<head>
 <meta charset="utf-8">
 <title>Accueil agent</title>
 <link rel="stylesheet" href="style.css" />
</head>
<body >
	<header>
		<h1>SEN ESPACE LOGEMENT</h1>
	</header>
		<?php
			$con=new PDO("mysql:host=127.0.0.1;dbname=immo","root","");
			$req="select * from reservation";
			$res=$con->query($req);
			echo"<table><thead> <th>idreservation</th> <th>idbien</th> <th>date</th> <th>idclient</th> <th>Confirmer</th> </thead>";
			while($r=$res->fetch())
			{
				echo'<tr><td>'.$r["idReservation"].'</td>';
				echo'<td>'.$r["idBien"].'</td>';
				echo'<td>'.$r["date"].'</td>';
				echo'<td>'.$r["idClient"].'</td>';
				echo'<td>';
				if($r["etat"]=="annuler")
				{
					echo"<form action='etat.php' method='post' >
					     <input type='hidden' name='etat' value='annuler' />
					     <input type='hidden' etat='pseudo' value=".$r["idReservation"]." />
						 <input type='submit' value='non' style='background:red;color:black;' />
					</form>";
				}
				else
				{
					echo"<form action='etat.php' method=post >
					     <input type='hidden' name='etat' value='valider'/>
					     <input type='hidden' etat='pseudo' value=".$r["idReservation"]." />
						 <input type='submit' value='oui' style='background:green;color:black;' />
					</form>";
				}
				echo'</td></tr>';
			}
			echo"</table>";
		
			
if(isset($_POST['etat']) and isset($_POST['pseudo']))
{
	$pseudo = $_POST['pseudo'];
	$etat = $_POST['etat'];
	$activer = 'valider';
	$desactiver = 'annuler';
	if($etat=="valider")
	{
		$req2="update compte set etat='$desactiver' where pseudo like '$pseudo'";
		$res=$con->exec($req2);
		if($res != -1)
		{
			echo "reussi ";
			header("Location:reservation.php");
		}
		
	}
	else if ($etat=="annuler")
	{
		$req2="update compte set etat='$activer' where pseudo like '$pseudo'";
		$res=$con->exec($req2);
		if($res != -1)
		{
			echo "reussi ";
			header("Location:reservation.php");
		}
		
	}
}
		?>
</body>
</html>