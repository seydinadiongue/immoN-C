<?php
session_start();
if($_SESSION['login']==null)
	header("Location:connexion.php");
?>

<head>
 <meta charset="utf-8">
 <title>Accueil agent</title>
 <style>
 body{
	 background-image:url('back.jpg');
 }
  </style>
<script src="jquery-3.4.1.min.js"></script>
  <script src="bootstrap/js/bootstrap.js"></script>
 <link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
 
</head>
<body  id="bodyl" >
<section id='span'>


		
		
</section>
<header>
	

	</header>
	
	
	
		<?php
		
		if(isset($_POST['idBie'] ) and  ($_POST['idBie']!=null ))
	    {
			$con=new PDO("mysql:host=localhost;dbname=immo","root","");
			$req='select  * from bien where idBien='.$_POST['idBie'].'';
			$res=$con->query($req);
			$resultat=$res->fetch();
		
		$id=$resultat["idBien"];
		$type=$resultat["type"];
		$etat=$resultat["etat"];
		$ad=$resultat["adresse"];
		$prix=$resultat["prix"];
		$img=$resultat["image"];
		$img1=$resultat["image1"];
		$img2=$resultat["image2"];
		$desc=stripslashes($resultat["description"]);
      	
	    
	
	
   echo' <div class="col-lg-6 well container card-bady" style="margin-left:320px;background:aqua;">
   <form style="margin-top:50px;"method="post" enctype="multipart/form-data" action="" >
		
				<input class="inp"type="hidden" name="idbien" placeholder="identifiant Bien" value='.$resultat["idBien"].' >
		 
		  
		     <div class="form-group">
				<label class="lab">Type </label><br/>';
				
				if($resultat["type"]=="Immeuble")
				{
					echo'
			<select class="form-control input-group" class="inp" type="text" name="type"
				value='.$resultat["type"].' >
		  <option>Immeuble</option>
		   <option>Appartement</option>
				</select>';}
				else{
				echo'
			<select class="form-control input-group" class="inp" type="text" name="type"
				value='.$resultat["type"].' >
		  <option>Appartement</option>
		   <option>Immeuble</option>
				</select></div>';}
				echo'
		  
		  <div class="form-group">
				<label class="lab">Etat du Bien</label><br/>
				<input class="form-control input-group"  class="inp" type="text" name="etat" placeholder="donner le nouveau etat" value='.$etat.' >
		  </div>
		 <div class="form-group">
				<label class="lab">Adresse</label><br/>
				<input class="form-control input-group" class="inp" type="text" name="adresse" placeholder="Adresse" value='.$ad.' >
		  </div>
		  <div class="form-group">
				<label>Prix</label><br/>
				<input  class="form-control input-group" class="inp" type="number" name="prix" placeholder="le nouveau Prix" value='.$prix.' >
		  </div>
		  <div class="form-group">
				<label class="lab">Description</label><br/>
				<textarea class="form-control input-group"  id="inpu" type="text" name="description" placeholder="description"  >'.$desc. '</textarea>
		  </div>
		   <div class="form-group">
				<label class="lab">Nouvelle image</label><br/>
				<input class="form-control input-group" type="hidden" name="MAX_FILE_SIZE" value="<?php echo $poids_max; ?>">
				
		 <input class="form-control input-group" class="inp" type="file" 
		 name="fichier" placeholder="Nouvelle image" value='.$img.' >

		 </div>
		
				<input class="btn btn-information" id="inp" type="submit" value="Enregistrer" id="modifie" 
				style="margin-top:50px;margin-left:180px;
				color:white;font-size:150%;background-color:blue; "/>
		 <input type="reset" style="margin-top:50px;margin-left:70px;
				color:white;font-size:150%;" class="btn btn-danger" value="Annuler">
		  
		</form>
	</div>';
		}
		
		
	?>
	
	<?php
	if(isset($_POST['idbien'])){
	if(($_POST["adresse"]!=null) and($_POST["etat"]!=null) 
		and ($_POST["type"]!=null) and ($_POST["prix"]!=null)
	and ($_POST["description"]!=null) and ($_POST["prix"]>0))
	{
		$poids_max = 512000; // Poids max de l'image en octets (1Ko = 1024 octets)
$repertoire = 'uploads/'; // Repertoire d'upload


	if(isset($_POST["idbien"]) and ($_POST["idbien"]!=null))
	{
		$con=new PDO("mysql:host=127.0.0.1;dbname=immo","root","");
		if(isset($_POST["etat"]) and ($_POST["etat"]!=null))
		{
			$c=$con->prepare("update bien set etat=? where idBien=?");
			$c->execute(array($_POST["etat"],$_POST["idbien"]));
		}
		if(isset($_POST["type"]) and ($_POST["type"]!=null))
		{
			$c=$con->prepare("update bien set type=? where idBien=?");
			$c->execute(array($_POST["type"],$_POST["idbien"]));
		}
		
		if(isset($_POST["adresse"]) and ($_POST["adresse"]!=null))
		{
			$c=$con->prepare("update bien set adresse=? where idBien=?");
			$c->execute(array($_POST["adresse"],$_POST["idbien"]));
		}
	     if(isset($_POST["type"]))
		{
			$c=$con->prepare("update bien set prix=? where idBien=?");
			$c->execute(array($_POST["type"],$_POST["idbien"]));
		}
		 
		if(isset($_POST["prix"]) and ($_POST["prix"]>0))
		{
			$c=$con->prepare("update bien set prix=? where idBien=?");
			$c->execute(array($_POST["prix"],$_POST["idbien"]));
		}
	
		if(isset($_POST["description"]) and ($_POST["description"]!=null))
		{
			$desc=addslashes( $_POST['description']);
			$c=$con->prepare("update bien set description=? where idBien=?");
			$c->execute(array($desc,$_POST["idbien"]));
		}
	
		
		
			if(isset($_FILES["fichier"])and($_FILES["fichier"]==null))
			{
				
				
				
				 $c=$con->prepare("update bien set image=? where idBien=?");
							$cheikh=$c->execute(array($img,$_POST["idbien"]));
				
				if($cheikh)
				echo"<script>alert('Bien modifié');</script>";
			}
			
			else if(isset($_FILES["fichier"])and($_FILES["fichier"]!=null))
			
			
				 // On vérifit le type du fichier
				   if ($_FILES['fichier']['type'] != 'image/png' && $_FILES['fichier']['type'] != 'image/jpeg' && $_FILES['fichier']['type'] != 'image/jpg' && $_FILES['fichier']['type'] != 'image/gif')
				   {
					  $erreur = 'Le fichier doit être au format *.jpeg, *.gif ou *.png .';
				   }
				   
				   // On vérifit le poids de l'image
				   elseif ($_FILES['fichier']['size'] > $poids_max)
				   {
					  $erreur = 'L\'image doit être inférieur à ' . $poids_max/1024 . 'Ko.';
				   }
				   
				   // On vérifit si le répertoire d'upload existe
				   elseif (!file_exists($repertoire))
				   {
					  $erreur = 'Erreur, le dossier d\'upload n\'existe pas.';     
				   }
				   
				   // Si il y a une erreur on l'affiche sinon on peut uploader
				   // if(isset($erreur))
				   // {
					  // echo '' . $erreur . '<br><a href="javascript:history.back(1)">Retour</a>';
				   // }
				   else
				   {
						 
					  // On définit l'extention du fichier puis on le nomme par le timestamp actuel
					  if ($_FILES['fichier']['type'] == 'image/jpeg') { $extention = '.jpeg'; }
					  if ($_FILES['fichier']['type'] == 'image/jpeg') { $extention = '.jpg'; }
					  if ($_FILES['fichier']['type'] == 'image/png') { $extention = '.png'; }
					  if ($_FILES['fichier']['type'] == 'image/gif') { $extention = '.gif'; }
					  $nom_fichier = time().$extention;
						
					  // On upload le fichier sur le serveur.
					  if (move_uploaded_file($_FILES['fichier']['tmp_name'], $repertoire.$nom_fichier))
					  {
						  $chemin="uploads\\".$nom_fichier;
					  
						   $c=$con->prepare("update bien set image=? where idBien=?");
							$cheikh=$c->execute(array($nom_fichier,$_POST["idbien"]));
					
					if($cheikh)
			echo"<script> alert('bien modifié avec succes !!!');</script>";
		
		

					  }
	     }
			
		
		
	 // header("location:detail.php");
	
	}
	}}
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
this.style.border='2px solid red';
alert("Valeur saisie incorrecte !!!");
    this.focus();
   this.value="";
   
  
	}
	else
		this.style.border='1px solid green';
		
		 },false);
		 }
		 
		
</script>




</body>
</html>