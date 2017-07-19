<div class="pop">
	<div class="popin"> 
		<div class="popac">
			<div class="tit">Votre Commande Neosurf <img src="img/cloz.png" style="float:right; cursor:pointer;" class="close" /> </div>
			<div class="pcc">
				<center>Chargement...</center>
			</div>
		</div>
	</div>
</div>
<div class="pop2"> 
	<div class="pop2in"> 
		<div class="pop_tuto">
			<b>Comment acheter sur un site de pronostics hippiques avec un code neosurf ? <img src="img/cloz.png" class="close" style="float:right;" /> </b>
			<div class="showroom">
				<img src="img/tuto1.png" class="tuto1" style="height:340px;" />
				<img src="img/tuto2.png" class="tuto2" style="height:340px;" />
				<img src="img/tuto3.png" class="tuto3" style="height:340px;" />
			</div>
			<div class="nextpoint">
				<span id="tuto1">1</span>
				<span id="tuto2">2</span>
				<span id="tuto3">3</span>
			</div>
		</div>
	</div>
</div>
<div class="top">
    <h1><a href="index.php">CodeNeosurf.com</a></h1>
	<?php 
		
		if(isset($_SESSION['emails'])){
	?>
		<div class="loggedin">
			<b> <?php echo $prenom; ?> <?php echo $nom; ?> | <?php echo $emails; ?> </b>
			<div class="seeting">
				<a><?php echo $prenom.' '.$nom; ?></a>
				<a><?php echo $emails; ?></a>
				<a href="codeneosurf_code_panel.php">Mes codes Neosurf</a>
				<a id="openchat2">Chatez avec Chat-surf</a>
				<a href="deco.php">Déconnexion</a>
			</div>
		</div>
	<?php	
		}else{
			echo '
			<div class="seekbox"> 
				<form action="login.php" method="post">
				<input type="text" name="emails" placeholder="Login: votre email"> 
				<input type="password" name="pwd" placeholder="Mot de passe"> 
				<input type="submit" value="CONNEXION" class="sub">
				</form>
			</div>
			';
		}
		
	?>
    
</div>