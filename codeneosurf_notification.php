<?php session_start(); ?>
<?php include 'inc/logg.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CodeNeosurf.com</title>
    <link rel="stylesheet" href="css/css.css">
</head>
<body>
	<?php if(isset($_SESSION['emails'])){ }else{ header('location:index.php'); } ?>
    <?php include 'inc/top.php'; ?>
    <div class="sepa"></div>
	<?php include 'inc/smenu.php'; ?>
    <div class="descrip" style="padding-bottom:25px;">
        <div class="descripin">
            <h2>Notifications <span></span> </h2>
            <div class="push">
				<?php	
					
					include 'plug.php';
				
					$reo=$bdd->prepare('SELECT * FROM codeneosurf_notif WHERE id_id=:id_id ORDER BY ID DESC');
					$reo->execute(array(':id_id'=>$id_id));
					while($show=$reo->fetch()){
echo ' <div class="push_not"> <div class="'.$show['bold'].'">Alert :'.$show['message'].' <a href="codeneosurf_code_panel.php?bold=title&idb='.$show['id'].'">Voir le code</a></div> <div class="cont_not"></div> </div>
						';
					}
			
				?>
				
			</div>
        </div>
    </div>
    <?php include 'inc/jquery_foot.php'; ?>
</body>
</html>