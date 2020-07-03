<!DOCTYPE html>
<html lang="fr">

	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<?php

			include('../../acces/connect.php');
			$connect;
			$base;

		?>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Slider Kit > DelayCaptions add-on</title>
		<meta name="Keywords" content="photo gallery, carousel, external controls, pagination" />
		<meta name="Description" content="Slider Kit jQuery plugin: delay captions, sliding captions, extension" />
		
		<!-- jQuery library -->
		<script type="text/javascript" src="../lib/js/external/_oldies/jquery-1.3.min.js"></script>
		<!--<script type="text/javascript" src="../lib/js/external/jquery-1.6.2.min.js"></script>-->
		
		<!-- jQuery Plugin scripts -->
		<script type="text/javascript" src="../lib/js/external/jquery.easing.1.3.min.js"></script>
		<script type="text/javascript" src="../lib/js/external/jquery.mousewheel.min.js"></script>
		
		<!-- Slider Kit scripts -->
		<script type="text/javascript" src="../lib/js/sliderkit/jquery.sliderkit.1.9.2.pack.js"></script>		
		<!-- PERMET DE FAIRE GLISSER LE TEXTE SUR L'IMAGE -->
		<script type="text/javascript" src="../lib/js/sliderkit/addons/sliderkit.delaycaptions.1.1.pack.js"></script>

		<!-- Slider Kit launch -->
		<script type="text/javascript">
			$(window).load(function(){ //$(window).load() must be used instead of $(document).ready() because of Webkit compatibility
								
				/*---------------------------------
				 *	Example #01
				 *---------------------------------*/
				$(".delaycaptions-01").sliderkit({
					circular:false,
					mousewheel:true,
					keyboard:true,
					shownavitems:5,
					autospeed:4000,
					circular:true,
					fastchange:false,
					panelfxspeed:500,					
					delaycaptions:{
						delay:600,
						position:'bottom',
						transition:'sliding',
						duration:300,
						easing:'easeOutExpo'
					}
				});							
				
			});
		</script>
		
		<!-- Slider Kit styles -->
		<link rel="stylesheet" type="text/css" href="../lib/css/sliderkit-core.css" media="screen, projection" />
		<!-- FEUILLE DE STYLE DU MENU DE NAVIGATION -->
		<link rel="stylesheet" type="text/css" href="../lib/css/sliderkit-demos.css" media="screen, projection" />
		
		<!-- Slider Kit compatibility -->	
		<!--[if IE 6]><link rel="stylesheet" type="text/css" href="../lib/css/sliderkit-demos-ie6.css" /><![endif]-->
		<!--[if IE 7]><link rel="stylesheet" type="text/css" href="../lib/css/sliderkit-demos-ie7.css" /><![endif]-->
		<!--[if IE 8]><link rel="stylesheet" type="text/css" href="../lib/css/sliderkit-demos-ie8.css" /><![endif]-->

		<!-- Site styles -->
		<link rel="stylesheet" type="text/css" href="../lib/css/sliderkit-site.css" media="screen, projection" />
	</head>
	<body>
		<div id="page" class="inner layout-1col">
			<div id="content">
				<div class="sliderkit photosgallery-captions delaycaptions-01">
					<div class="sliderkit-nav">
						<div class="sliderkit-nav-clip">
							<ul>
								<?php
									include('actu1.php') ;
								?>
							</ul>
						</div>
						<div class="sliderkit-btn sliderkit-nav-btn sliderkit-nav-prev"><a rel="nofollow" href="#" title="Previous line"><span>Page précédente</span></a></div>
						<div class="sliderkit-btn sliderkit-nav-btn sliderkit-nav-next"><a rel="nofollow" href="#" title="Next line"><span>Page suivante</span></a></div>
						<div class="sliderkit-btn sliderkit-go-btn sliderkit-go-prev"><a rel="nofollow" href="#" title="Previous photo"><span>Info précédente</span></a></div>
						<div class="sliderkit-btn sliderkit-go-btn sliderkit-go-next"><a rel="nofollow" href="#" title="Next photo"><span>Prochaine info</span></a></div>
					</div>
					<div class="sliderkit-panels">						
						<?php
									include('actu2.php') ;
						?>
					</div>
				</div>
			</div>
			
		</div>
	</body>
</html>