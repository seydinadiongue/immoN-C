<?php

	$rec=$_GET['rec'];
	$bd=new PDO("mysql:host=localhost;
	dbname=immo","root","");
	if($bd)

$r=$bd->query("select * from bien where adresse like '%$rec%'"); 
	if($r)
		echo"<ol style='list-style:none;'>";
	while($ligne=$r->fetch()) {
	$id=$ligne['adresse'];
	echo"<li style='list-style:none;'>$id </li>";
	echo"</ol>";
	}
?>