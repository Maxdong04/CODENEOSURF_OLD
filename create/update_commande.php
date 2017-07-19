	<?php session_start(); if(isset($_SESSION['emails'])){ }else{ header('location:index.php'); } ?>
	<?php 
		
		if(isset($_GET['po'])){
			
			$id = $_GET['po'];
			$stat = 'del';
			
			
			include '../plug.php';
			
			$res=$bdd->prepare('UPDATE codeneosurf_commande SET stat=:stat WHERE id=:id');
			$res->execute(array(
			':stat'=>$stat,
			':id'=>$id
			));
			header('location:../codeneosurf_code_panel.php');
			
		}
		
	?>

<script>
    $(function(){
		$('.window').load('call/call_commande.php');
    });
</script>