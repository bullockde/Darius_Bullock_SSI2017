<?php
/**
 * Template Name: Portal Home
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
 
 

get_header('login'); 

	$photos = get_posts(array(  'post_type' => 'ssi_photos' , 'posts_per_page' => -1 ));
			$videos = get_posts(array( 'post_type' => 'ssi_videos' , 'posts_per_page' => -1 ));
			$thots = get_posts(array(  'post_type' => array(/*'ssi_models', 'ssi_requests', */'ssi_breed'/*, 'ssi_contact'*/) , 'posts_per_page' => -1 , 'orderby' => 'modified', 'order' => 'asc' , 'post_status' => array('publish'/*, 'pending'*/) /*, 'category_name' => 'thots'*/ ));
			
			
?>

		
		
<div id="" class="">

	<div id="" class="col-md-6 col-md-offset-3">
	<center>
	
		<!--<h4 class="text-center " >Submit A BREED Request:</h4><hr>-->
		<?php

		$thumb_id = get_post_thumbnail_id();
		$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
		$thumb_url = $thumb_url_array[0];
?>
<!--
		<a href="/members"><img src='<?php echo $thumb_url; ?>'></a>
		-->
		
		
		<a href="/breed-request" target="_blank" class="btn btn-success btn-block btn-lg hidden">  Request a BREEDING >> </a>
		<br>
