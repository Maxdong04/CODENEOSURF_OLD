<div class="addlink">
	<form action="crea/create_parte.php" method="post">
		<input type="text" name="nom" placeholder="Nom du site" />
		<input type="text" name="linx" placeholder="Lien du site" />
		<input type="text" name="icon_1" placeholder="Lien de la bannière" />
		<input type="submit" class="sub" value="AJOUTER LE PARTENAIRE" />
	</form>
</div>
<table class="table">
<tr class="go"> 
	<td></td> 
	<td>Bannière</td> 
	<td>Nom du site</td> 
	<td>Lien du site</td> 
	<td>Lien de la bannière</td>    
	<td style="width:14px;"> </td>  
</tr>
	<?php 
		include '../plug.php';
		
		$res=$bdd->query('SELECT * FROM codeneosurf_parte ORDER BY ID DESC');
		while($show =$res->fetch()){
		echo '
		<tr> 
			<td>'.$show['id'].'</td> 
			<td><img src="'.$show['icon_1'].'" style="height:30px;" /></td>   
			<td><b>'.$show['nom'].'</b></td>   
			<td><b>'.$show['linx'].'</b></td>   
			<td><b>'.$show['icon_1'].'</b></td>   
			<td style="width:14px;" class="delete"> <img class="'.$show['nom'].'" id="'.$show['id'].'" src="src/del.png" style="width:10px;" /> </td> 
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
           $('.call_back').html('<div class="goodcode">Etes-vous sûr de vouloir supprimer le membre '+ getImgClass +' &nbsp;&nbsp; <a href="del/del_parte.php?id='+getImgId+'"><b>OUI</b></a> &nbsp;&nbsp; <a href=""><b>NON</b></a></div>');
        });
	  
    });
</script>