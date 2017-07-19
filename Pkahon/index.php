<?php session_start(); ?>
<?php
	
	if (isset($_POST['mot_de_passe']) AND $_POST['mot_de_passe'] == "SIM5577EON") // Si le mot de passe est bon
	{
		$_SESSION['loga'] = "19730505";
	}else{

	}
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>CodeManager</title>
	
</head>
<body>
	
	
	<?php 
		if(isset($_SESSION['loga'])){
	?>
		<link rel="stylesheet" href="css.css" />
		<div class="top">
			<a class="home">Accueil</a>
			<a class="code">Codes</a>
			<a class="client">Clients</a>
			<a class="commande">Commandes</a>
			<a class="vendu">Codes vendus</a>
			<a class="chat">Chat-surf</a>
			<a class="partenaire">Partenaire</a>
			<div style="float:right; padding:10px;">
				<input type="text" placeholder="Recherche..." id="seekal" style=" padding:3px; border:solid 1px white; border-radius:2px; width:270px;" />
			</div>
			<a href="deco.php" style="float:right;">Déconnexion</a>
		</div>
		<div class="content">
			<div class="window">
				
			</div>
			<div class="call_back"></div>
		</div>
		<script src="../jquery.js"></script>
		<script>
			$(function(){
				
				$('.table tr:even').css('background','#f5f9fa');
				$('.table .go').css('background','#566a81').css('color','white');
				
				$('.top a').click(function(){
					$('.top a').css('background','#627993').css('color','white');
					$(this).css('background','#eff4f5').css('color','#627993');
					
					$('.window').html('<div class="loading">Chargement... <br /><br /> <img src="load.gif" alt="" /></div>');
					var getClassOb = $(this).attr('class');
				   $('.window').load('call/call_'+getClassOb+'.php');
				   $('.call_back').html('');
				   
				});
			  
			});
		</script>
	<?php
		}else{
	?>
		<style>
		body{font-family: arial; margin:0px; padding:10px; outline:0px; background:#f0f0f0; font-weight:bold;}
		.cont{ width:300px; height:200px; margin:auto; background:white; margin-top:100px; border:solid 1px #d7d7d7; border-radius:4px;}
		h3{ text-align:center; background:silver; padding:15px; color:white; margin:0px; margin-bottom:30px;}
		#champ{ padding:5px; border: solid 1px silver; width:200px; border-radius:4px;}
		#sub{padding:7px; width:140px;}
		</style>
		<div class="cont">
			<h3>ACCES RESERVE</h3>
			<center>
			
			<form action="" method="post">
			<input type="password" value="" id="champ" name="mot_de_passe" /><br /><br />
			<input type="submit" value="VALIDER" id="sub" />
			</form>
			
			</center>
		</div>
	<?php
		}
	?>

</body>
</html>