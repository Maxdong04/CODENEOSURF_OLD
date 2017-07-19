<table class="table">
<tr class="go"> 
	<td></td> 
	<td>Nom du client</td> 
	<td>Pays</td> 
	<td>Téléphone</td> 
	<td>Email</td> 
	<td> Code à créer </td> 
	<td><b>Commande</b></td> 
	<td><span>Date</span></td> 
	<td> Action </td> 
	<td style="width:14px;"> </td> 
</tr>
	<?php 
		include '../plug.php';
		
		$res=$bdd->query('SELECT * FROM codeneosurf_commande WHERE stat="wait" ORDER BY ID DESC');
		while($show =$res->fetch()){
echo '
<tr> 
	<td>'.$show['id'].'</td> 
	<td>'.$show['nompre'].'</td> 
	<td>'.$show['pays'].'</td> 
	<td>'.$show['tele'].'</td> 
	<td>'.$show['emails'].'</td> 
	<td style="background:#f4fde1;">
		<input type="hidden" id="idthis'.$show['id'].'" name="ids" value="'.$show['id'].'" /> 
		<input placeholder="Entrez le code ici..." id="codo'.$show['id'].'" type="text" name="codo" value="'.$show['codo'].'" /> 
		<i class="odx'.$show['id'].'" title="'.$show['id_id'].'"></i>
	</td> 
	<td><b>'.$show['codeneo'].' &euro; </b></td> 
	<td><span>'.$show['datee'].'</span></td> 
	<td> <a class="vad" id="'.$show['id'].'">Valider commande</a> </td> 
	<td style="width:14px;" class="delete"> <img class="'.$show['codeneo'].'" id="'.$show['id'].'" src="src/del.png" style="width:10px;" /> </td>
</tr>';
		}
	?>
</table>

<script>
    $(function(){
		
		$('.table tr:even').css('background','#f5f9fa');
		$('.table .go').css('background','#566a81').css('color','white');
		
        $('.top a').click(function(){
			var getClassOb = $(this).attr('class');
           $('.window').load('call/call_'+getClassOb+'.php');
        });
		
		$('#seekal').keyup(function(){
			
			var getVelueIn = $(this).val();
			jQuery.expr[':'].contains = function(a, i, m){
				return jQuery(a).text().toUpperCase().indexOf(m[3].toUpperCase()) >= 0;
			};
			
			$('table tr').hide();
			$('table tr:contains('+getVelueIn+')').show();
			
		});
		
		$('.content .window .table td a').click(function(){
			var getButId = $(this).attr('id');

			var getIdthis = $('#idthis'+getButId).val();
			var getCodo = $('#codo'+getButId).val();
			var gOdx = $('.odx'+getButId).attr('title');
			
			
			$.post('update/update_commande.php', {'id_id':gOdx,'id':getIdthis,'getCodo':getCodo}, function(good){
				$('.call_back').html(good);
			});
			
        });
		
		$('.delete img').click(function(){
			var getImgId = $(this).attr('id');
			var getImgClass= $(this).attr('class');
           $('.call_back').html('<div class="goodcode">Etes-vous sûr de vouloir supprimer la commande '+ getImgClass +'? &nbsp;&nbsp; <a href="del/del_commande.php?id='+getImgId+'"><b>OUI</b></a> &nbsp;&nbsp; <a href=""><b>NON</b></a></div>');
        });
	  
    });
</script>