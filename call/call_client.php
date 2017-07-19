<table class="table">
<tr class="go"> 
	<td></td> 
	<td>Nom</td> 
	<td>Prénom</td> 
	<td>Pays</td>  
	<td>Téléphone</td>  
	<td>Email</td>  
	<td>Mot de passe</td>  
	<td style="width:14px;"> </td>  
</tr>
	<?php 
		include '../plug.php';
		
		$res=$bdd->query('SELECT * FROM codeneosurf_account ORDER BY ID DESC');
		while($show =$res->fetch()){
		echo '
		<tr> 
			<td>'.$show['id'].'</td> 
			<td><b>'.$show['nom'].'</b></td> 
			<td><b>'.$show['prenom'].'</b></td> 
			<td>'.$show['pays'].'</td>  
			<td>'.$show['tele'].'</td>  
			<td>'.$show['emails'].'</td>  
			<td>'.$show['pwd'].'</td>  
			<td style="width:14px;" class="delete"> <img class="'.$show['nom'].' '.$show['prenom'].'" id="'.$show['id'].'" src="src/del.png" style="width:10px;" /> </td> 
		</tr>';
				}
	?>
</table>

<script>
    $(function(){
		
		$('.table tr:even').css('background','#f5f9fa');
		$('.table .go').css('background','#566a81').css('color','white');
		
		$('.delete img').click(function(){
			var getImgId = $(this).attr('id');
			var getImgClass= $(this).attr('class');
           $('.call_back').html('<div class="goodcode">Etes-vous sûr de vouloir supprimer le membre '+ getImgClass +' &nbsp;&nbsp; <a href="del/del_account.php?id='+getImgId+'"><b>OUI</b></a> &nbsp;&nbsp; <a href=""><b>NON</b></a></div>');
        });
	  
    });
</script>