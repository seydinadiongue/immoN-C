<?php
session_start();

if($_SESSION['login']==NULL)
	header("Location:connexion.php");
?>
<!doctype html>
<html>
<head>
 <meta charset="utf-8">
 <title>Gestion Réservation agent</title>
 <script src="jquery-3.4.1.min.js"></script>
 <link rel="stylesheet" href="admine.css" />
</head>
<body  >
<section id='span'>
<a class="app"  href="accueilagent.php"> Retour</a>
		<h1 id='h11'>FREE immobilier</h1>
		
</section>
<header>
	
<img id ='b' src  ="icon4.png"/>

<img id ='b' src  ="icon4.png"/>
<img id ='b' src  ="index.4jpg.jpg"/>
<img id ='b' src  ="icon4.png"/>
<img id ='b' src  ="icon4.png"/>

	</header>

		<section id='span'>
		<a  class="gfi" class="ch" href="profil.php" > Modifier profil </a>
        <a id="kal" class="gfi" href="reservation1.php" >Réservations </a>
		<a class="gfi" href="location1.php" >locations </a>
		<a  class="gfi" href="bien1.php" > Biens</a>
		<a class="gfi" href="ajouter1.php" >Ajout de bien  </a>
		<a class="gfi" href="connexion.php"> Se déconnecter</a>
		</section>
	
	
	
	<?php
			$con=new PDO("mysql:host=127.0.0.1;dbname=immo","root","");
			$req="select * from reservation  where etat='en attente'";
			$res=$con->query($req);
			while($r=$res->fetch())
			{
				$i=$r['image'];
			echo'<div id="di" style="height:450px;margin-bottom:20px;margin-top:20px;margin-left:20px;">';
            
			echo'<img  id="img" src="uploads/' ; echo $i ;echo '" />';
			
			echo'<span style="font-size:200%;color:black;">N° Client:'.$r["idClient"].'<br/>';
			echo'Date:'.$r["date"].'<br/></span>';
			
			echo'<form style="display:inline-block;" id="f2" method="post" action="reser.php" >';
			echo'<input id="f3" type="hidden" name="et" value='.$r["idReservation"].' />
				<input type="hidden" name="id" value='.$r["idBien"].' />
				<input type="hidden" name="image" value='.$r["image"].' />
				<input type="hidden" name="date" value='.$r["date"].' />
				<input type="hidden" name="idClient" value='.$r["idClient"].' />
				<input type="submit" value="valider" style="background:blue;border-radius:10px;
				color:white;margin-bottom:20px;margin-left:30px;margin-top:20px;height:190%;padding-bottom:10px;padding-top:10px;width:100%;font-size:110%;" />
				</form>';
			echo'<form  style="display:inline-block;"   method="post" action="rejet.php">';
			echo'<input type="hidden" name="etat" value='.$r["idReservation"].' />
				<input type="submit" value="Rejeter" style="background:red;border-radius:10px;
				color:white;margin-bottom:20px;margin-left:80px;
  margin-top:0px;height:170%;padding-bottom:10px;
  padding-top:10px;width:52%;font-size:110%;" />
				</form>';
            echo"</div>";			
				
			}
		
			
				
		?>
<script>
	$('input').click(function()
	{
	if($(this).val()=="Rejeter")
	return confirm("Voulez vous vraiment rejeter ?");
	}
	);
	</script>
	
	<script>
	$('input').click(function()
	{
	if($(this).val()=="valider")
	alert("Reservation validée avec succés ?");
	}
	);
	</script>

	
</body>
</html>