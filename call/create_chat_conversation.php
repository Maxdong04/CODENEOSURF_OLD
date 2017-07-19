<?php session_start(); ?>
<?php 
		
	if(isset($_SESSION['emails'])){
		include '../plug.php';
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
<?php	
		
		if(isset($_SESSION['emails'])){
			
			$id_send = $id_id;
			$id_rec = 'jo1';
			
			include '../plug.php';

				$reo=$bdd->prepare('SELECT * FROM codeneosurf_chat WHERE id_send=:id_send AND id_rec=:id_rec ORDER BY ID ASC');
				$reo->execute(array(':id_send'=>$id_send,':id_rec'=>$id_rec));
				while($show=$reo->fetch()){
					if($show['id_prop']=='jo1'){
						$class = 'norm';
					}else{
						$class = 'exter';
					}
					echo '<div class="line">
						<div class="pin"><b class="'.$class.'">'.$show['message'].'<br /> <span style=" display:block; text-align:right; padding-top:5px; color:silver; font-size:10px;">'.$show['datee'].'</span></b></div> 
					</div>';
				}
				
				// header('location:../codeneosurf_commande_ok.php?succes=true');
			
		}else{
			echo '';
			// header('location:../index.php?failcomm=fill');
		}
		
		
		
?>
<script>
	$(function(){
		setTimeout($('.thischat').load('call/create_chat_conversation.php',function(){
			$(".thischat").animate({ scrollTop: $('.thischat').prop("scrollHeight")}, 200);
		}), 500);
	});
</script>