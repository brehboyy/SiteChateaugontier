<?php
			//$requete03 = mysql_query("SELECT * FROM pays_sousbloc WHERE Bloc = '$bloc' AND Position = '$position' ") ;
			$requete03 = $pdo->prepare("SELECT * FROM pays_sousbloc WHERE Bloc = ? AND Position = ? ");
			$requete03->execute(array($bloc, $position));
			$lignes03 = $requete03->fetchAll(PDO::FETCH_CLASS);
			foreach ($lignes03 as $ligne03) {
			
				$position_sousbloc = $ligne03->Position ;
				$type = $ligne03->Type ;
				$texte = $ligne03->Texte ; 
				$sousbloc = $ligne03->Numero ;
				$lien = $ligne03->Lien ;	
				$titre = $ligne03->Titre ;
				
				switch ($type) {
				
					case 1 : // Format texte					
					echo $texte ;
					break ;					
					
					case 2:  // Format image
					$visuel = 'non' ;
					$requete04 = mysql_query("SELECT * FROM pays_image WHERE Sousbloc = '$ligne03->Numero' ");					
					while ($ligne04=mysql_fetch_object($requete04)) {
						$visuel = 'oui';
						$image = $ligne04->Nom ;
					}
					
					if ($visuel == 'oui') { echo "<a href=pays/media/".$image." rel=lightbox[site]>"; }
					
					elseif ($lien != '') { echo "<a href='".$lien."' target=_blank>"; }
					
					echo "<img src=pays/media/".$texte." border=0 />" ;
					
					if ($visuel == 'oui') { echo "</a>"; }
					
					elseif ($lien != '') { echo "</a>"; }					
					break ;
					
					case 3 : // Format Audio
					echo "<object type=application/x-shockwave-flash data=pays/audio/dewplayer.swf?mp3=media/".$texte."		&autostart=0&amp;autoreplay=1&amp;showtime=1 width=150 height=20>
							<param name=wmode value=transparent />
							<param name=movie value=pays/audio/dewplayer.swf?mp3=pays/media/".$texte."&amp;autostart=0&amp;autoreplay=1&amp;showtime=1/>
							</object>";					
					break ;
					
					case 5 : // Format liens
					$requete01 = mysql_query("SELECT * FROM pays_page WHERE Numero = '$texte' LIMIT 1 ") ;
					while ($ligne01=mysql_fetch_object($requete01)) {
						$nomPage = $ligne01->Titre ;
					}
					echo "<li><a href=index.php?page=".$texte.">".$nomPage."</a></li>" ;
					break ;
					
					case 6 : // Format document PDF					
					echo "<a href=pays/media/".$texte." target=_blank>".$titre ;
					echo "&nbsp;<img src=pays/image/acrobat.jpg border=0 width=20></a>";	
					break ;

					case 7 : // Format Livre calam�o
					echo "<a href=http://fr.calameo.com/read/".$lien." target=_blank>".$titre."</a>";
					echo $texte ;
					break ;
					
					case 8 : // Format formulaire de contact
                    $Chiffre1 = rand(1,9) ;
                    $Chiffre2 = rand(1,9) ;
                    $Total = $Chiffre1 + $Chiffre2 ;

                    echo "<div style=\"font-size: 14px; text-align:left;\">&nbsp;<strong>Nous contacter par&nbsp;mail :</strong></div>";
					echo "<div class=contact>";                                       
					echo "<form  name=contact method=post action=index.php?contact>";
					echo "<label class=contact>Nom Pr&eacute;nom :</label>";
					echo "<label class=contact><input type=text class=contact name=nom required /></label>";
					echo "<label class=contact>E-mail :</label>";
					echo "<label class=contact><input type=text class=contact name=email required /></label>";
					echo "<label class=contact>Sujet :</label>";
					echo "<label class=contact><input type=text class=contact name=sujet required /></label>";
					echo "<label class=contact>Texte :</label>";
					echo "<label class=contact><textarea class=contact name=texte required /></textarea></label>";
					
					echo '<div class="g-recaptcha" data-sitekey="'.$siteKey.'"></div>';
                    
                    echo "<input type=hidden name=email_destinataire value=".$texte." />";
                    
					echo "<label class=contact><input type=submit value=Envoyer class=contactBouton /></textarea></label>";                   

					echo "</form>";
					
					echo "</div>";
					
					break ;
					
				}				
			
			}
			
			
?>