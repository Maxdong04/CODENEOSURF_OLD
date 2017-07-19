<?php session_start(); ?>
<?php include 'inc/logg.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CodeNeosurf.com</title>
    <link rel="stylesheet" href="css/panel.css">
</head>
<body>
	<?php if(isset($_SESSION['emails'])){ }else{ header('location:index.php'); }
	if(isset($_GET['dtealkbhkjdkjhjdujdckhjkdfkdfjkjdfdfdd'])){
		$idb = $_GET['dtealkbhkjdkjhjdujdckhjkdfkdfjkjdfdfdd'];
		
		include 'plug.php';
			
		$res=$bdd->prepare('UPDATE codeneosurf_commande SET bold=:bold WHERE id=:id');
		$res->execute(array(
		':bold'=>'',
		':id'=>$idb
		));
	}
	?>
    <?php include 'inc/top.php'; ?>
    <div class="sepa"></div>
	<?php include 'inc/smenu.php'; ?>
	<?php 
		if(isset($_GET['succes'])){
			echo '
			<div class="welcome">
				<div class="welcomein">
					<p id="point">
					<img src="img/ok.png" style="float:left; height:80px; margin-right:13px;" />
					<b>Votre commande a été prise en compte avec succès.</b> <br />
					Pour valider votre commande veuillez payer par <br />
					<b style="color:gray;">ORANGE MONEY: 00255 07 84 87 36</b> ou<br /> 
					<b style="color:gray;">MTN MOBILE MONEY: 00225 04 32 34 66</b>
					<a href="codeneosurf_code_panel.php" style=" float:right; background:#F0F0F0; display:block; padding:13px; border:solid 1px gray; border-radius:3px; font-weight:bold; text-decoration:none;">OK</a>
					</p>
				</div>
			</div>
			';
		}
	?>
	
    <div class="code" >
        <div class="codein">
            <div class="left">
                <div class="lefa">
                    <div class="thumb"><h3>Les Code Neosurf disponibles</h3></div>
                    <div class="in">
    <?php include 'inc/code_line.php'; ?>
                    </div>
                </div>
                <!--<div class="lefa">
                    <div class="in">
                        <div class="codex">
    <a id="openchat" style="background: url(img/chat.png) no-repeat 10px ; background-size:auto 70%;" class="chata"> POSEZ UNE QUESTION ICI DANS CHAT-SURF </a>
    </div>
                    </div>
                </div>-->
            </div>
            <div class="right" >
                <div class="sinup">
                    <div class="form">
                        <h3>Votre panneau de code</h3>
                        <div class="codelist" style="border-bottom:solid 12px white;">
							
								<?php 
									include 'plug.php';
									
									$res=$bdd->prepare('SELECT * FROM codeneosurf_commande WHERE id_id=:id_id AND stat=:stat ORDER BY ID DESC');
									$res->execute(array(':id_id'=>$id_id,':stat'=>'wait'));
									$show =$res->fetch();
									if($show){
										echo '
									<div class="valicomm">
										Pour valider votre commande de '.$show['codeneo'].' veuillez payer par <br />
										<b style="color:gray;">ORANGE MONEY: 00255 07 84 87 36</b> ou<br /> 
										<b style="color:gray;">MTN MOBILE MONEY: 00225 04 32 34 66</b>
									</div>
										';
									}
								?>
							
							<div class="decall"></div>
							<div class="scro" style="height:270px; overflow:auto;">
								<table> 
									<?php 
									include 'plug.php';
									
									$res=$bdd->prepare('SELECT * FROM codeneosurf_commande WHERE id_id=:id_id AND stat=:stat ORDER BY ID DESC');
									$res->execute(array(':id_id'=>$id_id,':stat'=>'valid'));
									while($show =$res->fetch()){
	echo '<tr> <td>'.$show['id'].'</td> <td style="background:#f4fde1;"><b style="color:#81b80e; font-size:17px;">'.$show['codo'].'</b></td> <td><b>'.$show['codeneo'].'</b></td>  <td><span>'.$show['datee'].'</span></td> <td style="width:14px;"> <img src="ico/del.png" class="delacomm" id="'.$show['id'].'" style="width:10px;" /> </td> </tr>';
									}
									?>
								</table>
							</div>
						</div>
                    </div>
					<div class="form">
                        <!--<h3>Commande en attente...</h3>
						<div class="valicomm">
							<?php 
								include 'plug.php';
								
								$res=$bdd->prepare('SELECT * FROM codeneosurf_commande WHERE id_id=:id_id AND stat=:stat ORDER BY ID DESC');
								$res->execute(array(':id_id'=>$id_id,':stat'=>'wait'));
								$show =$res->fetch();
								if($show){
									echo '
									Pour valider votre commande veuillez payer par <br />
									<b style="color:gray;">ORANGE MONEY: 00255 07 84 87 36</b> ou<br /> 
									<b style="color:gray;">MTN MOBILE MONEY: 00225 04 32 34 66</b>
									';
								}
							?>
						</div>
                        <div class="codelist">
							<table> 
								<?php 
								include 'plug.php';
								
								$res=$bdd->prepare('SELECT * FROM codeneosurf_commande WHERE id_id=:id_id AND stat=:stat ORDER BY ID');
								$res->execute(array(':id_id'=>$id_id,':stat'=>'wait'));
								while($show =$res->fetch()){
									echo '<tr> <td>Commande '.$show['id'].'</td> <td><b>'.$show['codeneo'].'</b></td> <td>en cours...</td> <td><span>'.$show['datee'].'</span></td> </tr>';
								}
								?>
							</table>
						</div>-->
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <?php include 'inc/jquery_foot.php'; ?>
</body>
</html>