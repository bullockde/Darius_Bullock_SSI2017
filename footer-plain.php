<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<div class='<?php if( is_page( array('ssixxx', 'preview') ) ){ echo "hidden" ; } ?> '>


</div>

		</div><!-- .site-content -->



<div class=' Social Links <?php if( is_page( array('ssixxx', 'preview') ) ){ echo "hidden" ; } ?> '>

<?php if ( 1 /*!wp_is_mobile()*/ ) { ?>

				<span class="ssixxx-tagline entry-title"><center>Connect with me. I am Human!</center></span><hr>

				<div class="col-xs-3 pad0"><a target='_blank' href='https://www.facebook.com/ShamanShawnInc/'><img src='/wp-content/uploads/2015/09/icon-facebook.png' class='img-responsive aligncenter'></a></div>
				<div class="col-xs-3 pad0"><a target='_blank' href='https://twitter.com/shamanshawninc'><img src='/wp-content/uploads/2015/09/icon-twitter.png' class='img-responsive aligncenter'></a></div>
				<div class="col-xs-3 pad0"><a target='_blank' href='https://www.youtube.com/channel/UChPquIqMjch7rEcoSnmN_AA'><img src='/wp-content/uploads/2015/09/icon-youtube.png' class='img-responsive aligncenter'></a></div>
				<div class="col-xs-3 pad0"><a target='_blank' href='https://www.linkedin.com/pub/shaman-shawn/53/296/58b'><img src='/wp-content/uploads/2015/09/icon-linked-in.png' class='img-responsive aligncenter'></a></div>
				<div class="col-xs-2 pad0 hidden"><a target='_blank' href='http://www.meetup.com/TreatYourselfMassage/'><img src='/wp-content/uploads/2015/10/icon-meetup-sqr.png' class='img-responsive aligncenter'></a></div>
				<div class="col-xs-2 pad0 hidden"><a target='_blank' href='https://vine.co/u/1239114165760024576'><img src='/wp-content/uploads/2015/10/vine-icon_340.png' class='img-responsive aligncenter'></a></div>

			<div class='clear'><hr></div>
			</div>	
			<?php } ?>

