<table class="table">
<tr class="go"> 
	<td></td> 
	<td>Nom du client</td> 
	<td>Pays</td> 
	<td>Téléphone</td> 
	<td>Email</td> 
	<td> Code vendu </td> 
	<td><b>Commande</b></td> 
	<td><span>Date</span></td> 
	<td> Action </td> 
	<td style="width:14px;"> </td> 
</tr>
	<?php 
		include '../plug.php';
		
		$res=$bdd->query('SELECT * FROM codeneosurf_commande WHERE stat="valid" ORDER BY ID DESC');
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
	</td> 
	<td><b>'.$show['codeneo'].'</b></td> 
	<td><span>'.$show['datee'].'</span></td> 
	<td> xx </td> 
	<td style="width:14px;"> <img src="src/del.png" style="width:10px;" /> </td> 
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
		
		$('.content .window .table td a').click(function(){
			var getButId = $(this).attr('id');
			
			var getIdthis = $('#idthis'+getButId).val();
			var getCodo = $('#codo'+getButId).val();
			//alert(getIdthis+' - '+getCodo);
			
			$.post('update/update_commande.php', {'id':getIdthis, 'getCodo':getCodo}, function(good){
				$('.call_back').html(good);
			});
        });
	  
    });
</script>