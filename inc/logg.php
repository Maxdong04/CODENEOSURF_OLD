<?php 
		
	if(isset($_SESSION['emails'])){
		include 'plug.php';
		$reo=$bdd->prepare('SELECT * FROM codeneosurf_account WHERE emails=:emails');
		$reo->execute(array(':emails'=>$_SESSION['emails']));
		while($show=$reo->fetch()){
			$id_id = $show['id'];
			$nom = $show['nom'];
			$prenom = $show['prenom'];
			$pays = $show['pays'];
			$tele = $show['tele'];
			$emails = $show['emails'];
			$pwd = $show['pwd'];
		}
		
	}
?>
