<?php session_start(); ?>
<?php	
		
		if(isset($_POST['nom']) AND $_POST['icon_1'] AND $_POST['linx']){
			
			$nom = $_POST['nom'];
			$icon_1 = $_POST['icon_1'];
			$linx = $_POST['linx'];
			$datee = date('d-m-Y');

			
			include '../plug.php';
			
			
			$ress=$bdd->prepare('INSERT INTO codeneosurf_parte(nom, icon_1, linx, datee) VALUES(:nom, :icon_1, :linx, :datee)');
			$ress->execute(array(
				':nom'=>$nom,
				':icon_1'=>$icon_1,
				':linx'=>$linx,
				':datee'=>$datee
			));
			header('location:../index.php');
		}else{
			header('location:../index.php?failcomm=fill');
		}
		
		
		
?>
<script>
	$(function(){
		var getMyIdVal = '<?php echo $_POST['id_send']; ?>';
		setTimeout($.post('call/create_chat_conversation.php',{'id_sends':getMyIdVal}, function(backox){
			  $('.thischat').html(backox); 
			  $('.thischat').animate({ scrollTop: $('.thischat').prop("scrollHeight")}, 200);
			}), 1000);
	});
</script>