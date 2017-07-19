<?php 

	include 'plug.php';	
	
	$ress = $bdd->query('SELECT * FROM '.$lead.'_mailtel ORDER BY ID DESC LIMIT 0,1');
	while($show = $ress->fetch())
	{
		echo '
			Email: <br /> <b style="color:#0094ae;">'.$show['maila'].'</b><br>
			Téléphone: <br /> <b style="color:#0094ae;">'.$show['tele'].'</b>
		';
	}
?>