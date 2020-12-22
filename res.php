<!doctype html>
<html>
<head>
 <meta charset="utf-8">
 <title>reservation</title>
 <link rel="stylesheet" href="index.css" />
</head>
<body >
<header>
		<h1>SEN ESPACE LOGEMENT</h1>
	</header>
	
	<?php
	$con=new PDO("mysql:host=127.0.0.1;dbname=immo","root","");
	$re=$con->prepare("insert into reservation (idBien,date,image,etat) values(?,?,?,?)");
	$date=date("H:i:s");
	$jour=date("d/m/y");
	
	$a="en cours";
	$re->execute(array($_POST["id"],$jour,$_POST["image"],$a));
	
	
	$req='select * from reservation where idBien like "'.$_POST["id"].'" and image like "'.$_POST["image"].'" ';
	$res=$con->query($req);
	$resu=$res->fetch();
	echo'<img src="'.$_POST["image"].'" />';
	echo'<form method="post" action="">';
	echo'<input type="hidden" name="identifiant" value='.$resu["idReservation"].' />
	     <input type="date" name="date" /><br/>
		 <input type="submit" value="confirmer la réservation" /> </form>';
		 $a="en cours";
		 if(isset($_POST["date"]))
		 {
	$req1=$con->prepare("update reservation set date=?  where idReservation=?");
    $req1->execute(array($_POST["date"],$_POST["identifiant"]));
		 }
		
	?>

</body>
</html>