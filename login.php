<?php session_start(); ?>
<?php	
		
		if(isset($_POST['emails']) AND $_POST['pwd']){
			
			$emails = $_POST['emails'];
			$pwd = $_POST['pwd'];
			
			include 'plug.php';
			
			$res=$bdd->prepare('SELECT * FROM codeneosurf_account WHERE emails=:emails AND pwd=:pwd');
			$res->execute(array(':emails'=>$emails,':pwd'=>$pwd));
			$show =$res->fetch();
			if($show){
				$_SESSION['emails'] = $emails;
				header('location:member.php');
			}else{
				header('location:index.php?fails=fill');
			}	
		}else{
			header('location:index.php?fails=fill');
		}
		
		
		
?>