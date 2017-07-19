<div class="sbmenu">
    <a class="alink" href="index.php">Accueil</a>
    <a class="alink" href="inscription.php">Inscription</a>
    <a class="alink" href="codeneosurf_code_panel.php">Commande</a>
    <a class="alink" href="comment_ca_marche.php">Comment ça marche?</a>
	<?php 
	if(isset($_SESSION['emails'])){ 
		echo '<a class="alink" href="codeneosurf_code_panel.php">Mes codes</a>';
	}else{ } 
	?>

    <span class="alert_box"></span>
	
</div>