</div> 

		
	<?php 

		$admin_page = 0;
		if(8383 == $post->post_parent){ $admin_page=1; }
		if(10665 == $post->post_parent){ $sssixxx_page=1; }
		if( !is_page(array( 'admin' )) && !$admin_page || !$sssixxx_page ){ ?>	
	


<div class="clear"></div>

<div class='social <?php if( is_page( array('ssixxx', 'preview') ) ){ echo "hidden" ; } ?>'>
		
	<div class='container'>
		
					
			
	<div id='social' style=' display: block;'>


			<div class='col-sm-4  '>

			<div class=' col-sm-12 text-center  ssixxx-wwss '>


				<div class='col-sm-6 '>Current Location:</div>	


				<?php 
				$args = array( 'post_type' => 'trips' , 'posts_per_page' => -1 , 'order' => 'ASC' );
				$trips = get_posts( $args );

				$t_id = 0;

				foreach( $trips as $trip ){

			

			$s_date = date('Y-m-d', strtotime(  get_field( 'trip_start_date', $trip->ID ) ) );
			
			if( get_field( 'trip_start_date', $trip->ID ) != "" ){

				$e_date = get_field( 'trip_end_date', $trip->ID );
				$e_date = date('Y-m-d', strtotime(  $e_date ) );

			}else{
				
				$e_date = date('Y-m-d', strtotime(  current_time( 'mysql' ) ) );
				
			}

			$c_date = date('Y-m-d', strtotime(  current_time( 'mysql' ) ) );

			
			
			if(  ( strtotime( $c_date ) <= strtotime( $e_date ) ) &&  ( strtotime( $c_date ) >= strtotime( $s_date ) )   ){
				

				
				$t_id = $trip->ID;

				echo "<div class='col-md-6'>" . $trip->post_title . "</div><div class='clear'></div><br>";
				
 				//break;
			}else{
				//echo "<br>AFTER<br>";
			}
		
		}
	?>
					<div class='clear'></div>
				</div>

				

		<?php	if( get_field( 'trip_area_code', $trip->ID ) == "757" ){ ?>

			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d102139.92382160109!2d-76.30236752835208!3d36.86946771070357!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89ba973a5322ca45%3A0xab99107fce7a1e0a!2sNorfolk%2C+VA!5e0!3m2!1sen!2sus!4v1460201305908"  height="300" frameborder="0" style="width: 100%" allowfullscreen></iframe>

		<?php	} else if( get_field( 'trip_area_code', $trip->ID ) == "434" ){  ?>

		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d50276.80913192345!2d-78.51999336297808!3d38.04008225612438!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89b3862dea50a48f%3A0x9086f096c38b74fc!2sCharlottesville%2C+VA!5e0!3m2!1sen!2sus!4v1465436296253"  height="300" frameborder="0" style="width: 100%" allowfullscreen></iframe>

		<?php	} else if( get_field( 'trip_area_code', $trip->ID ) == "804" ){  ?>

		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d202514.78370608334!2d-77.63334585750586!3d37.52457822419231!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89b111095799c9ed%3A0xbfd83e6de2423cc5!2sRichmond%2C+VA!5e0!3m2!1sen!2sus!4v1460978774733"  height="300" frameborder="0" style="width: 100%" allowfullscreen></iframe>

		<?php	} else if( get_field( 'trip_area_code', $trip->ID) == "404" ){  ?>

		<iframe src="https://www.google.com/maps/embed/v1/place?q=Atlanta,+GA,+United+States&key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU"  height="300" frameborder="0" style="width: 100%" allowfullscreen></iframe>


		<?php	} else if( get_field( 'trip_area_code', $trip->ID ) == "202" ){  ?>

		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d198725.17819124906!2d-77.15465073417762!3d38.89926506002183!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89b7c6de5af6e45b%3A0xc2524522d4885d2a!2sWashington%2C+DC!5e0!3m2!1sen!2sus!4v1460978861183" height="300" frameborder="0" style="width: 100%" allowfullscreen></iframe>

		<?php	} else if( get_field( 'trip_area_code', $trip->ID ) == "717" ){  ?>

		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d97398.81856029567!2d-76.95046621319973!3d40.28212338444331!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c8c116b8079e97%3A0xbb6e42c8128d46d5!2sHarrisburg%2C+PA!5e0!3m2!1sen!2sus!4v1460978934630" height="300" frameborder="0" style="width: 100%" allowfullscreen></iframe>

		<?php	}else if( get_field( 'trip_area_code', $trip->ID ) == "973" ){  ?>

		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d96748.65940690349!2d-74.25419842445584!3d40.731319782494225!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25370329a0e1d%3A0xe1bcdc2adcfee473!2sNewark%2C+NJ!5e0!3m2!1sen!2sus!4v1467602319563" height="250" frameborder="0" style="width: 100%" allowfullscreen></iframe>
		<?php	}else{  ?>

			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25908287.28120036!2d-114.99060097005477!3d37.56371601472886!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited+States!5e0!3m2!1sen!2sus!4v1467601917813"  height="300" frameborder="0" style="width: 100%" allowfullscreen></iframe>


				
		<?php	}  ?>



			
			</div>


			</div>

			<div class="col-sm-4 hidden- text-center">
			Advertisement<hr>
<!--JuicyAds v2.0  --  Footer Middle -->
<center>
<iframe border=0 frameborder=0 marginheight=0 marginwidth=0 width=250 height=262 scrolling=no allowtransparency=true src=http://adserver.juicyads.com/adshow.php?adzone=518276></iframe>
</center>
<!--JuicyAds END-->

			

			
			
			</div>
			<div class="col-sm-4 text-center">
				<div class="col-lg-12">
				<div class='visible-xs visible-sm visible-md'><br></div><div class='visible-xs'><br></div>
				<center>
				
				<div class='clear'></div>
		
				<?php /*dynamic_sidebar( 'content-bottom-2' );*/?>
			

			</div>
				<div class='hidden col-sm-4'>
					<a href='/register/' class='btn btn-lg btn-info btn-block'>SignUp</a><br>
				</div>
				<div class='hidden col-sm-4'>

					<?php if(is_user_logged_in()){ ?>

						<a href='/wp-login.php?action=logout&_wpnonce=b48f0b370d&redirect_to=http%3A%2F%2Fshamanshawn.com%2Fwp-admin%2Ftheme-editor.php%3Ffile%3Dcontent-social.php%26loggedout%3Dtrue%23038%3Btheme%3Dtwentyfourteen%26%23038%3Bscrollto%3D954%26%23038%3Bupdated%3Dtrue' class='btn btn-lg btn-info btn-block'>Logout</a><br>
					
					<?php }else{ ?>
						<a href='/wp-admin/' class='btn btn-lg btn-info btn-block'>Login</a><br>
					
					<?php } ?>
				</div>
				<div class='hidden col-sm-4'>
					<a href='/' class='btn btn-lg btn-info btn-block'>Home</a><br>
				</div>

			</div>

			

	
		</div><!-- #social -->
	</div><!-- #container -->
	
	</div><!-- #social -->


<div class="clear"></div>


	
	<?php } ?>

		<footer id="colophon" class="site-footer" role="contentinfo">
			<?php if ( has_nav_menu( 'primary' ) ) : ?>
				<nav class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Primary Menu', 'twentysixteen' ); ?>">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'primary',
							'menu_class'     => 'primary-menu',
						 ) );
					?>
				</nav><!-- .main-navigation -->
			<?php endif; ?>

			<?php if ( has_nav_menu( 'social' ) ) : ?>
				<nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'twentysixteen' ); ?>">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'social',
							'menu_class'     => 'social-links-menu',
							'depth'          => 1,
							'link_before'    => '<span class="screen-reader-text">',
							'link_after'     => '</span>',
						) );
					?>
				</nav><!-- .social-navigation -->
			<?php endif; ?>

			<div class="site-info text-centered">
				&copy;2016 Shaman Shawn Inc. | Powered by <a style='text-decoration: underline;' href='http://www.youtube.com/watch?v=9W8tyczXGwI&feature=youtu.be'>Jesus</a>.
			</div><!-- .site-info -->
		</footer><!-- .site-footer -->
	</div><!-- .site-inner -->
