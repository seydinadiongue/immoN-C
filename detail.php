<!doctype html>
<html>
<head>
 <meta charset="utf-8">
 <title>plus d'informations</title>
 
 <script src="jquery-3.4.1.min.js"></script>
  <script src="bootstrap/js/bootstrap.js"></script>
 <link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
 <link rel="stylesheet" href="index.css" />
 <link rel="stylesheet" href="styles_detail.css" />
</head>
<body >


	
	<?php
	if(isset($_POST["id"]))
	{
	$con=new PDO("mysql:host=127.0.0.1;dbname=immo","root","");
	$req='select * from bien where idBien='.$_POST["id"].'   ';
	$res=$con->query($req);
	$resultat=$res->fetch();
		$i=$resultat['image'];
		$i1=$resultat['image1'];
		$i2=$resultat['image2'];
		$desc=stripslashes($resultat["description"]);
		echo"<div class='container row'style='margin-bottom:50px;
		margin-top:0px;'>";
		 echo"<div class='slideshow'>";
		echo'<ul>';
		echo'<li><img  id="dim" src="uploads/' ; echo $i ;echo '" /></li>';
		
		echo'<li><img  id="dim" src="uploads/' ; echo $i1 ;echo '" /></li>';
		
		 echo'<li><img  id="dim" src="uploads/' ; echo $i2 ;echo '" /></li>';
			 echo"</ul></div>";

			echo"<div class='col-lg-3' >";
		echo'<p id="ya">';
		//echo'<span class="id1" class="id">Type:</span><span  class="res1"class="res">'.$resultat["type"].'</span><br/>';
		//echo'<span class="id1" class="id">Adresse:</span><span  class="res1"class="res">'.$resultat["adresse"].'</span><br/>';
			echo"<div class='col-lg-3' id='des'>";
			
		echo'<span class="id1" class="id" style="margin-left:120px;
		text-decoration:underline;color:white;font-weight:bold;
		font-size:250%;">Description:</span><br><br>';//<span  class="res1"class="res">'.$resultat["prix"].' f cfa</span><br/>';
		echo'<span class="res1" class="res" ></span><span   class="id1" class="id" style="color:white;width:400px;"> '.$desc.'</span>';
		echo'</p>';
		echo"</div>";
		echo"</div>";
			echo"</div>";
	}
	
	?>
	
	
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
 
<script type="text/javascript">
   $(function(){
      setInterval(function(){
         $(".slideshow ul").animate({marginLeft:-350},800,function(){
            $(this).css({marginLeft:0}).find("li:last").after($(this).find("li:first"));
         })
      }, 3000);
   });
</script>


</body>
</html>