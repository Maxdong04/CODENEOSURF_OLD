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
	<?php include 'inc/tuto.php'; ?>
    <div class="code" >
        <div class="codein">
            <div class="left">
                <div class="lefa">
                    <div class="thumb"><h3>Les Codes Neosurf disponibles</h3></div>
                    <div class="in">
					<?php 
							
						if(isset($_SESSION['emails'])){
							
						}else{
							echo '
							<p><b>Connectez-vous pour acheter un code.</b> Si vous êtes nouveau, vous devez créer un compte d\'abord.</p>
							<form action="login.php" method="post">
								<div class="seekbox"> 
									<input type="text" name="emails" placeholder="Login: votre email"> 
									<input type="password" name="pwd" placeholder="Mot de passe"> 
									<input type="submit" value="CONNEXION" class="sub">
								</div>
							</form>
							';
						}
					?>
                    
					<?php include 'inc/code_line.php'; ?>
                    </div>
                </div>
                <div class="lefa">
                    <div class="in">
                        <div class="codexx">
						
    
						</div>
                   </div>
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