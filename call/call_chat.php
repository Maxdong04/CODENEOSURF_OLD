<div class="all_chat">
	<div class="leftchat">
		<?php 
		include '../plug.php';
		
		$res=$bdd->query('SELECT * FROM codeneosurf_account ORDER BY ID DESC');
		while($show =$res->fetch()){
			echo '<b id="'.$show['id'].'">'.$show['prenom'].' '.$show['nom'].'</b>';
		}
	?>
	</div>
	<div class="rightchat">
		<div class="thischat"> 
			<center> <br /> <br /> <span style="color:silver;">Cliquez à gauche pour sélectionner une consersation</span> </center>
		</div>
		<div class="post">
                <form action="create/create_chat.php" id="chax" method="post">
                    <input type="text" name="post_mess" id="post_mess" class="emaila" placeholder="Ecrire votre message...">
					<div class="who"></div>
                </form> 
        </div>
	</div>
</div>
<script type="text/javascript">
	
	$('.leftchat b').click(function(){
		var id_sends = $(this).attr('id');
		$('.thischat').html('<div class="loading">Chargement... <br /><br /> <img src="load.gif" alt="" /></div>');
		
	    $.post('call/create_chat_conversation.php',{'id_sends':id_sends}, function(backo){
	 	  $('.thischat').html(backo); 
		  $('.thischat').animate({ scrollTop: $('.thischat').prop("scrollHeight")}, 200);
		  $('.who').html('<input type="hidden" name="id_sends" id="id_sendsx" value="'+id_sends+'">');
	    });
    });
	
	$('#chax').on('submit', function(){

        var getVal = $('#post_mess').val();
        var getMyIdVal = $('#id_sendsx').val();
		//alert(getMyIdVal);
        //$('.thischat').append('<div class="line"><b>'+getVal+'</b></div>');
	    
		$.post('crea/create_chat.php',{'post_mess':getVal,'id_send':getMyIdVal}, function(backox){
	 	  $('.thischat').html(backox); 
		  $('.thischat').animate({ scrollTop: $('.thischat').prop("scrollHeight")}, 200);
	    });
		document.getElementById("chax").reset();
         return false;
    });
	
	
	
</script>