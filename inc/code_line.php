<div class="codex">
	<?php 
		include 'plug.php';
		
		$res=$bdd->query('SELECT * FROM codeneosurf_codes WHERE etat="ok" ORDER BY ID ASC');
		while($show =$res->fetch()){
		echo ' <a class="'.$show['prix'].'" id="'.$show['prix_cfa'].'">
			<strong style=" height:150px; display:block; background:url(img/neoc.png) no-repeat bottom center;  background-size:100%;">
				<i style="font-style:normal; display:block; padding:15px; color:#ed008c; font-size:50px;">'.$show['prix'].'&euro;</i>
			</strong>
			<span> <b style="font-size:20px;">'.$show['prix_cfa'].' Fcfa</b> </span> </a> ';
				}
	?>
    
</div>