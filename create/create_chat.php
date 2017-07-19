<?php session_start(); ?>
<?php	
		
		if(isset($_POST['post_mess']) AND $_POST['id_send']){
			
			$id_send = $_POST['id_send'];
			$id_rec = 'jo1';
			$id_prop = $id_send;
			$message = $_POST['post_mess'];
			$datee = date('d-m-Y');
			
			include '../plug.php';
			
			
				$ress=$bdd->prepare('INSERT INTO codeneosurf_chat(id_send, id_rec, message, id_prop, datee) VALUES(:id_send, :id_rec, :message, :id_prop, :datee)');
				$ress->execute(array(
					':id_send'=>$id_send,
					':id_rec'=>$id_rec,
					':message'=>$message,
					':id_prop'=>$id_prop,
					':datee'=>$datee
				));
				
				$reo=$bdd->prepare('SELECT * FROM codeneosurf_chat WHERE id_send=:id_send ORDER BY ID ASC');
				$reo->execute(array(':id_send'=>$id_send));
				while($show=$reo->fetch()){
					if($show['id_prop']=='jo1'){
						$class = 'norm';
					}else{
						$class = 'exter';
					}
					echo '<div class="line"><b class="'.$class.'">'.$show['message'].'<br /> <span style=" display:block; text-align:right; padding-top:5px; color:silver; font-size:10px;">'.$show['datee'].'</span></b></div> ';
				}
				
				// header('location:../codeneosurf_commande_ok.php?succes=true');
			
		}else{
			echo '';
			// header('location:../index.php?failcomm=fill');
		}
		
		
		
?>
<script>
	$(function(){
		setTimeout($('.thischat').load('call/create_chat_conversation.php', function(){ $('.thischat').animate({ scrollTop: $('.thischat').prop("scrollHeight")}, 20); }), 2000);
	});
</script>