<?php session_start(); ?>
<?php	
		
		if(isset($_POST['emails']) AND $_POST['pwd']){
			
			$emails = $_POST['emails'];
			$pwd = $_POST['pwd'];
			
			include '../plug.php';
			
			$res=$bdd->prepare('SELECT * FROM codeneosurf_account WHERE emails=:emails AND pwd=:pwd');
			$res->execute(array(':emails'=>$emails,':pwd'=>$pwd));
			$show =$res->fetch();
			if($show){
				$_SESSION['emails'] = $emails;
				
				if(isset($_SESSION['emails'])){
					$reo=$bdd->prepare('SELECT * FROM codeneosurf_account WHERE emails=:emails');
					$reo->execute(array(':emails'=>$_SESSION['emails']));
					while($show=$reo->fetch()){
						$id_id = $show['id'];
						$nom = $show['nom'];
						$prenom = $show['prenom'];
						$pays = $show['pays'];
						$tele = $show['tele'];
						$emails = $show['emails'];
						$pwd = $show['pwd'];
					}
				}
?>
		
	<div class="app2">
        <div class="top_set">
            <b></b>
            <i></i>
        </div>
        <div class="setting">
            <a href=""><?php echo $nom.' '.$prenom; ?></a>
            <a href="">Mes codes</a>
            <a href="">Commandes en attente</a>
            <a href="">Paramètre</a>
            <a href="">Déconnexion</a>
        </div>
        <div class="sep"></div>
        <div class="content">
            <b class="create">Choisissez votre option d'opération <span class="key"></span> </b>
            <div class="box" id="app3" style=" background: url(src/dot_neo.png) no-repeat 30px #b4b4b4 ; background-size: 40px;">CODES <br /> NEOSURF </div>
            <div class="box" id="visop" style=" background: url(src/dot_visa.png) no-repeat 30px #b4b4b4 ; background-size: 40px;">CARTES <br /> VISA </div>
        </div>
    </div>
	<div class="app3">
        <div class="top_set">
            <b></b>
            <i></i>
        </div>
        <div class="setting">
			<a href=""><?php echo $nom.' '.$prenom; ?></a>
            <a href="">Mes codes</a>
            <a href="">Commandes en attente</a>
            <a href="">Paramètre</a>
            <a href="">Déconnexion</a>
        </div>
        <div class="sep"></div>
        <div class="content">
            <b class="create">Choisissez votre option d'opération</b>
            <div class="box" id="app4" style=" background: url(src/cart.png) no-repeat 30px #b4b4b4 ; background-size: 40px;">ACHETEZ UN <br> CODE NEOSURF </div>
            <div class="box" id="list_code" style=" background: url(src/code.png) no-repeat 30px #b4b4b4 ; background-size: 40px;">LISTE DE <br> MES CODES </div>
        </div>
    </div>
	<div class="app4">
        <div class="top_set">
            <b></b>
            <i></i>
        </div>
        <div class="setting">
			<a href=""><?php echo $nom.' '.$prenom; ?></a>
            <a href="">Mes codes</a>
            <a href="">Commandes en attente</a>
            <a href="">Paramètre</a>
            <a href="">Déconnexion</a>
        </div>
        <div class="sep"></div>
        <div class="content">
            <b class="create">Codes disponibles</b>
            <div class="box" id="app2" style=" background: url(src/cart.png) no-repeat 30px #b4b4b4 ; background-size: 40px;">CODE DE 16 &euro; </div>
        </div>
    </div>
    <script src="jquery.js"></script>
    <script>
        $(function(){
            var appHtml = $(document).height();
            $('.app, .app2, .app3').css('height',appHtml+'px');
            
			$('.top_set i').click(function(){
                 $('.setting').slideToggle(200);
            });
			
			$('.go1 a').click(function(){
                //$('.setting').slideToggle(200);
				alert('poste');
            });
			
            $('.content .box').click(function(){
				$('.content .box').css('border','solid 2px #e6e6e6').css('color','white');
                $(this).css('border','solid 2px #d9ff40').css('color','#d9ff40');
				var getIdBox = $(this).attr('id');
				
				$('.app2, .app3, .app4').css('zIndex','20');
				$('.'+getIdBox).css('zIndex','50');
            });
            
        });
    </script>
		
<?php				
			}else{

			}	
		}else{
			echo 'Login ou mot de passe incorrect!';
		}

		
?>

