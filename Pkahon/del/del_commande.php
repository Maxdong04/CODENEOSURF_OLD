<?php 
	
	$id = $_GET['id'];
	
	include '../plug.php';
	
	$res = $bdd->prepare('DELETE FROM codeneosurf_commande WHERE id=:id');
	$res->execute(array(':id'=>$id));
	
	header('location:../index.php');
	
	
?>