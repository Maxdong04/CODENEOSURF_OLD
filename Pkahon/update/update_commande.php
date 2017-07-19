	
	<?php 
		
		if(isset($_POST['id']) AND $_POST['getCodo'] AND $_POST['id_id']){
			
			$id = $_POST['id'];
			$id_id = $_POST['id_id'];
			$getCodo = $_POST['getCodo'];
			$message = 'L\'achat de votre code Neosurf a été validé avec succès. Récupérez votre code dans votre panneau de code!';
			$bold = 'bold';
			
			
			include '../plug.php';
			
			$res=$bdd->prepare('UPDATE codeneosurf_commande SET codo=:codo, stat=:stat, bold=:bold WHERE id=:id');
			$res->execute(array(
			':codo'=>$getCodo,
			':stat'=>'valid',
			':bold'=>$bold,
			':id'=>$id
			));
			echo '<div class="goodcode">Code vendu avec succès!</div>';
			
			
			$ress=$bdd->prepare('INSERT INTO codeneosurf_notif(id_id, message, bold) VALUES(:id_id, :message, :bold)');
			$ress->execute(array(
				':id_id'=>$id_id,
				':message'=>$message,
				':bold'=>'titleb'
			));
			
		}
		
	?>

<script>
    $(function(){
		$('.window').load('call/call_commande.php');
    });
</script>