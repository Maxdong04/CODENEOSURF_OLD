<?php session_start(); ?>
<?php 
		
	if(isset($_SESSION['emails'])){ 
		
		include '../plug.php';
		$res=$bdd->query('SELECT * FROM codeneosurf_commande WHERE stat="valid" and bold="bold" ORDER BY ID DESC');
		$show =$res->fetch();
		if($show){
			echo '<a href="codeneosurf_code_panel.php?dtealkbhkjdkjhjdujdckhjkdfkdfjkjdfdfdd='.$show['id'].'&tellquer=154xsssqnbhs"><img src="img/codealert.gif" style="height:47px; float:right;"></a>';
		}
		
	}else{
		
	}
?>

<script>
	$(function(){
		setTimeout($('.alert_box').load('call/alert.php'), 200);
	});
</script>