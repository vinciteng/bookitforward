<?php 
include('language.php');
require_once('theme_functions.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  
  	<!-- ==============================================
	Title and basic Meta Tags
	=============================================== -->
    <meta charset="utf-8">
    <title><?php echo azul_top('meta_title') ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo azul_top('meta_keywords') ?>">
    <meta name="keywords" content="<?php echo azul_top('meta_keywords') ?>">
	
	<!-- ==============================================
	Mobile Metas
	=============================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		
    <!-- ==============================================
	CSS
	=============================================== -->
    <link rel="stylesheet" href="<?php echo azul_product_info('extend_url'); ?>/themes/bootstrap/css/bootstrap.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo azul_product_info('extend_url'); ?>/themes/bootstrap/css/bootstrap-theme.min.css" type="text/css" media="screen"  />
    <link rel="stylesheet" href="<?php echo azul_product_info('extend_url'); ?>/themes/css/metrize.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo azul_product_info('extend_url'); ?>/themes/css/style.css" type="text/css" media="screen" />
	
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <?php
    switch (azul_top('back_type')) {
    	case 'images':
    		echo '<link rel="stylesheet" href="'.azul_product_info('extend_url').'/themes/css/supersized.css" type="text/css" media="screen" />';
    		echo '<link rel="stylesheet" href="'.azul_product_info('extend_url').'/themes/css/supersized.shutter.css" type="text/css" media="screen" />';
    		break;
    	case 'video':
    		echo '<link rel="stylesheet" href="'.azul_product_info('extend_url').'/themes/css/bigvideo.css">';
    		break;
    	default:
    		echo '';
    }
    ?>
    
    <!-- ==============================================
	Fonts
	=============================================== -->
    <link href='http://fonts.googleapis.com/css?family=<?php echo azul_top('typo_1') ?>:100,200,300,400,600,700,800,900,200italic,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=<?php echo azul_top('typo_2') ?>:100,200,300,400,600,700,800,900,200italic,300italic,400italic' rel='stylesheet' type='text/css'>
	
	
	<!-- ==============================================
	JS
	=============================================== -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="<?php echo azul_product_info('extend_url'); ?>/themes/js/modernizr.js"></script>
	
    <!-- ==============================================
	Favicon
	=============================================== -->
	<?php if (azul_top('favicon_image') != ''){
   		echo '<link rel="shortcut icon" href="'.azul_top('favicon_image').'" />';
    }
 
    $typo_1=str_replace("+"," ",azul_top('typo_1'));
    $typo_2=str_replace("+"," ",azul_top('typo_2'));
	include('typography.php');
	include('colours.php');
	include('menu_styles.php');
	?>
	
	<style type="text/css">
		.poster-image {
			background:url('<?php echo azul_top('image_replacement')?>');
		}
	</style>
	
	<!--[if lte IE 8]>
	  <link rel="stylesheet" href="<?php echo azul_product_info('extend_url'); ?>/themes/css/ie.css" type="text/css" media="screen" />
	  <style type="text/css">
		.back-color {
			background-color: #<?php echo azul_top('color_gradient_1')?> !important;
		}
	</style>
	<![endif]-->
	
</head>
<body>
 
  	<!-- ==============================================
	Preloader
	=============================================== -->
	<div id="preloader">
    	<div id="loading-animation">&nbsp;</div>
	</div> <!-- End Preloader -->
	
	
	<!-- ==============================================
	Background color
	=============================================== -->
	<?php if (azul_top('gradient') == 'enable'): ?>
	<div class="back-color"></div>
	<?php endif; ?>
	
	<!-- ==============================================
	Home
	=============================================== -->	
	<section id="home">
		<div class="container">
			<?php if (azul_top('twitter_feed') == 'enable'):?>
			    <div class="row twitter-list">
				    <div class="col-md-3 col-md-offset-9 col-sm-6">
				    	<div id="home-1" class="fadeOut-1">
				    		<ul id="twitter-feed" class="list-tweets"></ul>
				    	</div>
					</div>
				</div>	
			<?php endif; ?>
			<?php if (azul_top('menu_position') == 'top'):?>
				<div class="row">
					<div class="col-md-8">	    	
				    	<p class="menu fadeOut-2">
				    		<?php if (azul_top('about_section') == 'enable'):?>
					    		<a id="about" href="#" title="About"><?php echo azul_top('about_title') ?></a> &nbsp; / &nbsp;
					    	<?php endif;
					    	if (azul_top('newsletter_section') == 'enable'):?>
					    		<a id="newsletter" href="#" title="Newsletter"><?php echo azul_top('newsletter_title') ?></a> &nbsp; / &nbsp;
					    	<?php endif;
					    	if (azul_top('contact_section') == 'enable'):?>
					    		<a id="contact" href="#" title="Contact"><?php echo azul_top('contact_title') ?></a>
					    	<?php endif; ?>
					    </p>
				    </div>
			    </div>
		    <?php endif; ?>
			<div class="row">			   
			    <div class="col-md-8">
			    	<?php echo azul_countdown(); ?>	
			    </div>
			</div>	
			<?php if (azul_top('text_home') != ''):?>
				<div class="row">	
				    <div class="col-md-5 col-md-offset-1 intro">
				    	<h2 class="fadeOut-2"><?php echo azul_top('text_home') ?></h2>
				    </div>
				</div>
			<?php endif; ?>
			<?php if (azul_top('menu_position') == 'center'):?>
				<div class="row">
					<div class="col-md-2 col-md-offset-1">	    	
				    	<ul class="menu fadeOut-3">
				    		<?php if (azul_top('about_section') == 'enable'):?>
					    		<li><a id="about" class="fadeOut-2" href="#" title="About"><span class="menu-back"></span><?php echo azul_top('about_title') ?></a></li>
					    	<?php endif;
					    	if (azul_top('newsletter_section') == 'enable'):?>
					    		<li><a id="newsletter" class="fadeOut-2" href="#" title="Newsletter"><span class="menu-back"></span><?php echo azul_top('newsletter_title') ?></a></li>
					    	<?php endif;
					    	if (azul_top('contact_section') == 'enable'):?>
					    		<li class="last"><a id="contact" class="fadeOut-2" href="#" title="Contact"><span class="menu-back"></span><?php echo azul_top('contact_title') ?></a></li>
					    	<?php endif; ?>
					    </ul>
				    </div>
			    </div>
		    <?php endif; ?>
		    <div class="row visible-xs">
		    	<div class="col-md-3 col-md-offset-7 footer-content footer-xs fadeOut-2">
    				<?php if (azul_top('image_logo') != ''){
    					echo '<h4 class="fadeOut-2"><img src="'.azul_top('image_logo').'" alt="'.azul_top('meta_title').'" /></h4>';
    				}
    				include ('footer.php');
    				?>
    			</div>
    		</div>
		</div>
	</section>
	
	<!-- ==============================================
	Footer
	=============================================== -->
	<footer class="hidden-xs">
		<div class="container">
    		<div class="row">
    			<div class="col-md-3 col-md-offset-7 footer-content fadeOut-2">
    				<?php if (azul_top('image_logo') != ''){
	    				echo '<h4 class="fadeOut-2"><img src="'.azul_top('image_logo').'" alt="'.azul_top('meta_title').'" /></h4>';
	    			}
	    			include ('footer.php');
	    			?>
    			</div>
    		</div>
    	</div>
    </footer>
	
	<!-- ==============================================
	About
	=============================================== -->
	<?php if (azul_top('about_section') == 'enable'):?>
	<section id="about-content">
		<div class="container">
		    <div class="row">
			    <div class="col-md-2 col-md-offset-10">
			    	<div>
			    		<p><a id="close1" class="close fadeOut-1" href="#" title="Close"><img src="<?php echo azul_product_info('extend_url'); ?>/themes/img/close.png" alt="Close"/></a></p>
			    	</div>
				</div>
			</div>	
			<div class="row">			   
			    <div class="col-md-7 about-title">
				    <h1 class="fadeOut-2"><?php echo azul_top('about_title') ?></h1>
			    </div>
			</div>
			<div class="row">	
			    <div class="col-md-5 col-md-offset-1">
			    	<div class="about-text fadeOut-2">
			    		<?php echo azul_top('about_text') ?>
			    	</div>
			    </div>
			</div>
		</div>
	</section>
	<?php endif; ?>
	
	<!-- ==============================================
	Newsletter
	=============================================== -->
	<?php if (azul_top('newsletter_section') == 'enable'):?>
		<section id="newsletter-content">
			<div class="container">
			    <div class="row">
				    <div class="col-md-2 col-md-offset-10">
				    	<div>
				    		<p><a id="close2" class="close fadeOut-1" href="#" title="Close"><img src="<?php echo azul_product_info('extend_url'); ?>/themes/img/close.png" alt="Close"/></a></p>
				    	</div>
					</div>
				</div>	
				<div class="row">			   
				    <div class="col-md-8 newsletter-title">
					    <h1 class="fadeOut-2"><?php echo azul_top('newsletter_title') ?></h1>
				    </div>
				</div>
				<div class="row">	
				    <div class="col-md-7 col-md-offset-1 intro">
				    	<h2 class="fadeOut-2"><?php echo azul_top('newsletter_text') ?></h2>
				    </div>
				</div>
				<div class="row">
				<?php switch (azul_top('email_subscription_type')) {
			    		case 'wp_database': ?>
						    <div class="col-md-6 col-md-offset-1 subscribe">
						    	<form class="form-inline fadeOut-2" action="#" method="post">
			                        <input type="text" name="email" placeholder="<?php echo $input_subscription?>">
			                        <button type="submit" class="btn-submit"><?php echo $go?></button>
			                    </form>
			                    <div class="success-message"></div>
			                    <div class="error-message"></div>
						    </div>
						<?php 
					    break;
					    case 'mailchimp': ?>
						    <div class="col-md-5 col-md-offset-1">
						    	<div id="mc_embed_signup">
									<form id="mc-form" class="fadeOut-2">
								        <input id="mc-email" type="email" placeholder="<?php echo $input_subscription?>" class="email">
								        <button type="submit" class="btn-submit"><?php echo $go?></button>
								        <label for="mc-email"></label>
								    </form>
								</div>
					    	</div>
					    <?php
			       		break;
						} ?>
				</div>
			</div>
		</section>
	<?php 
	echo azul_email_subscription();
	endif; ?>
		
	<!-- ==============================================
	Contact
	=============================================== -->
	<?php if (azul_top('contact_section') == 'enable'):?>
		<?php if (azul_top('choose_back_contact') == 'map'):?>
			<div id="map"></div>
		<?php endif; ?>
	  	<section id="contact-content">
			<div class="container">
			    <div class="row">
				    <div class="col-md-2 col-md-offset-10">
				    	<div>
				    		<p><a id="close3" class="close fadeOut-1" href="#" title="Close"><img src="<?php echo azul_product_info('extend_url'); ?>/themes/img/close.png" alt="Close"/></a></p>
				    	</div>
					</div>
				</div>	
				<div class="row">			   
				    <div class="col-md-7 contact-title">
					    <h1 class="fadeOut-2"><?php echo azul_top('contact_title') ?></h1>
				    </div>
				</div>
				<div class="row">	
				    <div class="col-md-7 col-md-offset-1 address">
				    	<div class="fadeOut-2"><?php echo azul_top('contact_text') ?></div>
				    </div>
				</div>
				<div class="row">	
				    <div class="col-md-5 col-md-offset-1">
				    <?php $codigo=contact_captcha(); ?>
				    	<form class="fadeOut-2" action="#" id="contactform">
	                		<input type="text" name="name" placeholder="<?php echo $name?>">
							<input type="text" name="email" placeholder="<?php echo $email?>">
							<textarea name="message" cols="35" rows="5" placeholder="<?php echo $message?>"></textarea>
							<p>
							<span class="text-captcha"><?php echo $human.' '.$codigo; ?> </span>
							<input type="hidden" name="codigo_prin" value="<?php echo $codigo; ?>" />
       						<input type="text" name="codigo" class="input-captcha" placeholder="<?php echo $number?>" />
       						</p>
							<br/>
							<button class="button" type="submit" value="Send"><?php echo $send?></button>
						</form>
						<div class="success-message-2"></div>
	            		<div class="error-message-2"></div>
	            		<?php echo azul_contact_form(); ?>  
				    </div>
				</div>
			</div>
		</section>
  	<?php endif;
  	
  	if (azul_top('back_type') == 'video_youtube'){ ?>
   		<a id="bgndVideo" data-property="{videoURL:'<?php echo azul_top('video_internal_youtube')?>',containment:'body',autoPlay:true, mute:<?php if (azul_top('video_sound_youtube') == 'enable'){echo "false";}else{echo "true";}?>, startAt:0,opacity:1,ratio:'16/9', addRaster:true}">My video</a>
    <?php } ?>
  	
  	</body>
  	
 	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="<?php echo azul_product_info('extend_url'); ?>/themes/bootstrap/js/bootstrap.min.js"></script>
    <?php if (azul_top('countdown_activation') == 'countdown'): ?>
		<script type="text/javascript" src="<?php echo azul_product_info('extend_url'); ?>/themes/js/jquery.countdown.js"></script>
	<?php endif; ?>
	<?php if (azul_top('twitter_feed') == 'enable'):
		include('twitterfeed.php');
	endif; ?>
	<?php if ((azul_top('choose_back_contact') == 'map') && (azul_top('contact_section') == 'enable')): ?>
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    	<script type="text/javascript" src="<?php echo azul_product_info('extend_url'); ?>/themes/js/jquery.gmap.min.js"></script>
    <?php  echo azul_map();
    endif; 
    include('animations.php'); 

    if (azul_top('email_subscription_type') == 'mailchimp'){
   		echo '<script type="text/javascript" src="'.azul_product_info('extend_url').'/themes/js/jquery.ajaxchimp.js"></script>';
   		echo '<script type="text/javascript" src="'.azul_product_info('extend_url').'/themes/js/jquery.ajaxchimp.langs.js"></script>';
   		include ('ajaxchimp.php');
   		echo $content;
    }
    
	switch (azul_top('back_type')) {
    	case 'images':
    		echo '<script type="text/javascript" src="'.azul_product_info('extend_url').'/themes/js/supersized.3.2.7.min.js"></script>';
			echo '<script type="text/javascript" src="'.azul_product_info('extend_url').'/themes/js/supersized.shutter.min.js"></script>';
			include('images.php');
    		break;
    	case 'video':
    		echo '<script type="text/javascript" src="'.azul_product_info('extend_url').'/themes/js/jquery-ui-1.8.22.custom.min.js"></script>';
    		echo '<script type="text/javascript" src="'.azul_product_info('extend_url').'/themes/js/jquery.imagesloaded.min.js"></script>';
    		echo '<script type="text/javascript" src="http://vjs.zencdn.net/4.0/video.js"></script>';
    		echo '<script type="text/javascript" src="'.azul_product_info('extend_url').'/themes/js/bigvideo.js"></script>';
    		echo '<script type="text/javascript" src="'.azul_product_info('extend_url').'/themes/js/device.min.js"></script>';
    		include('video.php');
    		break;
    	case 'video_youtube':
    		echo '<script type="text/javascript" src="'.azul_product_info('extend_url').'/themes/js/jquery.mb.YTPlayer.js"></script>';
    		echo '<script type="text/javascript" src="'.azul_product_info('extend_url').'/themes/js/device.min.js"></script>';
    		include('video_youtube.php');
    		echo $content;
    		break;	
    	default:
    		echo '';
    }
    echo azul_top('analytics');?>
    

</html>



