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
 <style>
 body{
	 background-image:url('back.jpg');
 }
  </style>
</head>
<body  >

	</header>
	<?php
	
	
	
	 $con=new PDO("mysql:host=localhost;dbname=immo","root","");
	 $requete=$con->prepare("select * from location where idLoc=?");
	 if(isset($_POST["loc"]))
	 $_SESSION["loc"]=$_POST["loc"];
	 $requete->execute(array($_SESSION["loc"]));
	 $res=$requete->fetch();
	 echo'
	<form style="background-color:aqua
	;width:85%;"method="post" action="" id="f1" >
	<div id="jeu">

	<input class="inp"type="hidden" value='.$res["idLoc"].' name="idloc"  placeholder="numero de loacation" /> 
	</div>
	
	<div id="jeu">
	
	     <label class="lab">Date Sortie</label>
		 
		<input required="*" class="inp" type="date" value="'.$res["dateSortie"].' " name="dateout" placeholder="Donner la date de Sortie"/>
	</div>
	<div id="jeu">
	    <label class="lab">Montant Arriéré</label>
		
		<input required="*"  class="inp" type="number" value="'.$res["arriere"].'" name="arriere" placeholder="Le Montant Arriéré"/>
	</div>
	<div>
		<input id="inp" type="submit" value="Confirmer" id="louer" style="margin-top:20px;margin-left:500px;margin-bottom:70px;width:50%;
				color:white;font-size:150%;background-color:blue; "/>
	</div>
	</form>';
	
	$jour=Date("y/m/d");
date_default_timezone_set("UTC");
	  if(isset($_POST["dateout"]) 
 && ($_POST["dateout"]!=null)  
 && ($_POST["arriere"]!=null)
	  && isset($_POST["arriere"]) && isset($_POST["idloc"]))
	  {
		  
			$con=new PDO("mysql:host=127.0.0.1;dbname=immo","root","");
			$requete=$con->prepare("update location set dateSortie=? ,arriere=? where idLoc=?");
             $requete->execute(array($_POST["dateout"],$_POST["arriere"],$_POST["idloc"]));
			if($requete)
				echo'<script>alert("Modification reussie !!!");</script>';
			//header("location:loc.php");
	
	  
	  }
	?>
	
	<script>
  var ips=document.getElementsByTagName('input');
  var form=document.getElementById('form');
		 var l=ips.length;
		 for( var i=0;i<l;i++)
		 {
		 ips[i].addEventListener('change',function()
		 {
	if((this.value <"0") || (this.value =="")|| (this.value ==0))
	{ 
this.style.border='5px solid red';
alert("Valeur saisie incorrecte !!!");
    this.focus();
   this.value="";
   
  
	}
		 //this.value="";
		/* form.addEventListener('submit',function()
		 {
			alert("Vous avez modifier votre compte ");
		 },false);*/
		 
		 },false);
		 }
		 
		
</script>
</html>