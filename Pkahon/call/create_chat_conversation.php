<?php session_start(); ?>
<?php	
		
		if(isset($_POST['id_sends'])){
			
			$id_send = $_POST['id_sends'];
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
		var getMyIdVal = '<?php echo $_POST['id_sends']; ?>';
		setTimeout($.post('call/create_chat_conversation.php',{'id_sends':getMyIdVal}, function(backox){
			  $('.thischat').html(backox); 
			  $('.thischat').animate({ scrollTop: $('.thischat').prop("scrollHeight")}, 200);
			}), 500);
	});
</script>