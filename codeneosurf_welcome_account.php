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
    <?php include 'inc/top.php'; ?>
    <div class="sepa"></div>
	<?php include 'inc/smenu.php'; ?>
    <div class="welcome">
        <div class="welcomein">
            <p id="point">
			<?php 
				if(isset($_GET['succes']) AND $_SESSION['emails']){
					echo '
					<img src="img/ok.png" style="float:left; height:40px; margin-right:13px;" />
					<b>Bravo ! Votre compte a été créé avec succès.</b> <br />
					Vous pouvez à présent commander et acheter un code Neosurf.
					';
				}else{
					header('location:index.php');
				}
			?>
			
            </p>
        </div>
    </div>
    <div class="code" >
        <div class="codein">
            <div class="left">
                <div class="lefa">
                    <div class="thumb"><h3>Les Code Neosurf disponible</h3></div>
                    <div class="in">
    <?php include 'inc/code_line.php'; ?>
                    </div>
                </div>
                
            </div>
            <div class="right" >
                <div class="sinup">
                    <div class="form">
                        <h3>Votre panneau de code</h3>
                        <div class="codelist">
							<table> 
								<?php 
								include 'plug.php';
								
								$res=$bdd->prepare('SELECT * FROM codeneosurf_commande WHERE id_id=:id_id AND stat=:stat ORDER BY ID');
								$res->execute(array(':id_id'=>$id_id,':stat'=>'valid'));
								while($show =$res->fetch()){
echo '<tr> <td>Code '.$show['id'].'</td> <td style="background:#f4fde1;"><b style="color:#81b80e;">YSDP L25 E89</b></td> <td><b>'.$show['codeneo'].'</b></td>  <td><span>'.$show['datee'].'</span></td> <!--<td style="width:14px;"> <img src="ico/del.png" style="width:10px;" /> </td>--> </tr>';
								}
								?>
							</table>
						</div>
                    </div>
					<div class="form">
                        <h3>Commande en cours...</h3>
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
						</div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <?php include 'inc/jquery_foot.php'; ?>
</body>
</html>