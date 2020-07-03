			<?php
			
						if ($TypePage == 'page') {
								$page = $_GET['page'];
								$page = htmlspecialchars($page, ENT_QUOTES, 'UTF-8');
								$page = intval($page);
								
								if (isset($_GET['ami'])) {									
									
									echo "
										Envoyer cet article � un ami<br/><br/>
										<form name=form_ami method=post action=index.php?envoi_ami>
										<label class=ami><input class=recherche type=text name=email value='Mail de votre ami ...' onFocus=\"this.value=''\" /></label>
										<label class=ami><input class=recherche type=text name=nom value='Votre nom ...' onFocus=\"this.value=''\" /></label>
										
										<input type=Hidden name=page value=".$page." />
										<input type=Hidden name=envoi_ami />
										<input type=submit name=button class=bouton value='Envoyer' />
										</form>
										<br/><br/>";
								
								}
								
								include('pays/page/page.php');
							}
							elseif ($TypePage == 'ami') {
								include('pays/page/ami.php');
							}
							elseif ($TypePage == 'carte') {
								include('pays/page/carte.php');
							}
							elseif ($TypePage == 'contact') {
								include('pays/page/contact.php');
							}
							elseif ($TypePage == 'newsletter') {
								include('pays/page/newsletter.php');
							}
							elseif ($TypePage == 'plan') {
								include('pays/page/plan.php');
							}
							elseif ($TypePage == 'rubrique') {
								include('pays/page/rubrique.php');
							}
							elseif ($TypePage == 'rechercher') {
								include('pays/page/rechercher.php');
							}
							elseif ($TypePage == 'credit') {
								include('pays/page/credit.php');
							}
							
							elseif ($TypePage == 'agenda') {
								include('pays/page/agenda.php');
							}
							else {								

							
								
							}
				?>
						