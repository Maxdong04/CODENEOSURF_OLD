<style>
	.addxa{background:white; padding:15px; }
	.addxa input{ margin-right:12px; padding:4px; background:white; border:solid 1px silver; border-radius:3px; width:150px; }
	.addxa input[type="submit"]{ background:#98da10; color:white; font-weight:bold; border:solid 1px #98da10; }
	.addxa b{ color:gray; }
</style>
<div class="addxa"> 
	<form action="crea/create_code.php" method="post">
		<b>Ajouter une nouvelle carte</b> &nbsp;&nbsp;
		<input type="text" name="prix" placeholder="Prxi en &euro;uros" />
		<input type="text" name="prix_cfa" placeholder="Prxi en Fcfa" />
		<input type="submit" value="Ajouter" />
	</form>
</div>
<table class="table">
<tr class="go"> 
	<td></td> 
	<td>Bannière</td> 
	<td>Prix en Cfa</td>
	<td>Prix en &euro;uros</td>    
	<td>Etat</td>  
	<td style="width:50px;">Fermer</td>  
	<td style="width:50px;">Ouvrir</td>  
	<td style="width:270px;">Modifier</td>  
</tr>
	<?php 
		include '../plug.php';
		
		$res=$bdd->query('SELECT * FROM codeneosurf_codes ORDER BY ID ASC');
		while($show =$res->fetch()){
			if($show['etat']=='ok'){
				$etat = $show['etat'];
			}else{
				$etat = $show['etat'];
			}
		echo '
		<tr> 
			<td>'.$show['id'].'</td>  
			<td><img src="../img/neoc.png" style="height:30px;" /></td>  
			<td><b>'.$show['prix'].' </b></td>  
			<td><b>'.$show['prix_cfa'].' </b></td>  
			<td><img src="src/'.$etat.'.png" alt="" /></td>  
			<td><a href="update/update_code.php?id='.$show['id'].'&etat=no">Fermer</a></td>  
			<td><a href="update/update_code.php?id='.$show['id'].'&etat=ok">Ouvrir</a></td>  
			<td class="inpax"> 
			<form action="" method="post">
				<input type="hidden" value="'.$show['id'].'" name="id" />
				<input type="text" value="'.$show['prix'].'" name="prix" style="width:80px;" />
				<input type="text" value="'.$show['prix_cfa'].'" name="prix_cfa" style="width:80px;" />
				<input type="submit" value="Modifier" style="width:70px;" />
			</form> </td>  
		</tr>';
				}
	?>
</table>

<script>
    $(function(){
		
		$('#seekal').keyup(function(){
			
			var getVelueIn = $(this).val();
			jQuery.expr[':'].contains = function(a, i, m){
				return jQuery(a).text().toUpperCase().indexOf(m[3].toUpperCase()) >= 0;
			};
			
			$('table tr').hide();
			$('table tr:contains('+getVelueIn+')').show();
			
		});
		
		$('.table tr:even').css('background','#f5f9fa');
		$('.table .go').css('background','#566a81').css('color','white');
		
		$('.delete img').click(function(){
			var getImgId = $(this).attr('id');
			var getImgClass= $(this).attr('class');
           $('.call_back').html('<div class="goodcode">Etes-vous sûr de vouloir supprimer le membre '+ getImgClass +' &nbsp;&nbsp; <a href="del/del_account.php?id='+getImgId+'"><b>OUI</b></a> &nbsp;&nbsp; <a href=""><b>NON</b></a></div>');
        });
	  
    });
</script>