</div><!-- .site -->

	<?php get_template_part( 'content', 'admin' ); ?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-37287218-10', 'auto');
  ga('send', 'pageview');

</script>

<?php wp_footer(); ?>

<!-- jQuery library (served from Google) -->
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<!-- Latest compiled and minified JavaScript -->
	<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>

<!-- FlexSlider -->
  <script defer src="<?php echo get_template_directory_uri(); ?>/js/jquery.flexslider-min.js"></script>

  <script type="text/javascript">
    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide",
	controlNav: false,
      });
    });
  </script>

<script>

jQuery(document).ready(function(){
   jQuery( "button" ).click(function() {
	var id = this.id;
	jQuery("div#" + id ).slideToggle();
	
   });
});
</script>
<script>

jQuery(document).ready(function(){
   jQuery( "button#newpost" ).click(function() {
	
	jQuery("div#post").addClass("show");
	
   });
});
</script>

<script>
jQuery(document).ready(function(){
   jQuery( "button#complete" ).click(function() {
	var id = $(this).val();
	alert(id + " Update - Coming Soon...");
	
   });
});
</script>


<script>

jQuery(document).ready(function(){  
  //jQuery( "section#welcome" ).delay(4000).slideDown( 2000 );
});
 
</script>

<script>
jQuery(document).ready(function(){
jQuery( "button.random"  ).click(function() {
	var id = $(this).val();
 	jQuery( id ).toggle( "explode" );
	
});
});
</script>

</body>
</html>