<?php
session_start();
if($_SESSION['login']==null)
	header("Location:connexion.php");
?>
<!doctype html>
<html>
<head>
 <meta charset="utf-8">
 <title>Faire vos réservations</title>
 <script src="jquery-3.4.1.min.js"></script>
 <link rel="stylesheet" href="index.css" />
</head>
<style>
#sui{color:navy;background-color:white;border:1px solid white;}
#sui:hover{color:navy;background-color:aqua;}
</style>
<body >


<a  class='app'href="deconn.php" >Se Déconnecter</a>

<section id='span'>

<a  id="sui" class='gfi'href="suivre.php"  >Suivre mes reservations</a>
		<h1 id='h11' style="color:white;"> FREE immobilier</h1>
		
</section>
<header>
	
<img id ='b' src  ="icon4.png"/>

<img id ='b' src  ="icon4.png"/>
<img id ='b' src  ="index.4jpg.jpg"/>
<img id ='b' src  ="icon4.png"/>
<img id ='b' src  ="icon4.png"/>

	</header>
	
	
	<?php
	$con=new PDO("mysql:host=127.0.0.1;dbname=immo","root","");
	$req='select * from bien where etat like "disponible" ';
	$res=$con->query($req);
	while($resultat=$res->fetch())
	{
		$i=$resultat['image'];
		echo'<div  id="di" style="margin-bottom:20px;margin-top:20px;margin-left:20px;">';
		echo'<img  id="img" src="uploads/' ; echo $i ;echo '" />';
		echo'<span class="id">Type:</span><span class="res">'.$resultat["type"].'</span><br/>';
		echo'<span class="id">Adresse:</span><span class="res">'.$resultat["adresse"].'</span><br/>';
		echo'<span class="id">Prix:</span><span class="res">'.$resultat["prix"].' f cfa</span><br/>';
		echo'<form method="post" action="detail.php"  style="margin-left:60px;margin-top:5px;" > ';
		echo'<input  type="hidden" name="decription" value='.$resultat["description"].' />
		     <input type="hidden" name="id" value="'.$resultat["idBien"].'" />
			 <input type="hidden" name="image" value='.$resultat["image"].' />
			 <input  id="pata" type="submit" value="Plus d\'informations" style="background:lightblue;border-radius:10px;font-weight:bold;"/></form>'; 
		
		echo"<br>";
		echo'<form  method="post" action=""  style="margin-left:100px;margin-top:5px;" > ';
		echo'<input type="hidden" name="id" value="'.$resultat["idBien"].'" />
		 <input type="hidden" name="image" value='.$resultat["image"].' />
		  <input type="hidden" name="cli" value='.$_SESSION["login"].' />
		 <input type="submit" value="Réserver" style="background:aqua;border-radius:10px;font-weight:bold; margin-bottom:30px;color:navy;height:30px;" id="ad"/></form>'; 
       echo"</div>";
	}
	if(isset($_POST["id"]))
	{
		$s=$_SESSION["login"];
		//$ndey=$con->exec("insert into reservation (idClient) value('$s')");
		//if($ndey)
	$re=$con->prepare("insert into reservation (idBien,date,image,etat,idClient) values(?,?,?,?,?)");
	//$date=date("H:i:s");
	//$jour=date("y/m/d");
	
	
	
	
$jour=Date("y/m/d");




date_default_timezone_set("UTC");
$date=Date("H:i:s");






	$a="en attente";
	$re->execute(array($_POST["id"],$jour,$_POST["image"],$a,"$s"));
	
	}
	
	?>
	
	
	<script>
	$('input').click(function()
	{
	if($(this).val()=="Réserver")
		return confirm("Vous Confirmez la reservation ? ");
	
	

	}
	);
	</script>

</body>
</html>