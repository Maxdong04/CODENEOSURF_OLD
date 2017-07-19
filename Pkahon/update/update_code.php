	
	<?php 
		
		if(isset($_GET['id']) AND $_GET['etat']){
			
			$id = $_GET['id'];
			$etat = $_GET['etat'];
			
			
			include '../plug.php';
			
			$res=$bdd->prepare('UPDATE codeneosurf_codes SET etat=:etat WHERE id=:id');
			$res->execute(array(
			':etat'=>$etat,
			':id'=>$id
			));
			header('location:../index.php');
			
		}
		
	?>

<script>
    $(function(){
		$('.window').load('call/call_commande.php');
    });
</script>