<div class="parte">
        <div class="partein">
			<b>Payez et jouez en ligne en toute sécurité avec Neosurf ! </b>
			<p> 
			Payez en ligne en toute sécurité avec les codes prépayés Neosurf sur les meilleurs sites de jeux ou de divertissement. Ou utilisez simplement vos codes Neosurf pour recharger votre portefeuille électronique ou vos cartes prépayées.
			Choisissez parmi une vaste selection de sites internet populaires qui acceptent le paiement par codes Neosurf. Vous trouverez une sélection de sites acceptant le paiement avec Neosurf ci-dessous :
			</p>
            <center><span>Nos partenaires</span></center>
			<div style="padding-bottom:20px;">
				<?php 
					include 'plug.php';
					
					$res=$bdd->query('SELECT * FROM codeneosurf_parte ORDER BY ID DESC');
					while($show =$res->fetch()){
					echo ' <a href="'.$show['linx'].'" target="_blank"> <img src="'.$show['icon_1'].'" style="height:65px;" /> </a> ';
							}
				?>
			</div>
			
        </div>
    </div>
    <div class="foot">
        <div class="footin">
            <img src="img/ban2.png" style="float:left;">
            <strong>codeneosurf.com &copy; Tous les droits sont réservés
			<br /> R C C M : CI TDI  2015 105 
			<br /> Cel : 00 225  67 09 09 67
			<br /> Yamoussoukro - cote d’ivoire
			</strong>	
        </div>
    </div>
    <div class="chatzone">
		<div class="pli"><b></b></div>
        <div class="lin">
			<div class="in">
				<h4>Chat-surf, Bonjour <?php echo $prenom; ?>.</h4>
				<div class="thischat"></div>
				<div class="post">
						<form action="create/create_chat.php" id="chax" method="post">
							<input type="text" name="post_mess" id="post_mess" class="emaila" placeholder="Ecrire votre message...">
							<input type="hidden" name="pst_id" id="pst_id" value="<?php echo $id_id; ?>">
						</form> 
				</div>
			</div>
        </div>
    </div>
    <script src="jquery.js"></script>
    <script src="cycle.js"></script>
    <script>
		$(function(){
			setTimeout($('.thischat').load('call/create_chat_conversation.php', function(){ $('.thischat').animate({ scrollTop: $('.thischat').prop("scrollHeight")}, 20); }), 2000);
			
			setTimeout($('.alert_box').load('call/alert.php'), 500);
		});
	</script>
    <script>
        $(function(){
			$('.slidein').cycle();
			$('.tuto2, .tuto3').hide();
			$('.nextpoint span').click(function(){
				var getPointId = $(this).attr('id');
			    $('.showroom img').hide();
			    $('.showroom .'+getPointId).show(700);
				
				if(getPointId=='tuto1'){
					$('.nextpoint span').css('background','white').css('color','#627993');
					$(this).css('background','#627993').css('color','white');
				}else if(getPointId=='tuto2'){
					$('.nextpoint span').css('background','white').css('color','#627993');
					$('.nextpoint #tuto1').css('background','#627993').css('color','white');
					$(this).css('background','#627993').css('color','white');
				}else if(getPointId=='tuto3'){
					$('.nextpoint span').css('background','white').css('color','#627993');
					$('.nextpoint #tuto1').css('background','#627993').css('color','white');
					$('.nextpoint #tuto2').css('background','#627993').css('color','white');
					$(this).css('background','#627993').css('color','white');
				}
				
            });
			
            $('#chax').on('submit', function(){
				var getVal = $('#post_mess').val();
                var getMyIdVal = $('#pst_id').val();
                //$('.thischat').append('<div class="line"><b>'+getVal+'</b></div>');
				$('.thischat').append('<div class="line"><b class="exter">...<br /> <span style=" display:block; text-align:right; padding-top:5px; color:silver; font-size:10px;"></span></b></div>');
			    
				$.post('create/create_chat.php',{'post_mess':getVal,'id_send':getMyIdVal}, function(backo){
			 	  //$('.thischat').html(backo); 
				  $(".thischat").animate({ scrollTop: $('.thischat').prop("scrollHeight")}, 200);
			    });
				document.getElementById("chax").reset();
				
                return false;
           });
            
            $('#openchat, .openfromchat').click(function(){
               $('.chatzone').slideToggle(200);
            });
			$('#openchatx').click(function(){
               $('.calllogchat').load('call/call_login_chat.php');
            });
			
			$('.slide, .descrip, .code, .chatzone, .parte, .foot').click(function(){
               $('.loggedin .seeting').slideUp(200);
            });
			
			$('.chatzone .pli b').click(function(){
               $('.chatzone .lin').slideToggle(500);
            });
			
			$('#openchat2').click(function(){
               $('.chatzone').slideToggle(200);
            });
		   
		   $('.loggedin b').click(function(){
               $('.loggedin .seeting').slideToggle(200);
           });
		   $('.loggedin .seeting a').click(function(){
               $('.loggedin .seeting').slideUp(200);
               $('.thischat').load('call/create_chat_conversation.php', function(){ $('.thischat').animate({ scrollTop: $('.thischat').prop("scrollHeight")}, 20); });
           }); 
		   
		   $('.close').click(function(){
               $('.pop').fadeOut(200);
               $('.pop2').fadeOut(200);
           });
		   
		   $('.delacomm').click(function(){
               var getPointDela = $(this).attr('id');
			   $('.decall').html('<div class="deldel">Etes-vous sûr de vouloir supprimer le code ['+getPointDela+'] ? &nbsp;&nbsp; <a href="create/update_commande.php?mzrrrtklsgdsmqkldkjkhjjdvpgjdgbahdhfhhgjgdjhjhdsqdgjopmm&po='+getPointDela+'&re=fggffgpaetsfgffggfdsswopmdgtaoshs=testfail">oui</a> &nbsp;&nbsp;  <a href="">non</a></div>');
           }); 
		   
		    $('.comallop').click(function(){
			 	$('.pop2').fadeIn(200);
            });
			
			$('.codex a').click(function(){
			 	$('.pop').fadeIn(200);
			 	$('.popac .pcc').html('<center> Chargement... </center>'); 
                 var getClassCode = $(this).attr('class');
                 var getIdCode = $(this).attr('id');
			     $.post('call/call_commande.php',{'getClassCode':getClassCode,'getIdCode':getIdCode}, function(back){
			 	  $('.popac .pcc').html(back); 
			     });
            });
		   
		    
		   
		   
        });
    </script>