<?php
		 if( is_page( array('resume', 'contact', 'gallery', 'subscribe') ) ){

		 }else if ( $thumb_url == '/wp-content/uploads/2018/08/ad-BreedFest-300-250-visit-now.png' ){


		} else { 

		
				//twentysixteen_post_thumbnail(); 
			
		}

	?></center>
	</div>
	
	<div id="" class="col-md-6">
			<?php echo do_shortcode('[gravityform id="19" title="false" description="false"]'); ?>
	</div>
	<header class="entry-header text-center hidden">
		
		<?php //the_title( '<h1 class="entry-title text-center">', '</h1>' ); ?>
	
	</header><!-- .entry-header -->

	<div class='well col-sm-6 text-center col-sm-offset-3'>
		
	<div class='clearfix'></div>
		
		<?php if( is_user_logged_in() ){ ?>
		<div class='clearfix'></div>
		
		<h4> <?php echo 'Welcome, ' . $current_user->display_name . '!'; ?> </h4><hr>
		
		
		<div class='well'>
		<div class='col-sm-6 text-center '>
		
		
			<div class=" porn well">
									<center>
								<?php echo get_avatar($current_user->ID, 150); ?> 
									</center>
								</div>
								
								<div class='clearfix'></div><br>
								
								<?php 
								
								
									$admin_user = 0;
										$allowed_roles = array('editor', 'administrator');
									if ( is_user_logged_in() && array_intersect($allowed_roles, $current_user->roles ) ) {
										$admin_user = 1;
										
									}
														
								
								if( ($userid == $current_user->ID) || $admin_user ){ ?>
								<a href='/edit-profile/?ID=<?php echo  $current_user->ID; ?>' class='btn btn-warning btn-block hidden'>Edit Profile</a>
								<div class='clearfix'></div>
								<?php } ?>
								<a target='_blank' href='/mailbox/?pmaction=newmessage&to=<?php echo $user->ID; ?>'><div class='pmessage btn-danger btn-lg upper bold white hidden'>Private Message</div></a>
		</div>
		<div class='col-sm-6 text-center'>
	
			
			
			<div class='clearfix'></div>
			
			
			<div class=' col-xs-6'>
				Age:
			</div>
			<div class=' col-xs-6'>
				<?php 
				if( get_user_meta($current_user->ID, 'MX_user_age' , 1) ){
					echo get_user_meta($current_user->ID, 'MX_user_age' , 1);
				}else{
							echo '-';
				}
				?>
			</div>
			<div class=' col-xs-6'>
				Height:
			</div>
			<div class=' col-xs-6'>
				<?php //echo get_user_meta($userid, 'MX_user_height', 1);
				
				if( get_user_meta($current_user->ID, 'MX_user_height_ft' , 1) ){
						echo get_user_meta($current_user->ID, 'MX_user_height_ft' , 1) . "' " . get_user_meta($current_user->ID, 'MX_user_height_in' , 1) . '"' ;
				}else{
							echo '-';
				}
				?>
				
				
			</div>
			<div class=' col-xs-6'>
				Weight:
			</div>
			<div class=' col-xs-6'>
				<?php 
				
				if( get_user_meta($current_user->ID, 'MX_user_weight' , 1) ){
					echo get_user_meta($current_user->ID, 'MX_user_weight' , 1);
				}else{
							echo '-';
				}
				?>
			</div>
			
			<div class='clearfix'></div><br>
			
				<div class='text-center '>
				Location<br>
				<b><?php 
				
					$closet = 0;
								if ( get_user_meta($current_user->ID, 'MX_user_city', 1 ) && get_user_meta($current_user->ID, 'MX_user_state', 1) ){

																		echo ' <span style="text-transform: capitalize;">' . get_user_meta($current_user->ID, 'MX_user_city', 1 ) . '</span>, ';
																		echo get_user_meta($current_user->ID, 'MX_user_state', 1) ;

								}
								else if ( get_user_meta($current_user->ID, 'MX_user_state', 1) ){
									echo  get_user_meta($current_user->ID, 'MX_user_state', 1);
								}
								else{
									$closet = 1;
									echo '-';
								}				
								
			?></b>
			</div>
			
			<a href='/edit-profile/?ID=<?php echo  $current_user->ID; ?>' class='btn btn-warning btn-block'>Edit Profile</a>

			<?php
			$phone = preg_replace('/[^0-9]/', '', get_post_meta($Model_ID, 'client_phone', true));
			if(strlen($phone) === 10) {
				$country = 1;
				$area = substr($phone, 0, 3);
				$first = substr($phone, 3, 3);
				$last = substr($phone, 6, 4);
				
				$phone =  $country . "-" . $area . "-" . $first . "-" . $last;
				$name = get_the_title();
				
				
				array_push($names, $name );
				array_push($numbers, $phone );
				echo $phone;
				//Phone is 10 characters in length (###) ###-####
			}

			?>

		</div>
		<div class='clearfix'></div>
	</div>
		
		<?php } ?>
		
		
		
		
		
		
		<div class=' video'>
				
					<?php
			
					echo get_the_content( get_the_ID() );
					
				$args = array( 'numberposts' => 1, 'post_type' => 'ssi_breed' , 'orderby' => 'modified', 'order' => 'desc' , 'post_status' => 'publish' , 'category_name' => 'active' );
				$recent_posts = wp_get_recent_posts( $args );
				
				//print_r($recent_posts);
				
				foreach( $recent_posts as $recent ){
					
					//print_r($recent);
					?> 
					<h4>- FeaTured THoT -</h4><hr>
					
					
					<!--<h4>- My #<?php echo count($thots); ?> THOT -</h4>-->
					
					
					<div class='well yellow video'>
					<?php echo get_the_post_thumbnail( $recent["ID"] , 'medium' ); ?> 
					<br><br>
					<b><u>Name</u></b><br>
					<?php echo  $recent["post_title"]; 
					
					?>
					<br><br>
					<b><u>Location</u></b><br>
					<?php
					echo get_post_meta( $recent["ID"] , 'MX_user_city' ,1 );
					?>, 
					<?php
					echo get_post_meta($recent["ID"] , 'MX_user_state' , 1);
					?>
					<br><br>
					<b><u>His Fantasy</u></b><br><br>
				
					<?php
					echo $recent["post_content"];
					
					
					?>
					<br><br>
					<b><u>Status</u></b><br>
					<?php				
					//echo --$count;
					echo "Pending";
					//echo $lead->post_title;
					//echo "";
				?>
				
					</div>
					<?php
					
				}
				wp_reset_query();
			?>
			</div>
		
		
				<div class="stats">
						
			<hr><h4>We Currently Have: </h4><hr>
			

								<div class="row">
								
								<div class="col-md-2 col-xs-6 text-center well hidden">
									
			<a target='black' href='/events'>
			<figure>
			
			  <figcaption><h3><?php echo count($events); ?></h3> <h4>Events ></h4></figcaption>
			</figure>
			</a>						
								</div>
								
								<div class=" col-xs-4 text-center well">
							
			<figure>
				<a href="/thot-list">
					<figcaption><h3><?php echo count($thots); ?></h3> <h4>THOTs</h4></figcaption>
				</a>
			</figure>
			
								</div>	
							

								
								<div class="col-xs-4 text-center well">
							
			<figure>
				<a href="/photos">
				  <figcaption><h3><?php echo count($photos); ?></h3> <h4>PHOTOs</h4></figcaption>
				 </a>
			</figure>
								
								</div>
									<div class="col-xs-4 text-center well">
					
			<figure>
			<a href="/videos">
			  <figcaption><h3><?php echo count($videos); ?></h3> <h4>VIDEOs</h4></figcaption>
			</a>
			</figure>
							
								</div>
								
								
								<div class="col-md-2 col-xs-6 text-center well hidden">
									
			<a target='black' href='/projects'>
			<figure>

			  <figcaption><h3><?php echo count($projects); ?></h3> <h4>Projects ></h4></figcaption>
			</figure>
			</a>						
								</div>
								
								
									<div class="col-md-2 col-xs-6 text-center well hidden">
									
			<a target='black' href='/members'>
			<figure>

			  <figcaption><h3><?php echo $total_results; ?></h3><h4>Members ></h4></figcaption>
			</figure>
			</a>
								</div>
								
								
								
							</div>

						

			<div class='clearfix'></div>
					
				
			
				
						
								
	</div><!-- // container -->
		
		
			
	<div class="join">
						
		
			

			<div class='clearfix'></div>
					
				
				<div class="col-md-12">	


					<?php if( is_user_logged_in() ){ ?>
					
						<?php echo do_shortcode("[wpmem_form login]"); ?>
						
					<?php }else{ ?>
					<center>
						<h3>Join Now<br><small>(100% Free - Full Access)</small></h3>
		<div id="menu" style='display: block;'>
			<a href='/thot-request' class='btn btn-block btn-default btn-lg hidden'>> Reqest a Session <</a>
			
			<a href='/login' class='btn btn-block btn-info btn-lg hidden1'>Member Login</a>
			<a href='/register' class='btn btn-block btn-info btn-lg hidden1'>Join Now</a>
			
			<a href='/user-profile' class='btn btn-block btn-info btn-lg hidden'>Your Profile</a>
			<a href='/models' class='btn btn-block btn-info btn-lg hidden'>Our Models</a>
			<a href='/members' class='btn btn-block btn-info btn-lg hidden'>Our Members</a>
			<a href='/mailbox' class='btn btn-block btn-info btn-lg hidden'>Mailbox</a>
			<a href='/fantasy' class='btn btn-block btn-default btn-lg hidden'>> Post a Fantasy <</a>
			<button id='partners' class='btn btn-block btn-info btn-lg hidden'>Our Partners</button> 
			<div id='partners' style='display: none;'>
				<hr>
				<h4>Our Partners </h4><hr>
				<a href='http://instaflixxx.com' class='btn btn-block btn-default btn-lg'>InstaFliXXX</a>
				<a href='http://dlfreakfest.org' class='btn btn-block btn-default btn-lg'>DLFreakFest</a>
				<a href='http://ssixxx.com' class='btn btn-block btn-default btn-lg'>SSIxXx</a>
			</div>
			
		</div>					

					<div class='clearfix'></div>

					</center>
					
					<?php } ?>
				</div>

				
						
								
	</div><!-- // container -->
		
	</div>



<div class='clear'></div>


	</div><!-- .site-main -->


</div><!-- .content-area -->
	<div class='clearfix'></div>
	
	
	


<?php get_footer('preview'); ?>
