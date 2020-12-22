<html>
<head><title>Uploadez vos images!</title></head>
<body>

<?php
$poids_max = 512000; // Poids max de l'image en octets (1Ko = 1024 octets)
$repertoire = 'uploads/'; // Repertoire d'upload

if (isset($_FILES['fichier']))
{
   
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
             
      // On upload le fichier sur le serveur.
      if (move_uploaded_file($_FILES['fichier']['tmp_name'], $repertoire.$nom_fichier))
      {
         $url = 'www.monsite.com/'.$repertoire.''.$nom_fichier.'';
         //echo 'Votre image à été uploadée sur le serveur avec succes!<br>Voici le lien: <input type="text" value="' . $url . '" size="60">';
     

	 
		 $bd= new PDO("mysql:host=localhost;dbname=amar","root","");
	if($bd)
		$r=$bd->exec("insert into personne value ('','2222222','Ndeye','thiam','$nom_fichier')");
	if($r){
		
		
		
		
		
		
	$bd= new PDO("mysql:host=localhost;dbname=amar","root","");
	if($bd)
$r=$bd->query("select * from personne "); 
	
while($ligne=$r->fetch()) {
	if($ligne)
	$id=$ligne['mail'];
	$no=$ligne['nom'];
	$do=$ligne['prenom'];
	$pr=$ligne['telephone'];
		$da=$ligne['image'];
		echo"<table>";
		echo'<tr>';
		echo"<td>$pr<br></td>";	
		echo"<td>$do<br></td>";
echo"<td>$no<br></td>";	
		
echo"<td><img src='uploads/$da'></td><br>";	
echo'<tr>';
echo"</table>";
}
	
	
	
	
	
	
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
   <form method="post" enctype="multipart/form-data">
      <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $poids_max; ?>">
      <input type="file" name="fichier">
      <input type="submit" value="Envoyer">
   </form>
   <?php
}
?>