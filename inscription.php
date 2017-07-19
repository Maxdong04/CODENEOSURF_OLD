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
    <div class="code" >
        <div class="codein">
            <div class="right" >
                <div class="roun">
                <div class="sinup">
                    
					<?php 
							
						if(isset($_SESSION['emails'])){
					?>
							<div class="form">
								<h3>Mon compte CodeNeosurf</h3>
								<div class="inpux">
									<div class="mens">
										<a href="codeneosurf_code_panel.php" style="background:url(ico/neo.png) no-repeat 10px 10px white;">Mes codes Neosurf</a>
										<a class="openfromchat" style="background:url(ico/chat.png) no-repeat 10px 10px white;">Messages Chat</a>
										<a href="deco.php" style="background:url(ico/dec.png) no-repeat 10px 10px white;">Déconnexion</a>
									</div>
								</div>
							</div>
					<?php
						}else{
					?>
						<div class="form">
                        <h3>Créer un compte gratuit</h3>
                        <p>Vous êtes nouveau? Créez un compte CodeNeosurf.com pour accéder à l'achat des codes Neosurf</p>
						<?php 
						
							if(isset($_GET['exist']) AND $_GET['exist']=='account'){
								
								$nom = $_GET['nom'];
								$prenom = $_GET['prenom'];
								$pays = $_GET['pays'];
								$tele = $_GET['tele'];
								$emails = $_GET['emails'];
								$pwd = $_GET['pwd'];
								
								echo ' <div class="exist" id="exist"> Un compte est déjà associé à cette adresse email, utilisez une autre adresse ou connectez-vous si elle vous appartient! </div> ';
								
							}else if(isset($_GET['fail']) AND $_GET['fail']=='fill'){
								
								$nom = $_GET['nom'];
								$prenom = $_GET['prenom'];
								$pays = $_GET['pays'];
								$tele = $_GET['tele'];
								$emails = $_GET['emails'];
								$pwd = $_GET['pwd'];
								
								echo ' <div class="exist" id="exist"> Veuillez remplir tous les champs du formulaire pour valider votre inscription </div> ';
								
							}else{
								$nom = '';
								$prenom = '';
								$pays = '';
								$tele = '';
								$emails = '';
								$pwd = '';
							}
						
						?>
                        <div class="inpux">
                            <form action="create/create_account.php" method="post">
								<div class="ent">
									<input type="text" name="nom" class="nom" placeholder="Nom" value="<?php echo $nom; ?>">
									<input type="text" name="prenom" class="prenom" placeholder="Prénom" value="<?php echo $prenom; ?>">
								</div>
								<input type="text" name="pays" class="" placeholder="Pays" value="<?php echo $pays; ?>">
								<input type="text" name="tele" class="" placeholder="Téléphone" value="<?php echo $tele; ?>">
								<input type="text" name="emails" class="" placeholder="Email" value="<?php echo $emails; ?>">
								<input type="text" name="pwd" class="" placeholder="Mot de passe" value="">
								<input type="text" name="c_pwd" class="" placeholder="Confirmation mot de passe" value="">
								<input type="submit" class="sub" value="VALIDER LE COMPTE">
							</form>
                        </div>
                    </div>
					<?php 
						}
					?>
                    
					<div class="allop"> <a class="comallop">Comment acheter avec Allopass</a> </div>
                </div>
                </div>
                <div class="roun">
					<div class="form">
                        <h3>Call Center</h3>
                        <div class="inpux">
                            <img src="img/call.png" style="width:100%;">
                            <strong>Tel: 00225 67 09 09 67</strong>
                            <strong>Email: infos@codeneosurf.com</strong>
                        </div>
						
                    </div>
                    <div class="codexx">
					<?php 
							
								if(isset($_SESSION['emails'])){
	echo '<a id="openchat" style="background: url(img/chat.png) no-repeat 10px white ; background-size:auto 70%;" class="chata"> POSEZ UNE QUESTION ICI DANS CHAT-SURF </a>';
								}else{
	echo '
	<a id="openchatx" style="background: url(img/chat.png) no-repeat 10px white ; background-size:auto 70%;" class="chata"> POSEZ UNE QUESTION ICI DANS CHAT-SURF </a>
		</div>
		<div class="calllogchat"></div>
		';								
								}
								
							?>
							<img src="img/ban.png" style="width:100%;">
					</div>
					
                </div>
            </div>
        </div>
    </div>
	<div class="slide">
        <div class="slidein">
			<div class="cycle" style="background: url(img/slide.png) no-repeat center top; background-size:100%;"></div>
			<div class="cycle" style="background: url(img/slide2.png) no-repeat center top; background-size:100%;"></div>
			<div class="cycle" style="background: url(img/slide3.png) no-repeat center top; background-size:100%;"></div>
		</div>
    </div>
    <?php include 'inc/jquery_foot.php'; ?>
</body>
</html>