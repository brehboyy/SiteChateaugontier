							
		<?php
		
							
							
							if (isset($_GET['page'])) {											
								$TypePage = 'page' ;								
							}
							elseif (isset($_GET['envoi_ami'])) {
								$TypePage = 'ami' ;
							}
							elseif (isset($_GET['carte'])) {
								$TypePage = 'carte' ;
							}
							elseif (isset($_GET['contact'])) {
								$TypePage = 'contact' ;
							}
							elseif (isset($_GET['newsletter'])) {
								$TypePage = 'newsletter' ;
							}
							elseif (isset($_GET['plan'])) {
								$TypePage = 'plan' ;
							}
							elseif (isset($_GET['rubrique'])) {
								$TypePage = 'rubrique' ;
							}
							elseif (isset($_POST['rechercher'])) {
								$TypePage = 'rechercher' ;
							}
							elseif (isset($_GET['credit'])) {
								$TypePage = 'credit' ;
							}
							
							elseif (isset($_GET['agenda'])) {
								$TypePage = 'agenda' ;
							}
							else {
								$TypePage = 'accueil' ;			
								if($_SERVER['REQUEST_URI'] != "/" ){
									header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
									exit();
								}
							}
			
							
		?>
						