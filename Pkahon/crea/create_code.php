<?php	
		
		echo 'HHHHH';
		
		if(isset($_POST['prix']) AND $_POST['prix_cfa']){
		
			$prix = $_POST['prix'];
			$prix_cfa = $_POST['prix_cfa'];
			$etat = 'no';
			
			include '../plug.php';
			
			
			$ress=$bdd->prepare('INSERT INTO codeneosurf_codes(prix, prix_cfa, etat) VALUES(:prix, :prix_cfa, :etat)');
			$ress->execute(array(
				':prix'=>$prix,
				':prix_cfa'=>$prix_cfa,
				':etat'=>$etat
			));
			
			//header('../index.php');
		}		
?>