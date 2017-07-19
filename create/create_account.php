<?php session_start(); ?>
<?php	
		
if(isset($_POST['nom']) AND $_POST['prenom'] AND $_POST['pays'] AND $_POST['tele'] AND $_POST['emails'] AND $_POST['pwd'] AND $_POST['pwd']==$_POST['c_pwd']){
			
			$nom = $_POST['nom'];
			$prenom = $_POST['prenom'];
			$pays = $_POST['pays'];
			$tele = $_POST['tele'];
			$emails = $_POST['emails'];
			$pwd = $_POST['pwd'];
			
			include '../plug.php';
			
			$res=$bdd->prepare('SELECT * FROM codeneosurf_account WHERE emails=:emails');
			$res->execute(array(':emails'=>$emails));
			$show =$res->fetch();
			if($show){
				//echo 'email existe dejà';
				header('location:../index.php?exist=account&nom='.$nom.'&prenom='.$prenom.'&pays='.$pays.'&tele='.$tele.'&emails='.$emails.'&pwd='.$pwd.'&#point');
			}else{
				$ress=$bdd->prepare('INSERT INTO codeneosurf_account(nom, prenom, pays, tele, emails, pwd) VALUES(:nom, :prenom, :pays, :tele, :emails, :pwd)');
				$ress->execute(array(
					':nom'=>$nom,
					':prenom'=>$prenom,
					':pays'=>$pays,
					':tele'=>$tele,
					':emails'=>$emails,
					':pwd'=>$pwd
				));
				$_SESSION['emails'] = $emails;
				//echo 'Bravo votre compte a été créé';
				header('location:../codeneosurf_welcome_account.php?succes=true');
			}
			
		}else{
			$nom = $_POST['nom'];
			$prenom = $_POST['prenom'];
			$pays = $_POST['pays'];
			$tele = $_POST['tele'];
			$emails = $_POST['emails'];
			$pwd = $_POST['pwd'];
			
			header('location:../index.php?fail=fill&nom='.$nom.'&prenom='.$prenom.'&pays='.$pays.'&tele='.$tele.'&emails='.$emails.'&pwd='.$pwd.'&#point');
		}
		
		
		
?>