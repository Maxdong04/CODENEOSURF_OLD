<?php session_start(); ?>
<?php	
		
		if(isset($_POST['id_id']) AND $_POST['nompre'] AND $_POST['emails'] AND $_POST['codeneo'] AND $_POST['pays'] AND $_POST['tele']){
			
			$id_id = $_POST['id_id'];
			$nompre = $_POST['nompre'];
			$emails = $_POST['emails'];
			$codeneo = $_POST['codeneo'];
			$pays = $_POST['pays'];
			$tele = $_POST['tele'];
			$datee = gmdate('d-m-Y | H:i:s');
			
			include '../plug.php';
			
			
				$ress=$bdd->prepare('INSERT INTO codeneosurf_commande(id_id, nompre, emails, codeneo, pays, tele, datee, stat) VALUES(:id_id, :nompre, :emails, :codeneo, :pays, :tele, :datee, :stat)');
				$ress->execute(array(
					':id_id'=>$id_id,
					':nompre'=>$nompre,
					':emails'=>$emails,
					':codeneo'=>$codeneo,
					':pays'=>$pays,
					':tele'=>$tele,
					':datee'=>$datee,
					':stat'=>'wait'
				));
				
				header('location:../codeneosurf_code_panel.php?succes=true');
			
		}else{
			header('location:../index.php?failcomm=fill');
		}
		
		
		
?>