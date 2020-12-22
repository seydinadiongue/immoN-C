<?php
session_start();

if($_SESSION['login']==NULL)
	header("Location:connexion.php");
?>
<! doctype html>
<html>
<head>
 <meta charset="utf-8">
 <script src="jquery-3.4.1.min.js"></script>
  <script src="bootstrap/js/bootstrap.js"></script>
 <link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
 <style>
 body{
	 background-image:url('');
 }
  </style>
</head>
<body>
<?php
$poids_max = 512000; // Poids max de l'image en octets (1Ko = 1024 octets)
$repertoire = 'uploads/'; // Repertoire d'upload

if (isset($_FILES['fichier']) and isset($_FILES['fichier1'])
 and isset($_FILES['fichier2'])  and isset($_POST['adresse'])
and isset($_POST['type']) and isset($_POST['prix'])	 and isset($_POST['desc'])
and ($_POST['prix']>0 )and ($_POST['desc']!=null) and ($_POST['adresse']!=null)
and ($_POST['type']!=null))
{
   
  $p= $_POST['prix'];
   $a= $_POST['adresse'];
    $t= $_POST['type'];
	$d=addslashes( $_POST['desc']);
   // On vérifit le type du fichier
   if ($_FILES['fichier']['type'] != 'image/png' 
   && $_FILES['fichier']['type'] != 'image/jpeg'
   && $_FILES['fichier']['type'] != 'image/jpg'
   && $_FILES['fichier']['type'] != 'image/gif'
   
   
   && $_FILES['fichier1']['type'] != 'image/png' 
   && $_FILES['fichier1']['type'] != 'image/jpeg'
   && $_FILES['fichier1']['type'] != 'image/jpg'
   && $_FILES['fichier1']['type'] != 'image/gif'
   
   
   
   && $_FILES['fichier2']['type'] != 'image/png' 
   && $_FILES['fichier2']['type'] != 'image/jpeg'
   && $_FILES['fichier2']['type'] != 'image/jpg'
   && $_FILES['fichier2']['type'] != 'image/gif'
   
   )
   {
      $erreur = 'Les fichiers doivent être tous au format *.jpeg, *.gif ou *.png .';
   }
   
   // On vérifit le poids de l'image
   elseif( ($_FILES['fichier']['size'] > $poids_max)
   || ($_FILES['fichier1']['size'] > $poids_max)
   || ($_FILES['fichier2']['size'] > $poids_max))
   {
      $erreur = 'Les images doivent être inférieurs à ' . $poids_max/1024 . 'Ko.';
   }
   
   // On vérifit si le répertoire d'upload existe
   elseif (!file_exists($repertoire))
   {
      $erreur = 'Erreur, le dossier d\'upload n\'existe pas.';     
   }
   
   // Si il y a une erreur on l'affiche sinon on peut uploader
   if(isset($erreur))
   {
      
	  echo '' . $erreur . '<br><a href="javascript:history.back(1)">Retour</a>';
   }
   else
   {
         
      // On définit l'extention du fichier puis on le nomme par le timestamp actuel
      if ($_FILES['fichier']['type'] == 'image/jpeg') { $extention = '.jpeg'; }
      if ($_FILES['fichier']['type'] == 'image/jpeg') { $extention = '.jpg'; }
      if ($_FILES['fichier']['type'] == 'image/png') { $extention = '.png'; }
      if ($_FILES['fichier']['type'] == 'image/gif') { $extention = '.gif'; }
    
	  $nom_fichier = time().$extention;
	  
	  if ($_FILES['fichier1']['type'] == 'image/jpeg') { $extention1 = '.jpeg'; }
      if ($_FILES['fichier1']['type'] == 'image/jpeg') { $extention1 = '.jpg'; }
      if ($_FILES['fichier1']['type'] == 'image/png') { $extention1 = '.png'; }
      if ($_FILES['fichier1']['type'] == 'image/gif') { $extention1 = '.gif'; }
	    $b=time()+1;
	  $nom_fichier1 = $b.$extention1;
	  
	  
	  if ($_FILES['fichier2']['type'] == 'image/jpeg') { $extention2 = '.jpeg'; }
      if ($_FILES['fichier2']['type'] == 'image/jpeg') { $extention2 = '.jpg'; }
      if ($_FILES['fichier2']['type'] == 'image/png') { $extention2= '.png'; }
      if ($_FILES['fichier2']['type'] == 'image/gif') { $extention2 = '.gif'; }
	  	   $c=time()+2;
	  $nom_fichier2 =  $c.$extention2;
	  
	  
             
      // On upload le fichier sur le serveur.
      if ((move_uploaded_file($_FILES['fichier']['tmp_name'], $repertoire.$nom_fichier))
		 and (move_uploaded_file($_FILES['fichier1']['tmp_name'], $repertoire.$nom_fichier1))
	 and (move_uploaded_file($_FILES['fichier2']['tmp_name'], $repertoire.$nom_fichier2)))
      {
         $url = 'www.monsite.com/'.$repertoire.''.$nom_fichier.'';
         //echo 'Votre image à été uploadée sur le serveur avec succes!<br>Voici le lien: <input type="text" value="' . $url . '" size="60">';
     

	 
		 $bd= new PDO("mysql:host=localhost;dbname=immo","root","");
	if($bd) 
		$r=$bd->exec("insert into bien value ('','$a','$t','$p','$d','$nom_fichier'
	,'$nom_fichier1','$nom_fichier2','disponible')");
	if($r){
			
	echo"<script>alert('Le bien est inseré avec succés  !!!'); </script>";
	
	
	
	}
	





	
	
	
	
	
	 }
      else
      {
         echo 'L\'image n\'a pas pu être uploadée sur le serveur.';
		 
	
      }
     
   }
   
}
else
{
   ?>
   <div class="col-lg-6 well container card-bady" style="margin-left:320px;background:aqua;">
   <form method="post" enctype="multipart/form-data" action='' >
     <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $poids_max; ?>">
       <div class="form-group">
	   <label>Adresse</label>
	   <input type="text" class="form-control" class="input-group"name="adresse"
	   placeholder="adresse" required />
 <br>
	 </div>
	  <div class="form-group">
	   <label>Type</label>
	  <select type="text" class="form-control" class="input-group" name="type" placeholder="type">
	  <option>Immeuble</option>
	  <option>Appartement</option>
	  </select> <br>
	  </div>
	   <div class="form-group">
	   <label>Prix</label>
	  <input required="*" type="number" class="form-control" class="input-group"name="prix" placeholder="prix"/>
	   <br></div>
	  <div class="form-group">
	   <label>Description</label>
	  <textarea required="*" type="textarea"class="form-control" class="input-group"
	  name="desc" placeholder="description"/> </textarea><br>
	  </div>
	 <div class="form-group">
	   <label>Images</label>
	   <input required="*" type="file" class="form-control" class="input-group"name="fichier"><br>
	   <input required="*" type="file" class="form-control" class="input-group"name="fichier1"><br>
	   <input required="*" type="file" class="form-control" class="input-group"name="fichier2"><br>
	   </div><br><br>
	   <div class="container">
      <input class="btn btn-primary" type="submit" value="Ajouter" style="margin-left:180px;"/>
	   <input class="btn btn-danger" type="reset" value="Annuler" style="margin-left:90px;"/>
	   </div>
   </form>
   </div>
   <?php
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